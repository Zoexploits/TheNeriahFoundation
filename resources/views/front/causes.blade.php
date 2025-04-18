@extends('front.layouts.app')

@section('main_content')

{{-- <div class="main-container"> --}}

    <!-- Top Banner Section -->
    <div class="page-top zoomIn animated" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Causes</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Causes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cause Listing Section with proper spacing style="min-height: 60vh; -->
    <div class="cause pt_70 ">
        <div class="container">
            <div class="row">

                @foreach ($causes as $cause)

                <div class="col-lg-4 col-md-6">
                    <div class="item pb_70">
                        <div class="photo">
                            <img src="{{ asset('uploads/' . $cause->featured_photo) }}" alt="">
                        </div>
                        <div class="text">
                            <h2>
                                <a href="{{route('cause', $cause->slug)}}">{{$cause->name}}</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    {{!! nl2br ($cause->short_description, 100) !!}}
                                </p>
                            </div>
                            @php
                                $percentage = ($cause->raised / $cause->goal) * 100;
                                $percentage = ceil($percentage); // Cap at 100%
                                echo $percentage."%";

                            @endphp
                            <div class="progress mb_10">
                                <div class="progress-bar w-0" role="progressbar" aria-label="Example with label" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="animation: progressAnimation{{$loop->iteration}} 2s linear forwards;"></div>
                                <style>
                                    @keyframes progressAnimation{{$loop->iteration}} {
                                        from {
                                            width: 0;
                                        }
                                        to {width: {{$percentage}}%;}}
                                </style>
                            </div>

                            <div class="lbl mb_20">
                                <div class="goal">Goal: N{{$cause->goal}}</div>
                                <div class="raised">Raised: N{{$cause->raised}}</div>
                            </div>
                            <div class="button-style-2">
                                <a href="{{route('cause',$cause->slug)}}">Donate Now <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-lg-4">
                    <div class="item pb_70">
                        <div class="photo">
                            <img src="{{ asset('uploads/' . $cause->featured_photo) }}" class="card-img-top" alt="{{ $cause->name }}">
                        </div>
                            <h5 class="card-title">{{ $cause->name }}</h5>
                            <p class="card-text">{{ Str::limit($cause->short_description, 100) }}</p>
                            <div class="mt-auto">
                                <div class="progress mb-2">
                                    @php
                                        $percentage = ($cause->raised / $cause->goal) * 100;
                                        $percentage = min($percentage, 100); // Cap at 100%
                                    @endphp
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentage }}%"
                                         aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p><strong>Goal:</strong> ₦{{ number_format($cause->goal) }}</p>
                                <p><strong>Raised:</strong> ₦{{ number_format($cause->raised ?? 0) }}</p>
                                <a href="{{ route('cause', $cause->slug) }}" class="btn btn-success btn-sm mt-2">Learn More</a>
                            </div>
                        </div>
                </div> --}}
                @endforeach

                @if ($causes->isEmpty())
                <div class="col-12 py-5 my-5 text-center">
                    <div class="alert alert-info">
                        No causes available at the moment. Please check back later.
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection
