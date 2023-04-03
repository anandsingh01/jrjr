@extends('layouts.dashboard')
@section('content')

    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Category
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->

                </div>
                <!--end::Toolbar container-->
            </div>

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                    <!--begin::Table head-->
                    <thead>
                    <!--begin::Table row-->
                    <tr>
                        <th>Id</th>
                        <th>Order Id</th>
                        <th>Amount</th>
                        <th>Cause</th>
                        <th>Donor</th>
                        <th>Date</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                    @if($getAllPayments)

                        @foreach($getAllPayments as $getAllPayment)
                            <tr>
                                <td data-th="Supplier Code">
                                    {{$getAllPayment->order_id}}
                                </td>
                                <td data-th="Supplier Name">
                                    {{$getAllPayment->amount}}
                                </td>
                                <td data-th="Invoice Number">
                                    {{$getAllPayment->amount}}
                                </td>
                                <td data-th="Invoice Date">
                                    Rs. {{number_format($getAllPayment->amount,2)}}
                                </td>

                                <td data-th="Invoice Date">
                                    {{$getAllPayment->fname ?? 'NA'}}
                                </td>
                                <td data-th="Due Date">
                                    {{$getAllPayment->created_at}}
                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
