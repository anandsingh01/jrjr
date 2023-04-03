@extends('layouts.header')
@section('css')
    <title>{{$cause->cause_title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <style>
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

                                <div class="container1 mt-5">
                                    <div class="row">
                                        <div class="" style="width:100%">
                                            <!-- Nav tabs -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#home" role="tab">
                                                                <i class="now-ui-icons objects_umbrella-13"></i> Overview
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                                                <i class="now-ui-icons shopping_cart-simple"></i> Documents
                                                            </a>
                                                        </li>
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
                                                                @if(!empty($cause->causeDocuments))
                                                                    @foreach($cause->causeDocuments as $causeDocuments)
                                                                        <div class="column">
                                                                            <img src="{{asset($causeDocuments->file)}}" alt="Nature">
                                                                        </div>
                                                                    @endforeach
                                                                @endif
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
                                        <button type="button" class="button-small" data-toggle="modal" data-backdrop="false" data-target="#kt_modal_bidding_form">
                                            Contribute
                                        </button>
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


                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                                            <li class="nav-item active">
                                                <a class="nav-link" data-toggle="tab" href="#most_generous" role="tab">
                                                    <i class="now-ui-icons objects_umbrella-13"></i> Most generous
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#recent-donors" role="tab">
                                                    <i class="now-ui-icons shopping_cart-simple"></i> Recent Donors
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane" id="most_generous" role="tabpanel">
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
                                            </div>
                                            <div class="tab-pane" id="recent-donors" role="tabpanel">

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
