@extends('front.layouts.app')

@section('main_content')

<!-- Banner Section -->
<div class="page-top zoomIn animated" style="background-image: url({{ asset('uploads/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $cause->name }}</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('causes') }}">Causes</a></li>
                        <li class="breadcrumb-item active">{{ $cause->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cause Details Section -->
<div class="cause-details pt_70 pb_70">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <div class="item">
                    <div class="photo mb_30">
                        <img src="{{ asset('uploads/' . $cause->featured_photo) }}" class="img-fluid" alt="{{ $cause->name }}">
                    </div>

                    <h2 class="mb_20">{{ $cause->name }}</h2>

                    <div class="short-des mb_20">
                        <p>{!! nl2br(e($cause->short_description)) !!}</p>
                    </div>

                    <div class="full-des mb_30">
                        {!! $cause->description !!}
                    </div>

                    @php
                        $percentage = ($cause->raised / $cause->goal) * 100;
                        $percentage = min(ceil($percentage), 100);
                    @endphp

                    <div class="progress mb_20" style="height: 25px;">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}"
                            aria-valuemin="0" aria-valuemax="100">
                            {{ $percentage }}%
                        </div>
                    </div>

                    <div class="lbl mb_30">
                        <div class="goal"><strong>Goal:</strong> ₦{{ number_format($cause->goal) }}</div>
                        <div class="raised"><strong>Raised:</strong> ₦{{ number_format($cause->raised ?? 0) }}</div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- Donation Form -->
                    @if(Auth::check())
    <form action="{{ route('donate.process') }}" method="POST">
        @csrf
        <input type="hidden" name="cause_id" value="{{ $cause->id }}">

        <div class="mb-3">
            <label for="amount">Donation Amount (₦)</label>
            <input type="number" name="amount" class="form-control" required min="100">
        </div>

        <div class="mb-3">
            <label for="payment_method">Payment Method</label>
            <select name="payment_method" class="form-control" required>
                <option value="paystack">Paystack</option>
                <!-- Add more methods later -->
            </select>
        </div>

        <button type="submit" class="btn btn-success">Donate Now</button>
    </form>
@else
    <div class="alert alert-warning mt-4">
        Please <a href="{{ route('login') }}">log in</a> to donate.
    </div>
@endif


                    <!-- Support This Cause Box -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Support this cause</h5>
                            <p class="card-text">Your generous donation helps us make a bigger impact.</p>
                            <a href="#donation-form" class="btn btn-primary w-100">Donate Now</a>
                        </div>
                    </div>

                    <!-- Share This -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Share This</h5>
                            <div class="d-flex gap-2">
                                <a href="https://twitter.com/intent/tweet?text=Support {{ urlencode($cause->name) }}&url={{ url()->current() }}" target="_blank" class="btn btn-sm btn-outline-primary">Twitter</a>
                                <a href="https://facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="btn btn-sm btn-outline-primary">Facebook</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- End Sidebar -->
        </div>
    </div>
</div>

@endsection
