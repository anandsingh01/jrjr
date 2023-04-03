@extends('layouts.header')
@section('css')
    <title>{{$cause->cause_title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ion.calendar/2.0.2/js/ion.calendar.min.js"></script>
    <style>
        a.btn.button.xl-btn.er.fs-6.px-8.py-4 {
            box-shadow: 0px 1px 7px 3px #ddd;
        }
        .card-header li.active {
            background: #ddd;
        }
        .progress-bar.progress-bar-striped.active {
            background: #00A859;
        }

        .card .nav-item .card .nav-link,
        .card .nav-tabs .card .nav-link {
            -webkit-transition: all 300ms ease 0s;
            -moz-transition: all 300ms ease 0s;
            -o-transition: all 300ms ease 0s;
            -ms-transition: all 300ms ease 0s;
            transition: all 300ms ease 0s;
        }

        .card a {
            -webkit-transition: all 150ms ease 0s;
            -moz-transition: all 150ms ease 0s;
            -o-transition: all 150ms ease 0s;
            -ms-transition: all 150ms ease 0s;
            transition: all 150ms ease 0s;
        }

        [data-toggle="collapse"][data-parent="#accordion"] i {
            -webkit-transition: transform 150ms ease 0s;
            -moz-transition: transform 150ms ease 0s;
            -o-transition: transform 150ms ease 0s;
            -ms-transition: all 150ms ease 0s;
            transition: transform 150ms ease 0s;
        }

        [data-toggle="collapse"][data-parent="#accordion"][aria-expanded="true"] i {
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
        }


        .now-ui-icons {
            display: inline-block;
            font: normal normal normal 14px/1 'Nucleo Outline';
            font-size: inherit;
            speak: none;
            text-transform: none;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        @-webkit-keyframes nc-icon-spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @-moz-keyframes nc-icon-spin {
            0% {
                -moz-transform: rotate(0deg);
            }

            100% {
                -moz-transform: rotate(360deg);
            }
        }

        @keyframes nc-icon-spin {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .now-ui-icons.objects_umbrella-13:before {
            content: "\ea5f";
        }

        .now-ui-icons.shopping_cart-simple:before {
            content: "\ea1d";
        }

        .now-ui-icons.shopping_shop:before {
            content: "\ea50";
        }

        .now-ui-icons.ui-2_settings-90:before {
            content: "\ea4b";
        }

        .card .nav-tabs {
            border: 0;
            padding: 15px 0.7rem;
        }

        .card .nav-tabs:not(.nav-tabs-neutral)>.nav-item>.nav-link.active {
            box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.1);
        }

        .card .nav-tabs {
            border-top-right-radius: 0.1875rem;
            border-top-left-radius: 0.1875rem;
        }

        .card .nav-tabs>.nav-item>.nav-link {
            color: #888888;
            margin: 0;
            margin-right: 5px;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 30px;
            font-size: 14px;
            padding: 5px 15px;
            line-height: 1.5;
        }

        .card .nav-tabs>.nav-item>.nav-link:hover {
            background-color: transparent;
        }

        .card .nav-tabs>.nav-item>.nav-link.active {
            background-color: #444;
            border-radius: 30px;
            color: #FFFFFF;
        }

        .card .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
            font-size: 14px;
            position: relative;
            top: 1px;
            margin-right: 3px;
        }

        .card .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link {
            color: #FFFFFF;
        }

        .card .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #FFFFFF;
        }

        .card {
            border: 0;
            height:auto;
            border-radius: 0.1875rem;
            display: inline-block;
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
        }

        .card .card-header {
            background-color: transparent;
            border-bottom: 0;
            background-color: transparent;
            border-radius: 0;
            padding: 0;
        }

        .card[data-background-color="orange"] {
            background-color: #f96332;
        }

        .card[data-background-color="red"] {
            background-color: #FF3636;
        }

        .card[data-background-color="yellow"] {
            background-color: #FFB236;
        }

        .card[data-background-color="blue"] {
            background-color: #2CA8FF;
        }

        .card[data-background-color="green"] {
            background-color: #15b60d;
        }

        [data-background-color="orange"] {
            background-color: #e95e38;
        }

        [data-background-color="black"] {
            background-color: #2c2c2c;
        }

        [data-background-color]:not([data-background-color="gray"]) {
            color: #FFFFFF;
        }

        [data-background-color]:not([data-background-color="gray"]) p {
            color: #FFFFFF;
        }

        [data-background-color]:not([data-background-color="gray"]) a:not(.btn):not(.dropdown-item) {
            color: #FFFFFF;
        }

        [data-background-color]:not([data-background-color="gray"]) .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
            color: #FFFFFF;
        }


        @font-face {
            font-family: 'Nucleo Outline';
            src: url("https://github.com/creativetimofficial/now-ui-kit/blob/master/assets/fonts/nucleo-outline.eot");
            src: url("https://github.com/creativetimofficial/now-ui-kit/blob/master/assets/fonts/nucleo-outline.eot") format("embedded-opentype");
            src: url("https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/fonts/nucleo-outline.woff2");
            font-weight: normal;
            font-style: normal;

        }

        .now-ui-icons {
            display: inline-block;
            font: normal normal normal 14px/1 'Nucleo Outline';
            font-size: inherit;
            speak: none;
            text-transform: none;
            /* Better Font Rendering */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        @media screen and (max-width: 768px) {

            .nav-tabs {
                display: inline-block;
                width: 100%;
                padding-left: 100px;
                padding-right: 100px;
                /*text-align: center;*/
            }

            .nav-tabs .nav-item>.nav-link {
                margin-bottom: 5px;
            }
        }


        .main .container .swiper-container .swiper-wrapper .swiper-slide .card-image {
            background: #fff;
            border: none;
            outline: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 3px rgba(0, 0, 0, 0.24);
            border-radius: 2px;
        }
        .main .container .swiper-container .swiper-wrapper .swiper-slide .card-image img {
            display: block;
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .main .container .swiper-container .swiper-pagination-bullet {
            opacity: 0.8;
            background: #252a32;
        }
        .main .container .swiper-container .swiper-pagination-bullet-active {
            background: #fff;
        }
        .main .container .swiper-container .swiper-button-next, .main .container .swiper-container .swiper-button-prev {
            background-image: none;
            background-size: 0;
            background-repeat: no-repeat;
            background-position: 0;
            margin-top: -1rem;
        }
        .main .container .swiper-container .swiper-button-next .arrow-icon, .main .container .swiper-container .swiper-button-prev .arrow-icon {
            font-size: 2rem;
            color: #fff;
        }
    </style>

    <style>

        /* The grid: Four equal columns that floats next to each other */
        #profile .column {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        #profile .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        #profile .column img:hover {
            opacity: 1;
        }


        /* The expanding image container (positioning is needed to position the close button and the text) */
        #profile .container {
            position: relative;
            display: none;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }
    </style>

    <style>

        table th , table td{
            text-align: center;
        }

        table tr:nth-child(even){
            background-color: #BEF2F5
        }

        .pagination li:hover{
            cursor: pointer;
        }

        aside .widget {
            margin-bottom: 40px;
            padding: 10px;
            box-shadow: 2px 2px 5px #ddd;
        }

    </style>
@stop
@section('content')

    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="detail-page">
                            <main class="main">
                                <div class="container">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @if(!empty($cause->causeImages))
                                                @foreach($cause->causeImages as $causeImages)
                                                <div class="swiper-slide">
                                                    <div class="card-image">
                                                        <img src="{{asset($causeImages->file)}}" alt="Image Slider">
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="swiper-slide">
                                                    <div class="card-image">
                                                        <img src="https://source.unsplash.com/1280x720/?nature" alt="Image Slider">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- Add Scrollbar -->
                                        <div class="swiper-button-next">
                                            <i class="fa fa-chevron-circle-right arrow-icon"></i>
                                        </div>
                                        <div class="swiper-button-prev">
                                            <i class="fa fa-chevron-circle-left arrow-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </main>
                            <div class="detail-meta">
                                <ul class="post-time">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i><a href="#" title="">
                                            {{ date('M d Y', strtotime($cause->created_at)) }}
                                        </a></li>
                                    <li><i class="fa fa-map-marker"></i>In South Africa</li>
                                    <li><i class="fa fa-calendar-times-o"></i>By <a href="#" title="">{{ date('M d Y', strtotime($cause->date_by_when_you_need)) }}</a></li>
                                    <li class="shareon">
                                        <i class="fa fa-share"></i><a href="#" title="">share on</a>
                                        <ul>
                                            <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
{{--                                            <li><a href="#" title=""><i class="is"></i></a></li>--}}
                                        </ul>
                                    </li>
                                </ul>

                                <h1>{{ $cause->cause_title ?? 'N/A' }}</h1>
                                <div class="progrez-bar">
                                    <?php
                                    $getReceivedAmount = getReceivedAmount($cause->id , $cause->amount);
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar"
                                             aria-valuenow="{{$getReceivedAmount}}" aria-valuemin="0"
                                             aria-valuemax="{{$cause->amount}}"
                                             style="width:{{$getReceivedAmount}}%">
                                        </div>
                                    </div>
                                </div>

                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="ml-auto mr-auto">
                                            <!-- Nav tabs -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#home" role="tab">
                                                                <i class="now-ui-icons objects_umbrella-13"></i> Home
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                                                <i class="now-ui-icons shopping_cart-simple"></i> Profile
                                                            </a>
                                                        </li>
{{--                                                        <li class="nav-item">--}}
{{--                                                            <a class="nav-link" data-toggle="tab" href="#messages" role="tab">--}}
{{--                                                                <i class="now-ui-icons shopping_shop"></i> Messages--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="nav-item">--}}
{{--                                                            <a class="nav-link" data-toggle="tab" href="#settings" role="tab">--}}
{{--                                                                <i class="now-ui-icons ui-2_settings-90"></i> Settings--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="home" role="tabpanel">
                                                            <?php
                                                                echo $cause->cause_description;
                                                            ?>
                                                        </div>
                                                        <div class="tab-pane" id="profile" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        @if(!empty($cause->causeDocuments))
                                                                            @foreach($cause->causeDocuments as $causeDocuments)
                                                                                <div class="column">
                                                                                    <img src="{{asset($causeDocuments->file)}}" alt="Nature" style="width:150px;" onclick="myFunction(this);">
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>

                                                                    <!-- The expanding image container -->
                                                                    <div class="container">
                                                                        <!-- Close the image -->
                                                                        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

                                                                        <!-- Expanded image -->
                                                                        <img id="expandedImg" style="width:100%">

                                                                        <!-- Image text -->
                                                                        <div id="imgtext"></div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- blog single -->
                    <div class="col-md-4 col-sm-12">
                        <aside>

                            <div class="widget fadein">
                                <div class="csuse-info" style="width: 100%;position:static">
                                    <h2>
                                        <?php
                                         $sumOfAmount = sumOfReceivedAmount($cause->id);
                                         $getTotalUser = getTotalUser($cause->id);
                                         ?>
                                        <span>₹ {{$getReceivedAmount}}
{{--                                            <i>Raised From ₹{{$sumOfAmount}}</i>--}}
                                           </span></h2>
                                    <p>raised of <b>₹{{$cause->amount}}</b> target by {{$getTotalUser}} supporters</p>
                                    <!--begin::Primary button-->
                                    @if(Auth::check())
                                        <a href="#" class="btn button xl-btn er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_bidding">
                                            Contribute
                                        </a>
                                    @else
                                        <a href="#" class="btn button xl-btn er fs-6 px-8 py-4 contrin" data-toggle="modal" data-target="#loginmodal">
                                            Contribute
                                        </a>
                                    @endif
                                    <!--end::Primary button-->
{{--                                     <a class="read_more_btn" data-bs-toggle="modal" data-bs-target="#addFundRaiseModal">Donate</a>--}}
                                </div>
                            </div>

                            @if(!empty($cause->Campaigner))
                            <div class="widget fadein">
                                <h4 class="widget-title">Campaigner</h4>
                                <ul class="latest posts">
                                    <li>
                                        <div class="latest-meta">
                                            <h4 class="">Campaigner :  <?php
                                                                       print_r($cause->Campaigner->name);
                                                                       ?></h4>
                                            <h2><a href="#" title="">Fundraise Date : {{$cause->created_at}}</a></h2>
                                            <h2><a href="#" title="">Needed Till : {{$cause->date_by_when_you_need}}</a></h2>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            <!-- latest posts -->
                            <div class="widget fadein">
                                <h4 class="widget-title">Supporters</h4>
                                <!-- RH: this is bootstrap 5 tabbed panel -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#most-generous" role="tab"
                                           aria-controls="most-generous" aria-selected="true">Most generous</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#recent-donors" role="tab"
                                           aria-controls="recent" aria-selected="false">Recent</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane active fadein" id="most-generous" role="tabpanel" aria-labelledby="most-generous">
                                        <div class="container">
{{--                                            <h2>Select Number Of Rows</h2>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <select class  ="form-control" name="state" id="maxRows">--}}
{{--                                                    <option value="5000">Show ALL Rows</option>--}}
{{--                                                    <option value="5">5</option>--}}
{{--                                                    <option value="10">10</option>--}}
{{--                                                    <option value="15">15</option>--}}
{{--                                                    <option value="20">20</option>--}}
{{--                                                    <option value="50">50</option>--}}
{{--                                                    <option value="70">70</option>--}}
{{--                                                    <option value="100">100</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
                                            <table class="table table-striped table-class" id= "table-id">

                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                </tr>

                                                </thead>

                                                <tbody>
                                                <?php
                                                $getTopDonors = getTopDonor($cause->id);
                                                ?>
                                                <?php
                                                if(!empty($getTopDonors)){
                                                    foreach($getTopDonors as $getTopDonor){
                                                ?>
                                                <tr>
                                                    <td>{{$getTopDonor->is_anonymous == '1' ? 'Well Wisher' : $getTopDonor->donor_name}}</td>
                                                    <td>{{number_format($getTopDonor->amount,2)}}</td>
                                                </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                </tbody>

                                            </table>
                                            <!--Start Pagination -->
                                            <div class='pagination-container' >
                                                <nav>
                                                    <ul class="pagination">

                                                        <li data-page="prev" >
                                                            <span> < <span class="sr-only">(current)</span></span>
                                                        </li>
                                                        <!--	Here the JS Function Will Add the Rows -->
                                                        <li data-page="next" id="prev">
                                                            <span> > <span class="sr-only">(current)</span></span>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div> <!-- End of Container -->

                                    </div>
                                    <div class="tab-pane fadein" id="recent-donors" role="tabpanel" aria-labelledby="recent-donors">
                                        <div class="container">
{{--                                            <h2>Select Number Of Rows</h2>--}}
                                            <div class="form-group">
{{--                                                <select class="form-control" name="state" id="maxRows2">--}}
{{--                                                    <option value="5000">Show ALL Rows</option>--}}
{{--                                                    <option value="5">5</option>--}}
{{--                                                    <option value="10">10</option>--}}
{{--                                                    <option value="15">15</option>--}}
{{--                                                    <option value="20">20</option>--}}
{{--                                                    <option value="50">50</option>--}}
{{--                                                    <option value="70">70</option>--}}
{{--                                                    <option value="100">100</option>--}}
{{--                                                </select>--}}
                                            </div>
                                            <table class="table table-striped table-class" id= "table-id2">

                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                </tr>

                                                </thead>

                                                <tbody>
                                                <?php
                                                $recentDonor = getRecentDonor($cause->id);
                                                ?>
                                                <?php
                                                if(!empty($recentDonor)){
                                                foreach($recentDonor as $recentDonors){
                                                    ?>
                                                <tr>
                                                    <td>{{$recentDonors->is_anonymous == '1' ? 'Well Wisher' : $recentDonors->donor_name}}</td>
                                                    <td>{{number_format($recentDonors->amount,2)}}</td>
                                                </tr>
                                                    <?php
                                                }
                                                }
                                                ?>
                                                </tbody>

                                            </table>
                                            <!--Start Pagination -->
                                            <div class='pagination-container' >
                                                <nav>
                                                    <ul class="pagination">

                                                        <li data-page="prev" >
                                                            <span> < <span class="sr-only">(current)</span></span>
                                                        </li>
                                                        <!--	Here the JS Function Will Add the Rows -->
                                                        <li data-page="next" id="prev">
                                                            <span> > <span class="sr-only">(current)</span></span>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div> <!-- End of Container -->

                                    </div>
                                </div>
                            </div>
                            <!-- sporters -->
                            <div class="widget fadein">
                                <h4 class="widget-title">tags cloud</h4>
                                <ul class="tags-cloud">
                                    <li><a href="#" title="">Charity</a></li>
                                    <li><a href="#" title="">Fund Raising</a></li>
                                    <li><a href="#" title="">Food</a></li>
                                    <li><a href="#" title="">Hungry Children</a></li>
                                    <li><a href="#" title="">Events</a></li>
                                </ul>
                            </div>

                        </aside>
                    </div>
                    <!-- side widgets -->
                </div>
            </div>
        </div>
    </section>
    <!-- single detail page with sidebar -->
    @include('frontend.cause.add_fund_raise_modal')
@endsection
@section('js')

    <script>
        $(".bidamount").on("keyup change", function(e) {
            // do stuff!
            var bidamountke = $(this).val();
            $('.payingprice').html(bidamountke);
        })
    </script>

        <script>
            getPagination('#table-id');


            function getPagination(table) {
                var lastPage = 1;

                $('#maxRows')
                    .on('change', function(evt) {
                        //$('.paginationprev').html('');						// reset pagination

                        lastPage = 1;
                        $('.pagination')
                            .find('li')
                            .slice(1, -1)
                            .remove();
                        var trnum = 0; // reset tr counter
                        var maxRows = parseInt($(this).val()); // get Max Rows from select option

                        if (maxRows == 5000) {
                            $('.pagination').hide();
                        } else {
                            $('.pagination').show();
                        }

                        // var totalRows = $(table + ' tbody tr').length; // numbers of rows
                        // $(table + ' tr:gt(0)').each(function() {
                        //     // each TR in  table and not the header
                        //     trnum++; // Start Counter
                        //     if (trnum > maxRows) {
                        //         // if tr number gt maxRows
                        //
                        //         $(this).hide(); // fade it out
                        //     }
                        //     if (trnum <= maxRows) {
                        //         $(this).show();
                        //     } // else fade in Important in case if it ..
                        // }); //  was fade out to fade it in
                        if (totalRows > maxRows) {
                            // if tr total rows gt max rows option
                            var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                            //	numbers of pages
                            for (var i = 1; i <= pagenum; ) {
                                // for each page append pagination li
                                $('.pagination #prev')
                                    .before(
                                        '<li data-page="' +
                                        i +
                                        '">\
                                                          <span>' +
                                        i++ +
                                        '<span class="sr-only">(current)</span></span>\
                                                        </li>'
                                    )
                                    .show();
                            } // end for i
                        } // end if row count > max rows
                        $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
                        $('.pagination li').on('click', function(evt) {
                            // on click each page
                            evt.stopImmediatePropagation();
                            evt.preventDefault();
                            var pageNum = $(this).attr('data-page'); // get it's number

                            var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

                            if (pageNum == 'prev') {
                                if (lastPage == 1) {
                                    return;
                                }
                                pageNum = --lastPage;
                            }
                            if (pageNum == 'next') {
                                if (lastPage == $('.pagination li').length - 2) {
                                    return;
                                }
                                pageNum = ++lastPage;
                            }

                            lastPage = pageNum;
                            var trIndex = 0; // reset tr counter
                            $('.pagination li').removeClass('active'); // remove active class from all li
                            $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
                            // $(this).addClass('active');					// add active class to the clicked
                            limitPagging();
                            $(table + ' tr:gt(0)').each(function() {
                                // each tr in table not the header
                                trIndex++; // tr index counter
                                // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                                if (
                                    trIndex > maxRows * pageNum ||
                                    trIndex <= maxRows * pageNum - maxRows
                                ) {
                                    $(this).hide();
                                } else {
                                    $(this).show();
                                } //else fade in
                            }); // end of for each tr in table
                        }); // end of on click pagination list
                        limitPagging();
                    })
                    .val(5)
                    .change();

                // end of on select change

                // END OF PAGINATION
            }

            function limitPagging(){
                // alert($('.pagination li').length)

                if($('.pagination li').length > 7 ){
                    if( $('.pagination li.active').attr('data-page') <= 3 ){
                        $('.pagination li:gt(5)').hide();
                        $('.pagination li:lt(5)').show();
                        $('.pagination [data-page="next"]').show();
                    }if ($('.pagination li.active').attr('data-page') > 3){
                        $('.pagination li:gt(0)').hide();
                        $('.pagination [data-page="next"]').show();
                        for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
                            $('.pagination [data-page="'+i+'"]').show();

                        }

                    }
                }
            }

            // $(function() {
            //     // Just to append id number for each row
            //     $('table tr:eq(0)').prepend('<th> ID </th>');
            //
            //     var id = 0;
            //
            //     $('table tr:gt(0)').each(function() {
            //         id++;
            //         $(this).prepend('<td>' + id + '</td>');
            //     });
            // });

            //  Developed By Yasser Mas
            // yasser.mas2@gmail.com

        </script>

        <script>
            getPagination2('#table-id2');


            function getPagination2(table) {
                var lastPage = 1;

                $('#maxRows2')
                    .on('change', function(evt) {
                        //$('.paginationprev').html('');						// reset pagination

                        lastPage = 1;
                        $('.pagination')
                            .find('li')
                            .slice(1, -1)
                            .remove();
                        var trnum = 0; // reset tr counter
                        var maxRows = parseInt($(this).val()); // get Max Rows from select option

                        if (maxRows == 5000) {
                            $('.pagination').hide();
                        } else {
                            $('.pagination').show();
                        }

                        // var totalRows = $(table + ' tbody tr').length; // numbers of rows
                        // $(table + ' tr:gt(0)').each(function() {
                        //     // each TR in  table and not the header
                        //     trnum++; // Start Counter
                        //     if (trnum > maxRows) {
                        //         // if tr number gt maxRows
                        //
                        //         $(this).hide(); // fade it out
                        //     }
                        //     if (trnum <= maxRows) {
                        //         $(this).show();
                        //     } // else fade in Important in case if it ..
                        // }); //  was fade out to fade it in
                        if (totalRows > maxRows) {
                            // if tr total rows gt max rows option
                            var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                            //	numbers of pages
                            for (var i = 1; i <= pagenum; ) {
                                // for each page append pagination li
                                $('.pagination #prev')
                                    .before(
                                        '<li data-page="' +
                                        i +
                                        '">\
                                                          <span>' +
                                        i++ +
                                        '<span class="sr-only">(current)</span></span>\
                                                        </li>'
                                    )
                                    .show();
                            } // end for i
                        } // end if row count > max rows
                        $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
                        $('.pagination li').on('click', function(evt) {
                            // on click each page
                            evt.stopImmediatePropagation();
                            evt.preventDefault();
                            var pageNum = $(this).attr('data-page'); // get it's number

                            var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

                            if (pageNum == 'prev') {
                                if (lastPage == 1) {
                                    return;
                                }
                                pageNum = --lastPage;
                            }
                            if (pageNum == 'next') {
                                if (lastPage == $('.pagination li').length - 2) {
                                    return;
                                }
                                pageNum = ++lastPage;
                            }

                            lastPage = pageNum;
                            var trIndex = 0; // reset tr counter
                            $('.pagination li').removeClass('active'); // remove active class from all li
                            $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
                            // $(this).addClass('active');					// add active class to the clicked
                            limitPagging();
                            $(table + ' tr:gt(0)').each(function() {
                                // each tr in table not the header
                                trIndex++; // tr index counter
                                // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                                if (
                                    trIndex > maxRows * pageNum ||
                                    trIndex <= maxRows * pageNum - maxRows
                                ) {
                                    $(this).hide();
                                } else {
                                    $(this).show();
                                } //else fade in
                            }); // end of for each tr in table
                        }); // end of on click pagination list
                        limitPagging();
                    })
                    .val(5)
                    .change();

                // end of on select change

                // END OF PAGINATION
            }

            function limitPagging(){
                // alert($('.pagination li').length)

                if($('.pagination li').length > 7 ){
                    if( $('.pagination li.active').attr('data-page') <= 3 ){
                        $('.pagination li:gt(5)').hide();
                        $('.pagination li:lt(5)').show();
                        $('.pagination [data-page="next"]').show();
                    }if ($('.pagination li.active').attr('data-page') > 3){
                        $('.pagination li:gt(0)').hide();
                        $('.pagination [data-page="next"]').show();
                        for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
                            $('.pagination [data-page="'+i+'"]').show();

                        }

                    }
                }
            }

            // $(function() {
            //     // Just to append id number for each row
            //     $('table tr:eq(0)').prepend('<th> ID </th>');
            //
            //     var id = 0;
            //
            //     $('table tr:gt(0)').each(function() {
            //         id++;
            //         $(this).prepend('<td>' + id + '</td>');
            //     });
            // });

            //  Developed By Yasser Mas
            // yasser.mas2@gmail.com

        </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{asset('/')}}assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('/')}}assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <script src="{{asset('/')}}assets/js/custom/utilities/modals/bidding.js"></script>
    <script src="{{ asset('dist/js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script>
        // Swiper Configuration
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: 1.5,
            spaceBetween: 10,
            centeredSlides: true,
            freeMode: true,
            grabCursor: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                500: {
                    slidesPerView: 1
                },
                700: {
                    slidesPerView: 1.5
                }
            }
        });

    </script>
    <script>
        $('.preamount').on('click',function(){
            var amount = $(this).attr('data-price');
            $('.bidamount').val(amount);
            $('.payingprice').html(amount);
            // $('#scriptTagRazory').setAttribute('data-amount',amount);
        });

        // Private functions
        const initForm = () => {
            // Dynamically create validation non-empty rule
            const requiredFields = form.querySelectorAll('.required');
            var detectedField;
            var validationFields = {
                fields: {},

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }

            // Detect required fields
            requiredFields.forEach(el => {
                const input = el.closest('.fv-row').querySelector('input');
                if (input) {
                    detectedField = input;
                }

                const textarea = el.closest('.fv-row').querySelector('textarea');
                if (textarea) {
                    detectedField = textarea;
                }

                const select = el.closest('.fv-row').querySelector('select');
                if (select) {
                    detectedField = select;
                }

                // Add validation rule
                const name = detectedField.getAttribute('name');
                validationFields.fields[name] = {
                    validators: {
                        notEmpty: {
                            message: el.innerText + ' is required'
                        }
                    }
                }
            });

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            var validator = FormValidation.formValidation(
                form,
                validationFields
            );

            // Submit button handler
            const submitButton = form.querySelector('[data-kt-modal-action-type="submit"]');
            submitButton.addEventListener('click', function (e) {
                // Prevent default button action
                e.preventDefault();
                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {


                        if (status == 'Valid') {
                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');

                            console.log('validated!');
                            // Disable button to avoid multiple click
                            submitButton.disabled = true;

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            var action = $('#kt_modal_bidding_form').attr('action');
                            var $this = $(this);
                            // var myForm = document.getElementById('checkout_form');
                            // myForm.submit();
                            // var formdata = new FormData(myForm);
                            $.ajax({
                                type: 'POST',
                                url: action,
                                data: $('#kt_modal_bidding_form').serialize(),
                                success: function(response) {
                                    console.log(response);
                                    return false;

                                    if (response.success) {
                                        console.log("comes");
                                        $("#order_id").val(response.order_id);
                                        $('.razorpay-payment-button').click();
                                        window.location.href = "{{ route('razorpay') }}";
                                    }
                                    // $('#place_order').removeAttr('disabled')
                                    // success(response); add this after mobile verification success
                                    // var user_id = response.user_id;
                                    // var location = $('#location_url').val();
                                    // window.location.href = location + '/' + user_id;
                                },
                                error: function(error) {
                                    $('#place_order').removeAttr('disabled')
                                    $.confirm({
                                        title: 'Checkout',
                                        content: "Error Placing Order",
                                        type: 'red',
                                        typeAnimated: true,
                                        theme: 'bootstrap',
                                        buttons: {
                                            OK: {
                                                text: 'OK',
                                                btnClass: 'btn-blue',
                                                action: function() {

                                                }
                                            },
                                            Close: function() {}
                                        }
                                    });
                                }
                            });

                            // return false;
                            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            setTimeout(function () {
                                // Remove loading indication
                                submitButton.removeAttribute('data-kt-indicator');

                                // Enable button
                                submitButton.disabled = false;

                                // Show popup confirmation
                                Swal.fire({
                                    text: "Form has been successfully submitted!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function () {
                                    //form.submit(); // Submit form
                                    form.reset();
                                    modal.hide();
                                });
                            }, 2000);
                        } else {
                            // Show popup error
                            Swal.fire({
                                text: "Oops! There are some error(s) detected.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                }
            });
        }
    </script>
    <script>
        function myFunction(imgs) {
            // Get the expanded image
            var expandImg = document.getElementById("expandedImg");
            // Get the image text
            var imgText = document.getElementById("imgtext");
            // Use the same src in the expanded image as the image being clicked on from the grid
            expandImg.src = imgs.src;
            // Use the value of the alt attribute of the clickable image as text inside the expanded image
            imgText.innerHTML = imgs.alt;
            // Show the container element (hidden with CSS)
            expandImg.parentElement.style.display = "block";
        }
    </script>
    {{--<script>--}}
    {{--  $('#addCustomerForm').on('submit', function(e) {--}}
    {{--      e.preventDefault();--}}
    {{--      var action = $('#addCustomerForm').attr('action');--}}
    {{--      var $this = $(this);--}}
    {{--      // var myForm = document.getElementById('checkout_form');--}}
    {{--      // myForm.submit();--}}
    {{--      // var formdata = new FormData(myForm);--}}
    {{--      $.ajax({--}}
    {{--          type: 'POST',--}}
    {{--          url: action,--}}
    {{--          data: $this.serialize(),--}}

    {{--          success: function(response) {--}}

    {{--              if (response.success) {--}}
    {{--                  console.log("comes");--}}
    {{--                  $("#order_id").val(response.order_id);--}}
    {{--                  $('.razorpay-payment-button').click();--}}
    {{--                  // window.location.href = "{{ route('razorpay') }}";--}}
    {{--              }--}}
    {{--              // $('#place_order').removeAttr('disabled')--}}
    {{--              // success(response); add this after mobile verification success--}}
    {{--              // var user_id = response.user_id;--}}
    {{--              // var location = $('#location_url').val();--}}
    {{--              // window.location.href = location + '/' + user_id;--}}
    {{--          },--}}
    {{--          error: function(error) {--}}
    {{--              $('#place_order').removeAttr('disabled')--}}
    {{--              $.confirm({--}}
    {{--                  title: 'Checkout',--}}
    {{--                  content: "Error Placing Order",--}}
    {{--                  type: 'red',--}}
    {{--                  typeAnimated: true,--}}
    {{--                  theme: 'bootstrap',--}}
    {{--                  buttons: {--}}
    {{--                      OK: {--}}
    {{--                          text: 'OK',--}}
    {{--                          btnClass: 'btn-blue',--}}
    {{--                          action: function() {--}}

    {{--                          }--}}
    {{--                      },--}}
    {{--                      Close: function() {}--}}
    {{--                  }--}}
    {{--              });--}}
    {{--          }--}}
    {{--      })--}}
    {{--  });--}}
    {{--
 </script>--}}
@endsection
