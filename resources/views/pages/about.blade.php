@extends('layouts.main')
@section('content')
@section('title', 'About Us')

<section class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h2 class="about-heading">ABOUT US</h2>
                <h4 class="about-subtitle">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.
                </h4>
                <p class="about-text">
                    Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                    consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio
                    dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                </p>
                <p class="about-text">
                    Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod
                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                    nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                    nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                    Duis autem vel eum iriure dolor in hendrerit in vinim veniam, quis nostrud exerci tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                </p>
                <p class="about-text">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                    tincidunt ut laoreet dolore magna aliquam erat vol.
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <img class="img-fluid about-img" src="{{ asset('images/wbbonline_img_20.png') }}" alt="about-img">
            </div>
        </div>
    </div>
</section>

<section class="faq">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h2 class="about-heading">FAQs</h2>
                <div class="accordion" id="accordionFAQ">
                    <div class="card faq-card">
                        <div class="card-header" id="headingOne">
                            <h2 class="faq-header">
                            <button class="btn btn-link btn-block accord-btn  text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                HOW DO I PLACE A BID?
                            </button><span class="plus-btn"><img class="img-fluid" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img"></span>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                            <p class="faq-text">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingTwo">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            WHERE CAN I MANAGE MY PURCHASES? 
                            </button><span class="plus-btn"><img class="img-fluid" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img"></span>
                        </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingThree">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn   collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            WHAT IS A MAXIMUM BID?
                            </button><span class="plus-btn"><img class="img-fluid" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img"></span>
                        </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingFour">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            WHAT ARE THE ADDITIONAL COSTS? 
                            </button><span class="plus-btn"><img class="img-fluid" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img"></span>
                            
                        </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    </div>
</section>

@include('includes.assistance')

@endsection