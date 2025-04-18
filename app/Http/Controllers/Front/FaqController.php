<?php

namespace App\Http\Controllers\Front;

use App\Models\Faq;
use App\Models\Slider;
use App\Models\Counter;
use App\Models\Feature;
use App\Models\Special;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index(){

        $sliders =Slider::get();
        $faqs = Faq::get();
        $features = Feature::get();
        $counter = Counter::where('id', 1)->first();
        $special = Special::where('id', 1)->first();

        return view('front.faq', compact('special', 'counter', 'faqs'));

    }
}
