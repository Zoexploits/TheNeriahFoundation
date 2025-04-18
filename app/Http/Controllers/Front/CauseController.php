<?php

namespace App\Http\Controllers\Front;

use App\Models\Cause;
use App\Models\Counter;
use App\Models\Feature;
use App\Models\Special;
use Srmklive\PayPal\Services\PayPal as PayClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CauseController extends Controller
{
    public function index()
    {
        $causes =Cause::all();
        $features = Feature::get();
        $counter = Counter::where('id', 1)->first();
        $special = Special::where('id', 1)->first();

        return view('front.causes', compact('special','causes', 'counter', 'features'));
    }

    public function detail($slug)
    {
        $cause = Cause::where('slug', $slug)->first();
        $features = Feature::get();
        $counter = Counter::where('id', 1)->first();
        $special = Special::where('id', 1)->first();

        return view('front.cause', compact('special','cause', 'counter', 'features'));
    }

}
