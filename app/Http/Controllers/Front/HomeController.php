<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use App\Models\Special;


class HomeController extends Controller
{
    public function index()
    {
        $sliders =Slider::get();
        $special = Special::where('id', 1)->first();
        return view('front.home', compact('sliders', 'special'));
    }

}
