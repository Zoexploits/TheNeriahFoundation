@extends('front.layouts.app')

@section('main_content')



    <div class="main-container">
        <div class="page-top zoomIn animated" style="background-image: url({{asset('uploads/banner.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>About Us</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">About Us</li>
                            </ol>
                        </div>
                   </div>
                </div>
            </div>
        </div>

    @if($special->status == 'show')
    <div class="special pt_70 pb_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full-section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left-side">
                                    <div class="inner">
                                        <h2>{{$special->sub_heading}}</h2>
                                        <h3>{{$special->heading}}</h3>
                                        {!! $special->text !!}
                                        <div class="button-style-1 mt_20">
                                            <a href="{{$special->button_link}}">{{$special->button_text}}<i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="col-md-6">
                                <div class="right-side" style="background-image: url('{{ asset('uploads/' . $special->photo)}}');">
                                    <a class="video-button" href="https://www.youtube.com/watch?v={{$special->video_id}}"><span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="counter-section pt_70 pb_70">
        <div class="container">
            <div class="row counter-items">
                <div class="col-md-3 counter-item">
                    <div class="counter">{{$counter->counter1_number}}</div>
                    <div class="text">Donations</div>
                </div>
                <div class="col-md-3 counter-item">
                    <div class="counter">{{$counter->counter2_number}}</div>
                    <div class="text">Volunteers</div>
                </div>
                <div class="col-md-3 counter-item">
                    <div class="counter">{{$counter->counter3_number}}</div>
                    <div class="text">Projects</div>
                </div>
                <div class="col-md-3 counter-item">
                    <div class="counter">{{$counter->counter4_number}}</div>
                    <div class="text">Events Organized</div>
                </div>
            </div>
        </div>
    </div>


    <div class="why-choose pt_70" style="background-image: url(uploads/why-choose-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="inner pb_70">
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="text">
                            <h2>Become a Volunteer</h2>
                            <p>
                                In order to become a volunteer, you need to fill out the form and send us. We will review your form and contact you.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inner pb_70">
                        <div class="icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="text">
                            <h2>Foundation & Events</h2>
                            <p>
                                We organize many events for fund raising. You can also organize events and help us to raise fund for the poor people.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inner pb_70">
                        <div class="icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div class="text">
                            <h2>Make a Donation</h2>
                            <p>
                                You can also donate us. We will use your donation to help the poor people. You can donate us by PayPal or Stripe.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
