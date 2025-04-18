<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\DonationController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CauseController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminCauseController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminCounterController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminSpecialController;
use App\Http\Controllers\Admin\AdminTestimonialController;




require __DIR__.'/auth.php';


/*FRONT*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about/', [AboutController::class, 'index'])->name('about');
Route::get('/faq/', [FaqController::class, 'index'])->name('faq');
Route::get('/cause/', [CauseController::class, 'index'])->name('causes');
Route::get('/cause/{slug}', [CauseController::class, 'detail'])->name('cause');


/* User */
Route::middleware('auth','verified')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user_dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user_profile');
    Route::post('/edit-profile-submit', [UserController::class, 'profile_submit'])->name('user_edit_profile_submit');

});


/* Admin */
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/edit-profile', [AdminController::class, 'edit_profile'])->name('admin_edit_profile');
    Route::post('/edit-profile-submit', [AdminController::class, 'edit_profile_submit'])->name('admin_edit_profile_submit');

    Route::get('/testimonial/index', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_index');
    Route::get('/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('/testimonial/create/submit', [AdminTestimonialController::class, 'create_submit'])->name('admin_testimonial_create_submit');
    Route::get('/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/testimonial/edit/submit/{id}', [AdminTestimonialController::class, 'edit_submit'])->name('admin_testimonial_edit_submit');
    Route::get('/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');

    Route::get('/slider/index', [AdminSliderController::class, 'index'])->name('admin_slider_index');
    Route::get('/slider/create', [AdminSliderController::class, 'create'])->name('admin_slider_create');
    Route::post('/slider/create-store', [AdminSliderController::class, 'create_submit'])->name('admin_slider_create_submit');
    Route::get('/slider/edit/{id}', [AdminSliderController::class, 'edit'])->name('admin_slider_edit');
    Route::post('/slider/edit/submit/{id}', [AdminSliderController::class, 'edit_submit'])->name('admin_slider_edit_submit');
    Route::get('/slider/delete/{id}', [AdminSliderController::class, 'delete'])->name('admin_slider_delete');

    Route::get('/special/edit/', [AdminSpecialController::class, 'edit'])->name('admin_special_edit');
    Route::post('/special/edit/submit', [AdminSpecialController::class, 'edit_submit'])->name('admin_special_edit_submit');


    Route::get('/counter/edit/', [AdminCounterController::class, 'edit'])->name('admin_counter_edit');
    Route::post('/counter/edit/submit', [AdminCounterController::class, 'edit_submit'])->name('admin_counter_edit_submit');


    Route::get('/feature/index', [AdminFeatureController::class, 'index'])->name('admin_feature_index');
    Route::get('/feature/create', [AdminFeatureController::class, 'create'])->name('admin_feature_create');
    Route::post('/feature/create/submit', [AdminFeatureController::class, 'create_submit'])->name('admin_feature_create_submit');
    Route::get('/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit');
    Route::post('/feature/edit/submit/{id}', [AdminFeatureController::class, 'edit_submit'])->name('admin_feature_edit_submit');
    Route::get('/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete');


    Route::get('/faq/index', [AdminFaqController::class, 'index'])->name('admin_faq_index');
    Route::get('/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('/faq/create/submit', [AdminFaqController::class, 'create_submit'])->name('admin_faq_create_submit');
    Route::get('/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('/faq/edit/submit/{id}', [AdminFaqController::class, 'edit_submit'])->name('admin_faq_edit_submit');
    Route::get('/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');

    Route::get('/cause/index', [AdminCauseController::class, 'index'])->name('admin_cause_index');
    Route::get('/cause/create', [AdminCauseController::class, 'create'])->name('admin_cause_create');
    Route::post('/cause/create/submit', [AdminCauseController::class, 'create_submit'])->name('admin_cause_create_submit');
    Route::get('/cause/edit/{id}', [AdminCauseController::class, 'edit'])->name('admin_cause_edit');
    Route::post('/cause/edit/submit/{id}', [AdminCauseController::class, 'edit_submit'])->name('admin_cause_edit_submit');
    Route::get('/cause/delete/{id}', [AdminCauseController::class, 'delete'])->name('admin_cause_delete');

});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin_login');
    Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin_logout');
    Route::get('/forget-password', [AdminController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password-submit', [AdminController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
});


Route::post('/donate/process', [DonationController::class, 'redirectToGateway'])->name('donate.process');
Route::get('/donate/callback', [DonationController::class, 'handleGatewayCallback'])->name('donate.callback');


Route::middleware(['auth'])->group(function () {
    Route::post('/donate/initiate', [DonationController::class, 'initiate'])->name('donate.initiate');
    Route::get('/donate/verify/{reference}', [DonationController::class, 'verify'])->name('donate.verify');
});

// routes/web.php
Route::get('/test-config', function () {
    return config('paystack');
});

