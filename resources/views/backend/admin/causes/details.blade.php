@extends('layouts.dashboard')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* The grid: Four equal columns that floats next to each other */
        .column {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container (positioning is needed to position the close button and the text) */
        .container {
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
@stop
@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                <!--begin::Card-->
                <div class="card card-flush pt-3 mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="fw-bold">{{$cause->cause_title}}</h2>
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-3">
                        <!--begin::Section-->
                        <div class="mb-10">
                            <!--begin::Title-->
                            <h5 class="mb-4">Patient's Details :</h5>
                            <!--end::Title-->
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap py-5">
                                <!--begin::Row-->
                                <div class="flex-equal me-5">
                                    <!--begin::Details-->
                                    <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                        <!--begin::Row-->
                                        <tbody>
                                        <tr>
                                            <td class="text-gray-400 min-w-175px w-175px">Patient's Name:</td>
                                            <td class="text-gray-800 min-w-200px">
                                                {{$cause->causePatient->fname}} {{$cause->causePatient->lname}}
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Address:</td>
                                            <td class="text-gray-800">
                                                {{$cause->causePatient->address}}, {{$cause->causePatient->locality}},
                                                {{$cause->causePatient->state}},   {{$cause->causePatient->city}},
                                                {{$cause->causePatient->pincode}}
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Phone:</td>
                                            <td class="text-gray-800">{{$cause->causePatient->mobile_no}}</td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Whatsapp no.:</td>
                                            <td class="text-gray-800">{{$cause->causePatient->whatapp_no}}</td>
                                        </tr>
                                        <!--end::Row-->
                                        </tbody>
                                    </table>
                                    <!--end::Details-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="flex-equal">
                                    <!--begin::Details-->
                                    <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                        <!--begin::Row-->
                                        <tbody>
                                        <tr>
                                            <td class="text-gray-400 min-w-175px w-175px">Cause:</td>
                                            <td class="text-gray-800 min-w-200px">
                                                {{$cause->causeCategory->category}}
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Cause Subcategory:</td>
                                            <td class="text-gray-800">
                                                @if(!empty($cause->causeSubCategory->sub_category))
                                                    {{$cause->causeSubCategory->sub_category}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Amount Required:</td>
                                            <td class="text-gray-800">
                                                {{number_format($cause->amount,2)}}
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Currency:</td>
                                            <td class="text-gray-800">INR</td>
                                        </tr>
                                        <!--end::Row-->
                                        </tbody>
                                    </table>
                                    <!--end::Details-->
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="flex-equal">
                                    <!--begin::Details-->
                                    <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                        <!--begin::Row-->
                                        <tbody>
                                        <tr>
                                            <td class="text-gray-400 min-w-175px w-175px">Added By:</td>
                                            <td class="text-gray-800 min-w-200px">
                                                {{$cause->causeCategory->category}}
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Cause Subcategory:</td>
                                            <td class="text-gray-800">
                                                @if(!empty($cause->causeSubCategory->sub_category))
                                                    {{$cause->causeSubCategory->sub_category}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Amount Required:</td>
                                            <td class="text-gray-800">
                                                {{number_format($cause->amount,2)}}
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">Currency:</td>
                                            <td class="text-gray-800">INR</td>
                                        </tr>
                                        <!--end::Row-->
                                        </tbody>
                                    </table>
                                    <!--end::Details-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--begin::Card-->
                <div class="card card-flush pt-3 mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="fw-bold">Description</h2>
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-3">
                        <!--begin::Section-->
                        <div class="mb-10">
                            <!--begin::Title-->
                            <h5 class="mb-4">Patient's Details :</h5>
                            <!--end::Title-->
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap py-5">
                                <!--begin::Row-->
                                <div class="flex-equal me-5">
                                    <?php
                                        echo $cause->cause_description;
                                    ?>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-flush pt-3 mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="fw-bold">Documents</h2>
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-3">
                        <!--begin::Section-->
                        <div class="mb-10">
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap py-5">
                                <!--begin::Row-->
                                <div class="flex-equal me-5">
                                    <!-- The grid: four columns -->
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
                                <!--end::Row-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-flush pt-3 mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Invoices</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Tab nav-->
                            <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a id="kt_referrals_year_tab" class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_1" aria-selected="true">
                                        This Year
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="kt_referrals_2019_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_2" aria-selected="false" tabindex="-1">
                                        2020
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="kt_referrals_2018_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_3" aria-selected="false" tabindex="-1">
                                        2019
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="kt_referrals_2017_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_4" aria-selected="false" tabindex="-1">
                                        2018
                                    </a>
                                </li>
                            </ul>
                            <!--end::Tab nav-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-2">
                        <!--begin::Tab Content-->
                        <div id="kt_referred_users_tab_content" class="tab-content">
                            <!--begin::Tab panel-->
                            <div id="kt_customer_details_invoices_1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="#kt_referrals_year_tab">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_1" class="table align-middle table-row-dashed fs-6 fw-bold gs-0 gy-4 p-0 m-0">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                        <tr class="text-start text-gray-400">
                                            <th class="min-w-100px">Order ID</th>
                                            <th class="min-w-100px">Amount</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="w-100px">Invoice</th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                            <td class="text-success">$38.00</td>
                                            <td><span class="badge badge-light-success">Approved</span></td>
                                            <td>Nov 01, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">423445721</a></td>
                                            <td class="text-danger">$-2.60</td>
                                            <td><span class="badge badge-light-danger">Rejected</span></td>
                                            <td>Oct 24, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                            <td class="text-success">$76.00</td>
                                            <td><span class="badge badge-light-success">Approved</span></td>
                                            <td>Oct 08, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                            <td class="text-success">$5.00</td>
                                            <td><span class="badge badge-light-danger">Rejected</span></td>
                                            <td>Sep 15, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">523445943</a></td>
                                            <td class="text-danger">$-1.30</td>
                                            <td><span class="badge badge-light-info">In progress</span></td>
                                            <td>May 30, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Tab panel-->
                            <!--begin::Tab panel-->
                            <div id="kt_customer_details_invoices_2" class="tab-pane fade " role="tabpanel" aria-labelledby="#kt_referrals_2019_tab">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_2" class="table align-middle table-row-dashed fs-6 fw-bold gs-0 gy-4 p-0 m-0">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                        <tr class="text-start text-gray-400">
                                            <th class="min-w-100px">Order ID</th>
                                            <th class="min-w-100px">Amount</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="w-100px">Invoice</th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">523445943</a></td>
                                            <td class="text-danger">$-1.30</td>
                                            <td><span class="badge badge-light-danger">Rejected</span></td>
                                            <td>May 30, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">231445943</a></td>
                                            <td class="text-success">$204.00</td>
                                            <td><span class="badge badge-light-success">Approved</span></td>
                                            <td>Apr 22, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                            <td class="text-success">$31.00</td>
                                            <td><span class="badge badge-light-warning">Pending</span></td>
                                            <td>Feb 09, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">984445943</a></td>
                                            <td class="text-success">$52.00</td>
                                            <td><span class="badge badge-light-warning">Pending</span></td>
                                            <td>Nov 01, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">324442313</a></td>
                                            <td class="text-danger">$-0.80</td>
                                            <td><span class="badge badge-light-success">Approved</span></td>
                                            <td>Jan 04, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Tab panel-->
                            <!--begin::Tab panel-->
                            <div id="kt_customer_details_invoices_3" class="tab-pane fade " role="tabpanel" aria-labelledby="#kt_referrals_2018_tab">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_3" class="table align-middle table-row-dashed fs-6 fw-bold gs-0 gy-4 p-0 m-0">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                        <tr class="text-start text-gray-400">
                                            <th class="min-w-100px">Order ID</th>
                                            <th class="min-w-100px">Amount</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="w-100px">Invoice</th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                            <td class="text-success">$31.00</td>
                                            <td><span class="badge badge-light-info">In progress</span></td>
                                            <td>Feb 09, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">984445943</a></td>
                                            <td class="text-success">$52.00</td>
                                            <td><span class="badge badge-light-warning">Pending</span></td>
                                            <td>Nov 01, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">324442313</a></td>
                                            <td class="text-danger">$-0.80</td>
                                            <td><span class="badge badge-light-success">Approved</span></td>
                                            <td>Jan 04, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                            <td class="text-success">$5.00</td>
                                            <td><span class="badge badge-light-info">In progress</span></td>
                                            <td>Sep 15, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                            <td class="text-success">$38.00</td>
                                            <td><span class="badge badge-light-warning">Pending</span></td>
                                            <td>Nov 01, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Tab panel-->
                            <!--begin::Tab panel-->
                            <div id="kt_customer_details_invoices_4" class="tab-pane fade " role="tabpanel" aria-labelledby="#kt_referrals_2017_tab">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_4" class="table align-middle table-row-dashed fs-6 fw-bold gs-0 gy-4 p-0 m-0">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                        <tr class="text-start text-gray-400">
                                            <th class="min-w-100px">Order ID</th>
                                            <th class="min-w-100px">Amount</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="w-100px">Invoice</th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                            <td class="text-success">$38.00</td>
                                            <td><span class="badge badge-light-danger">Rejected</span></td>
                                            <td>Nov 01, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">423445721</a></td>
                                            <td class="text-danger">$-2.60</td>
                                            <td><span class="badge badge-light-warning">Pending</span></td>
                                            <td>Oct 24, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                            <td class="text-success">$38.00</td>
                                            <td><span class="badge badge-light-danger">Rejected</span></td>
                                            <td>Nov 01, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">423445721</a></td>
                                            <td class="text-danger">$-2.60</td>
                                            <td><span class="badge badge-light-success">Approved</span></td>
                                            <td>Oct 24, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                            <td class="text-success">$31.00</td>
                                            <td><span class="badge badge-light-info">In progress</span></td>
                                            <td>Feb 09, 2020</td>
                                            <td class=""><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                        </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Tab panel-->
                        </div>
                        <!--end::Tab Content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
                <!--begin::Card-->
                <div class="card card-flush mb-0" data-kt-sticky-name="subscription-summary" >
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Summary</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 fs-6">
                        <!--begin::Section-->
                        <div class="mb-7">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                @if(sizeof($cause->causeImages) > 0)
                                <div class="symbol symbol-60px symbol-circle me-3">
                                    <img alt="Pic" src="{{asset('cause/other_images/'.$cause->causeImages[0]->file)}}">
                                </div>
                                @endif
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-2">{{$cause->causePatient->fname}} {{$cause->causePatient->lname}}</a>
                                    <!--end::Name-->
                                    <!--begin::Email-->
                                    <a href="#" class="fw-semibold text-gray-600 text-hover-primary">{{$cause->causePatient->mobile_no}}</a>
                                    <!--end::Email-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Seperator-->
                        <div class="separator separator-dashed mb-7"></div>
                        <!--end::Seperator-->
                        <!--begin::Section-->
                        <div class="mb-7">
                            <!--begin::Title-->
                            <h5 class="mb-4">Amount Details</h5>
                            <!--end::Title-->
                            <!--begin::Details-->
                            <div class="mb-0">
                                <!--begin::Plan-->
                                <span class="badge badge-light-info me-2">Amount</span>
                                <!--end::Plan-->
                                <!--begin::Price-->
                                <span class="fw-semibold text-gray-600">{{number_format($cause->amount,2)}}</span>
                                <!--end::Price-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Seperator-->
                        <div class="separator separator-dashed mb-7"></div>
                        <!--end::Seperator-->
                        <!--begin::Section-->
                        <div class="mb-10">
                            <!--begin::Title-->
                            <h5 class="mb-4">Payment Details</h5>
                            <!--end::Title-->
                            <!--begin::Details-->
                            <div class="mb-0">
                                <!--begin::Card info-->
                                <div class="fw-semibold text-gray-600 d-flex align-items-center">
                                    Date By When Needed
                                </div>
                                <!--end::Card info-->
                                <!--begin::Card expiry-->
                                <div class="fw-semibold text-gray-600">{{$cause->date_by_when_you_need}}</div>
                                <!--end::Card expiry-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Seperator-->
                        <div class="separator separator-dashed mb-7"></div>
                        <!--end::Seperator-->
                        <!--begin::Section-->
                        <div class="mb-10">
                            <!--begin::Title-->
                            <h5 class="mb-4">Subscription Details</h5>
                            <!--end::Title-->
                            <!--begin::Details-->
                            <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2">
                                <!--begin::Row-->
                                <tbody>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr class="">
                                    <td class="text-gray-400">Started:</td>
                                    <td class="text-gray-800">{{$cause->created_at}}</td>
                                </tr>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <tr class="">
                                    <td class="text-gray-400">Needed Till:</td>
                                    <td class="text-gray-800">{{$cause->date_by_when_you_need}}</td>
                                </tr>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <tr class="">
                                    <td class="text-gray-400">Status:</td>
                                    @if($cause->status == 1)
                                        <td><span class="badge badge-light-success">Active</span></td>
                                    @else
                                        <td><span class="badge badge-light-danger">Inactive</span></td>
                                    @endif
                                </tr>
                                <!--end::Row-->
                                </tbody>
                            </table>
                            <!--end::Details-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Actions-->
                        <div class="mb-0">
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Action menu-->
                                <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-2 me-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                    </svg>
                                    </span><!--end::Svg Icon-->
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true" style="">

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="javascript:void(0)" data-id="{{$cause->id}}" data-status="1" class="changeStatus menu-link px-5">
                                            Accept
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="javascript:void(0)" data-id="{{$cause->id}}" data-status="0" class="changeStatus menu-link px-5" >
                                            Reject
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                </div>
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
        </div>
        <!--end::Layout-->
    </div>
@endsection
@section('js')
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
    $(".changeStatus").click(function(event){
        event.preventDefault();
        let id = $(this).attr('data-id');
        let status = $(this).attr('data-status');
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "{{url('admin/changeFundraiserStatus')}}",
            type:"POST",
            data:{
                id:id,
                status:status,
                _token: _token
            },
            success:function(response){
                console.log(response);
                location.reload();
                // if(response) {
                //     $('.success').text(response.success);
                //     $("#ajaxform")[0].reset();
                // }
            },
        });
    });
</script>
@endsection
