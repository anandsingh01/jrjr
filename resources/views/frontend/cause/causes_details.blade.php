@extends('layouts.header')
@section('css')
    <title>{{$cause->cause_title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <style>

    @media(max-width: 800px){
        .detail-meta>h1 {
font-size: 20px;
    }}
    .holder2{
        margin-top: 0px !important;
    }
        .d-none{
            display:none;
        }

        a.right.carousel-control i.fa.fa-chevron-right {
            position: absolute;
            top: 50%;
        }
        a.left.carousel-control i.fa.fa-chevron-left {
            position: absolute;
            top: 50%;
        }


        /*.iconic-tab li a{*/
        /*    color: #fff;*/
        /*    display: block;*/
        /*    font-size: 12px;*/
        /*    font-weight: bold;*/
        /*    letter-spacing: 0.6px;*/
        /*    padding: 13px 20px;*/
        /*    text-transform: capitalize;*/
        /*}*/

        .iconic-tab.documents_tabs_style .tab-btn li a{
            padding: 10px 0;
            color: black;
            font-size: 17px;
            /*border-radius: 13px;*/

        }
        .iconic-tab.documents_tabs_style .tab-btn li.active a{
            color: white;
        }
        .iconic-tab .tab-btn li {
  margin-right: 2px;
  text-align: center;
  width: 140px;
}

.supporters_tabs{
    margin-top: 0 !important;
    display: flex !important;
    justify-content: center !important;
}

.supporters_tabs li{
    width: auto !important;
}

.supporters_tabs li a{
    font-size: 15px !important;
    padding: 10px 8px !important;
    color: black !important;
}
.supporters_tabs li.active a{

    color: white !important;
}
    </style>

    <style>
        .modalDialog {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 999999999999;
    opacity:0;
    -webkit-transition: opacity 100ms ease-in;
    -moz-transition: opacity 100ms ease-in;
    transition: opacity 100ms ease-in;
    pointer-events: none;
}
.modalDialog:target {
    opacity:1;
    pointer-events: auto;
}
.modalDialog > div {
    max-width: 800px;
    width: 90%;
    position: relative;
    margin: 5% auto;
    padding: 20px;
    border-radius: 3px;
    background: #fff;
}
.close {
    font-family: Arial, Helvetica, sans-serif;
    background: #00a859;
    color: #fff;
    line-height: 25px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -10px;
    width: 34px;
    height: 34px;
    text-decoration: none;
    font-weight: bold;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -moz-box-shadow: 1px 1px 3px #000;
    -webkit-box-shadow: 1px 1px 3px #000;
    box-shadow: 1px 1px 3px #000;
    padding-top: 5px;
    opacity: 1 !important;
}
.close:hover {
    background: #179d5e;
    color: white;
}



.wizard-btn{
    float: none !important;
    width: auto !important;
    padding: 0 13px !important;
}




/* toggle btn*/

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #00a859;
}

input:focus + .slider {
  box-shadow: 0 0 1px #00a859;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.camp_detail_main p{
    font-size: 15px;
    font-weight: 500;
    margin: 7px 0;
    color: black;
}
.camp_detail_bold{
    font-size: 15px;
    font-weight: 500;
    color: #00a859;
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
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        @if(sizeof($cause->causeImages) > 0)
                                            @foreach($cause->causeImages as $key => $causeImages)
                                                <div class="item {{$key == 1 ? 'active' : ''}}">
                                                    <img class="first-slide" src="{{asset($causeImages->file)}}" alt="First slide">
                                                </div>
                                            @endforeach
                                        @endif
                                        {{--                                        <div class="item">--}}
                                        {{--                                            <img class="second-slide" src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="Second slide">--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="item">--}}
                                        {{--                                            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </main>
                            <div class="detail-meta">
                                <ul class="post-time">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i><a href="#" title="">
                                            {{ date('M d Y', strtotime($cause->created_at)) }}
                                        </a></li>
                                    <li><i class="fa fa-map-marker"></i>In {{$cause->causePatient->state}}</li>

                                    <li><i class="fa fa-calendar-times-o"></i>Added By <a href="#" title=""> @if(!empty($cause->Campaigner)) {{$cause->Campaigner->name}}@endif</a></li>
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



                                <!--   tab from theme-->
                                <div class="iconic-tab fadein animated fadeIn documents_tabs_style">
                                    <ul class="nav nav-tabs tab-btn">
                                        <li class="active">
                                            <a href="#overview" data-toggle="tab" aria-expanded="false">Overview</a>
                                        </li>
                                        <li class="">
                                            <a href="#documents" data-toggle="tab" aria-expanded="true">Documents</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="overview">
                                            <div class="column">
                                                <p>
                                                    <?php
                                                        echo $cause->cause_description;
                                                    ?>
                                                </p>
                                                <p>Progressively maintain vertical results after focused mindshare rather Dynamically exploit web-enabled synergy...</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="documents">
                                            @if(!empty($cause->causeDocuments))
                                                @foreach($cause->causeDocuments as $causeDocuments)
                                                    <div class="column" style="padding: 20px">
                                                        <a href="{{asset($causeDocuments->file)}}" target="__blank" data-showsocial="false" class="html5lightbox" data-group="set2" title="">
                                                            <img src="{{asset($causeDocuments->file)}}" alt="Documents">
                                                            </a>

                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--   tab from theme-->


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
                                        <span>₹ {{$getReceivedAmount}}</span></h2>
                                    <p>raised of <b>₹{{$cause->amount}}</b> target by {{$getTotalUser}} supporters</p>
                                    <!--begin::Primary button-->
                                    @if(Auth::check())
                                        <!--<button type="button" class="button-small" data-toggle="modal" data-backdrop="false" data-target="#openModal-about">-->
                                        <!--    Contribute-->
                                        <!--</button>-->
                                        <a type="button" class="button-small" href="#openModal-about">Contribute</a>
                                    @else
                                        <a href="{{url('login')}}" class="button-small er contrin">
                                            Contribute
                                        </a>

                                    @endif



                                    <!-- Button trigger modal -->





                                </div>
                            </div>

                            @if(!empty($cause->Campaigner))
                                <div class="widget fadein">
                                    <h4 class="widget-title">Campaigner</h4>
                                    <ul class="latest posts">
                                        <li>
                                            <div class="latest-meta1 camp_detail_main">
                                                <p class=""><span class="camp_detail_bold">Campaigner :</span>  <?php
                                                                               print_r($cause->Campaigner->name);
                                                                               ?></p>
                                                <p><span class="camp_detail_bold">Fundraise Date :</span> {{$cause->created_at}}</p>
                                                <p><span class="camp_detail_bold">Needed Till :</span> {{$cause->date_by_when_you_need}}</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            <!-- latest posts -->
                            <div class="widget fadein">
                                <h4 class="widget-title">Supporters</h4>
                                <!-- RH: this is bootstrap 5 tabbed panel -->



                                <div class="iconic-tab fadein animated fadeIn">
                                    <ul class="nav nav-tabs tab-btn supporters_tabs">
                                        <li class="active">
                                            <a href="#most_generous" data-toggle="tab" aria-expanded="true">Most generous</a>
                                        </li>
                                        <li class="">
                                            <a href="#recent-donors" data-toggle="tab" aria-expanded="false">Recent Donors</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="most_generous">
                                            <div class="column">
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
                                                {{-- <div class='pagination-container' >
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
                                                </div> --}}

                                                <div class="holder2 pagination">
                                                    <a class="jp-current">1</a>
                                                    <a class="">2</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="recent-donors">
                                                    <div class="column">
                                                        <table class="table table-striped table-class" id="table-id2">

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

                                                {{-- <div class='pagination-container' >
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
                                                </div> --}}
                                                <div class="holder2 pagination">
                                                    <a class="jp-current">1</a>
                                                    <a class="">2</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- sporters -->
                            <!--<div class="widget fadein">-->
                            <!--    <h4 class="widget-title">tags cloud</h4>-->
                            <!--    <ul class="tags-cloud">-->
                            <!--        <li><a href="#" title="">Charity</a></li>-->
                            <!--        <li><a href="#" title="">Fund Raising</a></li>-->
                            <!--        <li><a href="#" title="">Food</a></li>-->
                            <!--        <li><a href="#" title="">Hungry Children</a></li>-->
                            <!--        <li><a href="#" title="">Events</a></li>-->
                            <!--    </ul>-->
                            <!--</div>-->

                        </aside>
                    </div>
                    <!-- side widgets -->
                </div>
            </div>
        </div>
    </section>
    <!-- single detail page with sidebar -->
    {{--@include('frontend.cause.add_fund_raise_modal')--}}
    <!-- Modal -->
    <div class="modal" id="kt_modal_bidding_form" tabindex="-1" role="dialog"
         aria-labelledby="kt_modal_bidding_form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Choose your donation amount
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--begin:Form-->
                    <form action="{{route('razorpay')}}" method="post" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
                        <!--begin::Heading-->
                        @csrf
                        <div class="mb-13 text-center">

                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">
                                Most Donors donate approx given amount <a href="#" class="fw-bold link-primary"> to this fundraiser</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Input group-->
                        <div class="row mb-8 fv-row fv-plugins-icon-container">
                            <div class="col-md-12">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Amount</span>
                                    <i class="fa fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify the bid amount to place in." data-bs-original-title="Specify the bid amount to place in." data-kt-initialized="1"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Bid options-->
                                <div class="d-flex flex-stack gap-5 mb-3">
                                    <button type="button" class="btn btn-light-primary w-100 preamount" data-price="1000" data-kt-modal-bidding="option">1000</button>
                                    <button type="button" class="btn btn-light-primary w-100 preamount" data-price="2500" data-kt-modal-bidding="option">2500</button>
                                    <button type="button" class="btn btn-light-primary w-100 preamount" data-price="5000" data-kt-modal-bidding="option">5000</button>
                                </div>
                                <!--begin::Bid options-->
                                <input type="text" class="form-control form-control-solid bidamount" placeholder="Enter Bid Amount" name="amount">
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>

                        </div>
                        <!--end::Input group-->

                        {{--                        <!--begin::Input group-->--}}
                        {{--                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">--}}
                        {{--                            <!--begin::Label-->--}}
                        {{--                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">--}}
                        {{--                                <span class="required">Name</span>--}}
                        {{--                                <i class="fa fa-exclamation-circle ms-2 fs-7"></i>--}}
                        {{--                            </label>--}}
                        {{--                            <!--end::Label-->--}}
                        {{--                            <input type="text" class="form-control form-control-solid" placeholder="Enter name"--}}
                        {{--                                   value="{{Auth::user()->name ?? ''}}" name="name">--}}
                        {{--                            <div class="fv-plugins-message-container invalid-feedback"></div>--}}

                        {{--                        </div>--}}
                        {{--                        <!--end::Input group-->--}}

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Email</span>
                                <i class="fa fa-exclamation-circle ms-2 fs-7"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter email"
                                   value="{{Auth::user()->email ?? ''}}"
                                   name="email">
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Your Mobile Number</span>
                                <i class="fa fa-exclamation-circle ms-2 fs-7"></i>
                            </label>
                            <!--end::Label-->
                            <input type="number" class="form-control form-control-solid" placeholder="Enter number"
                                   value="{{Auth::user()->number ?? ''}}"
                                   name="number">
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                        </div>
                        <!--end::Input group-->


                        {{--                        <!--begin::Input group-->--}}
                        {{--                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">--}}
                        {{--                            <!--begin::Label-->--}}
                        {{--                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">--}}
                        {{--                                <span class="required">Address</span>--}}
                        {{--                                <i class="fa fa-exclamation-circle ms-2 fs-7"></i>--}}
                        {{--                            </label>--}}
                        {{--                            <!--end::Label-->--}}
                        {{--                            <input type="text" class="form-control form-control-solid" placeholder="Enter address" name="address">--}}
                        {{--                            <div class="fv-plugins-message-container invalid-feedback"></div>--}}

                        {{--                        </div>--}}
                        {{--                        <!--end::Input group-->--}}

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="">Anonymous</span>
                            </label>
                            <!--end::Label-->
                            <select name="show_anonymous">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            {{--                        <input type="checkbox" class="form-control form-control-solid" name="show_anonymous">--}}
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                        </div>
                        <!--end::Input group-->

                        <input type="hidden" name="fundraiser_title" value="{{$cause->cause_title}}"/>
                        <input type="hidden" name="fundraiser_id" value="{{$cause->id}}"/>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">
                                Cancel
                            </button>

                            <button type="submit" class="btn btn-primary" id="rzp-button1" data-kt-modal-action-type="submit">
                                {{--                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>--}}
                                <span class="indicator-label">
                                Submit <span class="payingprice"></span>
                            </span>
                                <span class="indicator-progress d-none">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>

            </div>
        </div>
    </div>


     <div id="openModal-about" class="modalDialog">
      <div>
         <a href="#close" title="Close" class="close">X</a>
         <form action="{{route('razorpay')}}" method="post" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
                        <!--begin::Heading-->
                        @csrf
                        <div class="mb-13 text-center">

                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">
                                Most Donors donate approx given amount <a href="#" class="fw-bold link-primary"> to this fundraiser</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Input group-->
                        <div class="row mb-8 fv-row fv-plugins-icon-container">
                            <div class="col-md-12">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Choose a Donation Amount</span>
                                    <i class="fa fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify the bid amount to place in." data-bs-original-title="Specify the bid amount to place in." data-kt-initialized="1"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Bid options-->
                                {{-- <div class="d-flex flex-stack gap-5 mb-3">
                                    <button type="button" class="btn btn-light-primary w-100 preamount" data-price="1000" data-kt-modal-bidding="option">1000</button>
                                    <button type="button" class="btn btn-light-primary w-100 preamount" data-price="2500" data-kt-modal-bidding="option">2500</button>
                                    <button type="button" class="btn btn-light-primary w-100 preamount" data-price="5000" data-kt-modal-bidding="option">5000</button>
                                </div> --}}
                                <ul class="pay-carrier tab tab-btn">
                                                                <li class="">
                                                                    <a href="" class="preamount" data-price="1000" data-kt-modal-bidding="option" data-toggle="tab" title="" data-ripple="" aria-expanded="true">1000<span class="ripple"><span class="ink"></span></span></a>
                                                                </li>
                                                                <li class="">
                                                                    <a href="" class="preamount" data-price="2500" data-kt-modal-bidding="option" data-toggle="tab" title="" data-ripple="" aria-expanded="true">2500<span class="ripple"><span class="ink"></span></span></a>
                                                                </li>
                                                                <li class="">
                                                                    <a href="" class="preamount" data-price="5000" data-kt-modal-bidding="option" data-toggle="tab" title="" data-ripple="" aria-expanded="true">5000<span class="ripple"><span class="ink"></span></span></a>
                                                                </li>
                                                            </ul>
                                <!--begin::Bid options-->
                                <input type="number" class="form-control form-control-solid bidamount" placeholder="Enter Other Amount" name="amount">
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                            </div>

                        </div>
                        <!--end::Input group-->

                        {{--                        <!--begin::Input group-->--}}
                        {{--                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">--}}
                        {{--                            <!--begin::Label-->--}}
                        {{--                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">--}}
                        {{--                                <span class="required">Name</span>--}}
                        {{--                                <i class="fa fa-exclamation-circle ms-2 fs-7"></i>--}}
                        {{--                            </label>--}}
                        {{--                            <!--end::Label-->--}}
                        {{--                            <input type="text" class="form-control form-control-solid" placeholder="Enter name"--}}
                        {{--                                   value="{{Auth::user()->name ?? ''}}" name="name">--}}
                        {{--                            <div class="fv-plugins-message-container invalid-feedback"></div>--}}

                        {{--                        </div>--}}
                        {{--                        <!--end::Input group-->--}}

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Email</span>
                                <i class="fa fa-exclamation-circle ms-2 fs-7"></i>
                            </label>
                            <!--end::Label-->
                            <input type="email" class="form-control form-control-solid" placeholder="Enter email"
                                   value="{{Auth::user()->email ?? ''}}"
                                   name="email">

                            <div class="fv-plugins-message-container invalid-feedback"></div>

                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Your Mobile Number</span>
                                <i class="fa fa-exclamation-circle ms-2 fs-7"></i>
                            </label>
                            <!--end::Label-->
                            <input type="number" class="form-control form-control-solid" placeholder="Enter number"
                                   value="{{Auth::user()->number ?? ''}}"
                                   name="number">
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                        </div>
                        <!--end::Input group-->


                        {{--                        <!--begin::Input group-->--}}
                        {{--                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">--}}
                        {{--                            <!--begin::Label-->--}}
                        {{--                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">--}}
                        {{--                                <span class="required">Address</span>--}}
                        {{--                                <i class="fa fa-exclamation-circle ms-2 fs-7"></i>--}}
                        {{--                            </label>--}}
                        {{--                            <!--end::Label-->--}}
                        {{--                            <input type="text" class="form-control form-control-solid" placeholder="Enter address" name="address">--}}
                        {{--                            <div class="fv-plugins-message-container invalid-feedback"></div>--}}

                        {{--                        </div>--}}
                        {{--                        <!--end::Input group-->--}}

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="">Anonymous</span>
                            </label>
                            <!--end::Label-->
                            <!--<select name="show_anonymous">-->
                            <!--    <option value="0">No</option>-->
                            <!--    <option value="1">Yes</option>-->
                            <!--</select>-->
                            <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                            {{--                        <input type="checkbox" class="form-control form-control-solid" name="show_anonymous">--}}
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                        </div>
                        <!--end::Input group-->

                        <input type="hidden" name="fundraiser_title" value="{{$cause->cause_title}}"/>
                        <input type="hidden" name="fundraiser_id" value="{{$cause->id}}"/>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--<button type="reset"  class="btn btn-light me-3" data-kt-modal-action-type="cancel">-->
                            <!--    Cancel-->
                            <!--</button>-->

                            <button type="submit" class="wizard-btn" id="rzp-button1" data-kt-modal-action-type="submit">
                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                <span class="indicator-label">
                                Submit <span class="payingprice"></span>
                            </span>
                              <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
{{--                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>--}}
{{--                            <button type="submit" id="rzp-button1" data-kt-modal-action-type="submit" class="wizard-btn" data-ripple="">Submit <span class="payingprice"></span></button>--}}
                        </div>
                        <!--end::Actions-->
                    </form>
       </div>
   </div>







@endsection
@section('js')
    <script>
        $(".bidamount").on("keyup change", function(e) {
            // do stuff!
            var bidamountke = $(this).val();
            $('.payingprice').html(bidamountke);
        });

        $('.preamount').on('click',function(){
            var amount = $(this).attr('data-price');
            $('.bidamount').val(amount);
            $('.payingprice').html(amount);
            // $('#scriptTagRazory').setAttribute('data-amount',amount);
        });
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
@endsection
