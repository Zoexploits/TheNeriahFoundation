<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Special;
use App\Models\Counter;
use App\Models\Testimonial;
use App\Models\Feature;
use App\Models\Slider;
use App\Models\About;
use App\Models\AboutSection;
use App\Models\AboutSectionTwo;

class AboutController extends Controller
{
    public function index()
    {
        $sliders =Slider::get();
        $counter = Counter::where('id', 1)->first();
        $special = Special::where('id', 1)->first();

        return view('front.about', compact('special', 'counter'));
    }
}
