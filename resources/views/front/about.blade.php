@extends('front.layouts.app')

@section('main_content')



    <div class="main-container">
        <div class="page-top zoomIn animated" style="background-image: url(uploads/banner.jpg)">
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


    <div class="container">


        <div class="col-md-6 photo">

            <img src="uploads/about-us.jpg" alt="" class="img-responsive">

        </div>



        <h2 class="title-style-2">ABOUT SADAKA <span class="title-under"></span></h2>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, nulla quae possimus id fugit totam
            perspiciatis ad consequatur natus dolores unde ipsa, architecto, dignissimos corrupti explicabo provident
            debitis suscipit, beatae!
        </p>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur, voluptatum molestiae voluptas ducimus
            tempora numquam eligendi quos, quia aut quidem et, odio deleniti amet natus accusamus fugit! Temporibus,
            tenetur.
        </p>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptatem, ea, quisquam vero ullam nesciunt
            recusandae expedita similique nisi! Ducimus, reiciendis, quia. Explicabo minima error excepturi minus, aperiam
            illum fugit.
        </p>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur, voluptatum molestiae voluptas ducimus
            tempora numquam eligendi quos, quia aut quidem et, odio deleniti amet natus accusamus fugit! Temporibus,
            tenetur.
        </p>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptatem, ea, quisquam vero ullam nesciunt
            recusandae expedita similique nisi! Ducimus, reiciendis, quia. Explicabo minima error excepturi minus, aperiam
            illum fugit , quia. Explicabo minima error excepturi minus, aperiam illum fugit.

        </p>

    </div>

    </div> <!-- /.row -->

    <div class="section-home about-us">


        <div class="row">

            <div class="col-md-3 col-sm-6">

                <div class="about-us-col">

                    <div class="col-icon-wrapper">
                        <img src="assets/images/icons/our-mission-icon.png" alt="">
                    </div>
                    <h3 class="col-title">our mission</h3>
                    <div class="col-details">

                        <p>Lorem ipsum dolor sit amet consect adipisscin elit proin vel lectus ut eta esami vera dolor sit
                            amet consect</p>

                    </div>
                    <a href="#" class="btn btn-primary"> Read more </a>

                </div>

            </div>


            <div class="col-md-3 col-sm-6">

                <div class="about-us-col">

                    <div class="col-icon-wrapper">
                        <img src="assets/images/icons/make-donation-icon.png" alt="">
                    </div>
                    <h3 class="col-title">Make donations</h3>
                    <div class="col-details">

                        <p>Lorem ipsum dolor sit amet consect adipisscin elit proin vel lectus ut eta esami vera dolor sit
                            amet consect</p>

                    </div>
                    <a href="#" class="btn btn-primary"> Read more </a>

                </div>

            </div>


            <div class="col-md-3 col-sm-6">

                <div class="about-us-col">

                    <div class="col-icon-wrapper">
                        <img src="assets/images/icons/help-icon.png" alt="">
                    </div>
                    <h3 class="col-title">Help & support</h3>
                    <div class="col-details">

                        <p>Lorem ipsum dolor sit amet consect adipisscin elit proin vel lectus ut eta esami vera dolor sit
                            amet consect</p>

                    </div>
                    <a href="#" class="btn btn-primary"> Read more </a>

                </div>

            </div>


            <div class="col-md-3 col-sm-6">

                <div class="about-us-col">

                    <div class="col-icon-wrapper">
                        <img src="assets/images/icons/programs-icon.png" alt="">
                    </div>
                    <h3 class="col-title">our programs</h3>
                    <div class="col-details">

                        <p>Lorem ipsum dolor sit amet consect adipisscin elit proin vel lectus ut eta esami vera dolor sit
                            amet consect</p>

                    </div>
                    <a href="#" class="btn btn-primary"> Read more </a>

                </div>

            </div>



        </div> <!-- /.row -->


    </div>

    </div> <!-- /.about-us -->


    <div class="our-team animate-onscroll fadeIn">

        <div class="container">

            <h2 class="title-style-1">Our Team <span class="title-under"></span></h2>

            <div class="row">

                <div class="col-md-3 col-sm-6">

                    <div class="team-member">

                        <div class="thumnail">

                            <img src="assets/images/team/member-1.jpg" alt="" class="cause-img">

                        </div>



                        <h4 class="member-name"><a href="#">Robert C. Numbers</a></h4>

                        <div class="member-position">
                            CO-FOUNDER
                        </div>

                        <div class="btn-holder">

                            <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>

                        </div>



                    </div> <!-- /.team-member -->

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="team-member">

                        <div class="thumnail">

                            <img src="assets/images/team/member-3.jpg" alt="" class="cause-img">

                        </div>



                        <h4 class="member-name"><a href="#">Marjorie R. Echevarria</a></h4>

                        <div class="member-position">
                            CO-FOUNDER
                        </div>

                        <div class="btn-holder">

                            <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>

                        </div>



                    </div> <!-- /.team-member -->

                </div>


                <div class="col-md-3 col-sm-6">

                    <div class="team-member">

                        <div class="thumnail">

                            <img src="assets/images/team/member-4.jpg" alt="" class="cause-img">

                        </div>



                        <h4 class="member-name"><a href="#">Allison J. Falls</a></h4>

                        <div class="member-position">
                            CO-FOUNDER
                        </div>

                        <div class="btn-holder">

                            <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>

                        </div>



                    </div> <!-- /.team-member -->

                </div>


                <div class="col-md-3 col-sm-6">

                    <div class="team-member">

                        <div class="thumnail">

                            <img src="assets/images/team/member-2.jpg" alt="" class="cause-img">

                        </div>



                        <h4 class="member-name"><a href="#">Bryan B. Stevens</a></h4>

                        <div class="member-position">
                            CO-FOUNDER
                        </div>

                        <div class="btn-holder">

                            <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                            <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>

                        </div>



                    </div> <!-- /.team-member -->

                </div>

            </div> <!-- /.row -->

        </div>
    </div>
    </div>

@endsection
