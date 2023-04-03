@extends('layouts.header')
<title>Home - JRJR</title>

@section('css')
    <style>
        .ls-slide, .ls-layer{
            display: block;
        }

        #layerslider{
            height: 700px;
        }
        @media only screen and (max-width: 767px){
            /*Tablets [601px -> 1200px]*/
            div#layerslider{
                width: 100%;
                height: 250px !important;
                margin: 0 auto;
            }

        }

    </style>
@stop
@section('content')
{{--<!-- <div class="overlay"></div> -->--}}
{{----}}
<!---------Slider start -------->
<section>
    <div class="gap nogap">
        <div id="layerslider-container-fw">
            <div id="layerslider" style="width: 100%; height: 700px; margin: 0 auto;">

                @if(!empty($sliders))
                    @foreach($sliders as $slider)
                <div class="ls-slide" data-ls="transition2d:40; timeshift:-2000;">
                    <img src="{{asset($slider->image)}}" width="100%" class="ls-bg" alt="Slide background" />
                    
                    <!--<div class="ls-l slide-subtitle" style="-->
                    <!--                 top:200px;-->
                    <!--                 left:20px;-->
                    <!--                 font:bold 40px 'arimo'; -->
                    <!--                 color:#fff; -->
                    <!--                 letter-spacing:1px;-->
                    <!--                 "-->
                    <!--            data-ls="offsetxin:-50;durationin:2000;delayin:500;offsetxout:-50;durationout:1000;">Are-->
                    <!--            you ready</div>-->

                    <!--<div class="ls-l slide-title layer-text" style="-->
                    <!--                 top:250px;-->
                    <!--                 left:18px;-->
                    <!--                 font-size:70px;-->
                    <!--                 font-weight:bold; -->
                    <!--                 font-family:arimo;-->
                    <!--                 letter-spacing:1px;-->
                    <!--                 "-->
                    <!--            data-ls="offsetxin:0;durationin:2500;delayin:900;scalexin:0;scaleyin:0;offsetxout:0;scalexout:0;scaleyout:0;">-->
                    <!--            For Donation?</div>-->

                    <!--<div class="ls-l blackbox" style="-->
                    <!--                 top:350px;-->
                    <!--                 left:20px;-->
                    <!--                 font-size:13px;-->
                    <!--                 font-family:arimo;-->
                    <!--                 color:#fff;-->
                    <!--                 letter-spacing:1px;-->
                    <!--                 list-style:circle;-->
                    <!--                 "-->
                    <!--            data-ls="offsetxin:50;delayin:1200;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">-->
                    <!--            Make Donation And Save Poor People.</div>-->

                    <!--<div class="ls-l blackbox" style="-->
                    <!--                 top:375px;-->
                    <!--                 left:20px;-->
                    <!--                 font-size:13px;-->
                    <!--                 font-family:arimo;-->
                    <!--                 color:#fff;-->
                    <!--                 letter-spacing:1px;-->
                    <!--                 "-->
                    <!--            data-ls="offsetxin:50;delayin:1200;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">-->
                    <!--            Send Food To Nigeria For Help Hungry Children.</div>-->

                    <!--<div class="ls-l blackbox" style="-->
                    <!--                 top:400px;-->
                    <!--                 left:20px;-->
                    <!--                 font-size:13px;-->
                    <!--                 font-family:arimo;-->
                    <!--                 color:#fff;-->
                    <!--                 letter-spacing:1px;-->
                    <!--                 "-->
                    <!--            data-ls="offsetxin:50;delayin:1200;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">-->
                    <!--            We Believe Education For Un-educated People In The World.</div>-->

                    <!--<div class="ls-l slide-subtitle" style="-->
                    <!--                 top:350px;-->
                    <!--                 left:20px;-->

                    <!--                 "-->
                    <!--            data-ls="offsetxin:50;delayin:1500;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">-->
                    <!--            <a href="donation-page.html" data-ripple="" class="ls-l sl-2 layer-button" style="-->
                    <!--                   top:465px;-->
                    <!--                   left:8px;-->
                    <!--                   font:bold 11px 'arimo';-->
                    <!--                   color:#fff;-->
                    <!--                   letter-spacing:1px;-->
                    <!--                   padding:18px 18px;-->
                    <!--                   text-transform:uppercase;-->
                    <!--                   display:inline-block;-->
                    <!--                   "-->
                    <!--                data-ls="offsetxin:50;delayin:1500;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">DONATE-->
                    <!--                NOW</a>-->
                    <!--        </div>-->

                </div><!-- Slide1 -->
                    @endforeach
                @endif

            </div>
        </div><!-- Layer Slider -->
    </div>
</section><!-- Slider Section -->



<!--<section>-->
<!--    <div class="gap nogap">-->
<!--        <div class="featured-banner">-->
<!--            <img src="{{asset($slider->image)}}" alt="">-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- featured banner -->






<!--------- 1st promo card start ---------->
<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="services">
                        <div class="services-icon">
                            <img src="assets/images/donation.png" alt="">
                        </div>
                        <div class="services-meta">
                            <h2>Make Donetion</h2>
                            <p>Make a difference by making a donation today.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services">
                        <div class="services-icon">
                            <img src="assets/images/donate.png" alt="">
                        </div>
                        <div class="services-meta">
                            <h2>Fundrising</h2>
                            <p>Join us in raising funds for a better tomorrow.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services">
                        <div class="services-icon">
                            <img src="assets/images/charity.png" alt="">
                        </div>
                        <div class="services-meta">
                            <h2>Volunteer</h2>
                            <p>Join us as a volunteer and make a difference in someone's life.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- services style default -->

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-2">
                        <!-- <span>Latest causes</span> -->
                        <h4>Recent <span>Causes</span></h4>
                    </div>
                </div>
                <div class="our-cause remove-ext-50 loader-data" id="itemContainer">
                    @forelse ($causes as $cause)
                    <div class="col-sm-4">
                        <div class="caro-unit fadein">
                            <div class="cause-avatar">
                                <a href="{{ url('cause-details', $cause->slug) }}">
                                    <img src="{{ asset( $cause->feature_image) }}" style="height:250px;" alt="">
                                </a>
                                <div class="required-amount">
                                    <span>₹{{ $cause->amount ?? 'N/A' }}</span>
                                    <i>Target Donation</i>
                                </div>
                                <div class="raised-amount">
                                        <?php
                                        $sumOfAmount = sumOfReceivedAmount($cause->id);
                                        ?>
                                    <span>₹{{$sumOfAmount}}</span>
                                    <i>Raised Donation</i>
                                </div>
                            </div>
                            <div class="cause-meta">
                                    <?php
                                    $getReceivedAmount = getReceivedAmount($cause->id , $cause->amount);
                                    ?>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                                         aria-valuenow="{{$getReceivedAmount}}" aria-valuemin="0" aria-valuemax="{{$cause->amount}}"
                                         style="width:{{$getReceivedAmount}}%">
                                    </div>
                                </div>
                                <span>{{$getReceivedAmount}}%</span>
                                <h2><a href="{{ url('cause-details', $cause->slug) }}">{{ $cause->cause_title ?? 'N/A' }} </a></h2>
                                <p>
                                        <?php
                                        $projectcontent = \Str::limit( strip_tags($cause->cause_description), 350, $end='...') ;
                                        echo $projectcontent;
                                        ?>
{{--                                    {{ $cause->cause_description ?? 'N/A' }}--}}

                                </p>
                                <a href="{{ url('cause-details', $cause->slug) }}" title="" class="donate-me" data-ripple="">Read More</a>
                            </div>
                        </div>
                    </div>

                    @empty
                    @endforelse
                </div>
                <div class="holder"></div>
            </div>
        </div>
    </div>
</section><!-- our causes in 4 col -->

<section>
    <div class="gap blackish low-opacity">
        <div class="bg-image" style="background:url(images/resources/parallax-1.jpg);"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="paralex-section">
                        <h2>To Feed Children For a Week</h2>
                        <p>
                            Help today because tomorrow you may be the one who needs help!<br>
                            Forget what you can get and see what you can give.

                        </p>
                        <a href="{{url('cause/causes')}}" title="" class="button-large fromdown" data-ripple="">donate now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- parallax section -->

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="services">
                        <div class="services-icon">
                            <img src="assets/images/salary.png" alt="">
                        </div>
                        <div class="services-meta">
                            <h3>5000+</h3>
                            <h2>Money Donated</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services">
                        <div class="services-icon">
                            <img src="assets/images/blood-drop.png" alt="">
                        </div>
                        <div class="services-meta">
                            <h3>100+</h3>
                            <h2>Blood Donated</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services">
                        <div class="services-icon">
                            <img src="assets/images/donation.png" alt="">
                        </div>
                        <div class="services-meta">
                            <h3>150+</h3>
                            <h2>Life Saved</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="services">
                        <div class="services-icon">
                            <img src="assets/images/charity.png" alt="">
                        </div>
                        <div class="services-meta">
                            <h3>15+</h3>
                            <h2>Volunteer</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--@if($events)--}}
{{--<section>--}}
{{--    <div class="gap">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12">--}}
{{--                    <div class="heading-2">--}}
{{--                        <!-- <span>Latest causes</span> -->--}}
{{--                        @if(!empty($events))--}}
{{--                        <h4>upcoming <span>events</span></h4>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-12">--}}
{{--                    <div class="up-coming-event">--}}
{{--                        <div class="our-cause remove-ext-50 loader-data" id="itemContainer">--}}
{{--                            @foreach ($events as $event)--}}
{{--                            <div class="col-md-4 col-sm-4">--}}
{{--                                <div class="event-unit">--}}
{{--                                    <img src="{{ asset('events/feature_images/' . $event->feature_img) }}" alt="">--}}
{{--                                    <ul class="countdown style2">--}}
{{--                                        <li class="day">--}}
{{--                                            <p class="days_ref">day</p><span class="days">{{ $event->event_date--}}
{{--                                                }}</span>--}}
{{--                                        </li>--}}
{{--                                        <li><span class="">{{ $event->event_time }}</span></li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="event-meta">--}}
{{--                                        <span><i class="ion-ios-navigate"></i><em>In</em> {{ $event->location }}</span>--}}
{{--                                        <h2><a href="#" title="">{{ $event->name }}</a></h2>--}}
{{--                                        <p>{{ $event->desc }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="holder2"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--@endif--}}



<!--<section>-->
<!--    <div class="gap">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-sm-12">-->
<!--                    <div class="heading-2">-->
<!--                        <h4>WELCOME TO <span>JRJR INDIA</span></h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-12">-->
<!--                    <div class="up-coming-event">-->
<!--                        <div class="our-cause remove-ext-50 loader-data" id="itemContainer">-->
<!--                            <div class="col-md-4 col-sm-4">-->
<!--                                <div class="event-unit">-->
<!--                                    <img src="assets/images/cause_img1.jpg" alt="">-->

<!--                                    <div class="event-meta">-->
<!--                                        <span>Support Peoples<br>-->
<!--                                            Be Good to People</span>-->
<!--                                        <p>All children are our future. They all deserve our love. Join us to feed,-->
<!--                                            teach, protect, and nurture children in America...</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-4 col-sm-4">-->
<!--                                <div class="event-unit">-->
<!--                                    <img src="assets/images/save_animal.jpg" alt="">-->

<!--                                    <div class="event-meta">-->
<!--                                        <span>Support Peoples<br>-->
<!--                                            Be Good to People</span>-->
<!--                                        <p>Who loves or pursues or desires to obtain pain of itself, because it is all-->
<!--                                            pain , but occasionally occur which toil.......</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-4 col-sm-4">-->
<!--                                <div class="event-unit">-->
<!--                                    <img src="assets/images/save_plants.jpg" alt="">-->

<!--                                    <div class="event-meta">-->
<!--                                        <span>Support Peoples<br>-->
<!--                                            Be Good to People</span>-->
<!--                                        <p>Pleasure and praising pain was born and I will give you a complete account of-->
<!--                                            the ut system expound the actual teachings...</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="holder2"></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section>
    <div class="gap blackish low-opacity">
        <div class="parallax" style="background:url(images/resources/pagetop.jpg);" data-velocity="0.3"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="testi-style2">
                        <div class="heading-1">
                            <h4>TESTIMONIAL</h4>
                        </div>

                        <div class="testi-monials fadein">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active fade in" id="admin-1">
                                    <p>
                                        I always want to join charity activities. Their activities gave me a lot of
                                        experience,
                                        i go to many land, meet many people and know that there are many poor people
                                        that need our help.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="admin-2">
                                    <p>
                                        I always want to join charity activities. Their activities gave me a lot of
                                        experience,
                                        i go to many land, meet many people and know that there are many poor people
                                        that need our help.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="admin-3">
                                    <p>
                                        I always want to join charity activities. Their activities gave me a lot of
                                        experience,
                                        i go to many land, meet many people and know that there are many poor people
                                        that need our help.
                                    </p>
                                </div>
                            </div>
                            <ul class="nav nav-tabs testi-admin">
                                <li>
                                    <a href="#admin-1" aria-controls="admin-1" data-toggle="tab">
                                        <img src="dist/images/resources/testimonial.png" width="20px" alt="">
                                        
                                    </a>
                                    <span>Chirag</span>
                                    
                                </li>
                                <li class="active">
                                    <a href="#admin-2" aria-controls="admin-2" data-toggle="tab">
                                        <img src="dist/images/resources/testimonial.png" width="20px" alt="">
                                        
                                    </a>
                                    <span>Brian</span>
                                    
                                </li>
                                <li>
                                    <a href="#admin-3" aria-controls="admin-3" data-toggle="tab">
                                        <img src="dist/images/resources/testimonial.png" width="20px" alt="">
                                    </a>
                                    <span>Jess</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- testimonial tabs style1 with parallax -->




@endsection
