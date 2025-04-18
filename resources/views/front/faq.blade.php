@extends('front.layouts.app')

@section('main_content')

<div class="main-container">
    <div class="page-top zoomIn animated" style="background-image: url({{asset('uploads/banner.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>FAQs</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Faqs</li>
                        </ol>
                    </div>
               </div>
            </div>
        </div>
    </div>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        .faq-section {
            padding: 60px 15px;
        }
        .faq-title {
            text-align: center;
            margin-bottom: 40px;
            color: #47ae1b;
        }
        .accordion-button:not(.collapsed) {
            background-color: #eafae4;
            color: #47ae1b;
        }
    </style>
</head>
<body>

<div class="container faq-section">
    <h2 class="faq-title">Frequently Asked Questions</h2>

    <div class="accordion" id="accordionExample">
        @foreach ($faqs as $faq)
            <div class="accordion-item mb_30">
                <h2 class="accordion-header" id="heading_{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse_{{$loop->iteration}}"  aria-controls="collapse_{{$loop->iteration}}">
                        {{$faq->question}}
                    </button>
                </h2>
                <div id="collapse_{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading_{{$loop->iteration}}"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{$faq->answer}}
                    </div>
                </div>
            </div>
    @endforeach

    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}






@endsection
