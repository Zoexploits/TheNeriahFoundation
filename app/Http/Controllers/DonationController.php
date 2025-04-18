<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cause;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Unicodeveloper\Paystack\Facades\Paystack;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirectToGateway(Request $request)
    {
        $request->validate([
            'cause_id' => 'required|exists:causes,id',
            'amount' => 'required|numeric|min:100',
            'payment_method' => 'required|in:paystack',
        ]);

        $cause = Cause::findOrFail($request->cause_id);

        // Save to session for later use
        session([
            'donation_data' => [
                'cause_id' => $cause->id,
                'amount' => $request->amount,
            ]
        ]);

        // Required Paystack details
        $user = auth()->user();

        $paystackData = [
            'amount' => $request->amount * 100, // Paystack expects amount in Kobo
            'email' => $user->email,
            'reference' => Paystack::genTranxRef(),
            'currency' => 'NGN',
            'metadata' => [
                'cause_id' => $cause->id,
                'user_id' => $user->id,
            ],
        ];

        // Initialize transaction and redirect
        return Paystack::getAuthorizationUrl($paystackData)->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData(); // payment info
        Log::info('Received payment details: ', $paymentDetails);

        $donationData = session('donation_data');
        Log::info('Donation Data from session: ', $donationData);

        if (!$donationData || $paymentDetails['data']['status'] !== 'success') {
            Log::error('Payment failed or canceled.');
            return redirect()->route('causes')->with('error', 'Payment failed or canceled.');
        }

        // Save donation to the database
        try {
            $donation = Donation::create([
                'cause_id' => $donationData['cause_id'],
                'amount' => $donationData['amount'],
                'reference' => $paymentDetails['data']['reference'],
                'email' => auth()->user()->email,
                'status' => 'completed',
            ]);
            Log::info('Donation saved: ', ['donation' => $donation]);
        } catch (\Exception $e) {
            Log::error('Error creating donation: ' . $e->getMessage());
            return redirect()->route('causes')->with('error', 'Error creating donation.');
        }

        // Update cause raised amount
        $cause = Cause::find($donationData['cause_id']);
        if (!$cause) {
            Log::error("Cause not found: " . $donationData['cause_id']);
            return redirect()->route('causes')->with('error', 'Cause not found.');
        }

        // Ensure 'raised' is numeric before adding
        if (is_numeric($cause->raised)) {
            $cause->raised += $donationData['amount'];
        } else {
            Log::error("Non-numeric value in raised field for cause ID: " . $donationData['cause_id']);
            $cause->raised = $donationData['amount']; // Fallback to just setting the amount
        }

        // Save the updated cause
        try {
            $cause->save();
            Log::info('Cause updated: ', ['cause' => $cause]);
        } catch (\Exception $e) {
            Log::error('Error updating cause: ' . $e->getMessage());
            return redirect()->route('causes')->with('error', 'Error updating cause.');
        }

        // Forget donation data in session
        session()->forget('donation_data');

        return redirect('/')->with('success', 'Donation successful. Thank you!');
    }
}
