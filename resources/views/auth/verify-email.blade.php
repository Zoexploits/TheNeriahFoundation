@extends('front.layouts.app')

@section('main_content')
<div class="page-top" style="background-image: url('uploads/banner.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Verify Account</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Verify Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content pt_70 pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <p>
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link 
                    we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-5 text text-success">
                        A new verification link has been sent to the email
                         address you provided during registration.
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                        <button type="submit" class="btn btn-primary btn-sm mb_10">Resend verification email</button>
                </form>
        
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <button type="submit" class="btn btn-danger btn-sm">
                        Log out
                    </button>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection