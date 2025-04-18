<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cause;
use App\Models\Donation;
use Illuminate\Support\Str;
use Paystack;

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

        // Store the data temporarily in session
        session([
            'donation_data' => [
                'cause_id' => $cause->id,
                'amount' => $request->amount,
            ]
        ]);

        // Prepare Paystack details
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData(); // payment info

        $donationData = session('donation_data');

        if (!$donationData || $paymentDetails['data']['status'] !== 'success') {
            return redirect()->route('causes')->with('error', 'Payment failed or canceled.');
        }

        // Save donation
        Donation::create([
            'cause_id' => $donationData['cause_id'],
            'amount' => $donationData['amount'],
            'reference' => $paymentDetails['data']['reference'],
            'email' => auth()->user()->email,

            'status' => 'completed',
        ]);

        // Update cause raised amount
        $cause = Cause::find($donationData['cause_id']);
        $cause->raised += $donationData['amount'];
        $cause->save();

        session()->forget('donation_data');

        return redirect()->route('cause', $cause->slug)->with('success', 'Donation successful. Thank you!');
    }
}
