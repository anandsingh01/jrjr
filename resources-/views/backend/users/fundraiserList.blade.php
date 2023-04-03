@extends('layouts.dashboard')
@section('content')

    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">

                    <div class="col-md-6 mt-5 mb-5">
                        <h2>Welcome, {{Auth::user()->name}}</h2>
                    </div>
                    <div class="col-md-5 mt-5 mb-5">
                        <a href="{{url('cause/create')}}" class="btn btn-success btn-lg pull-right">Add Fundraiser</a>
                    </div>
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
                        <th>Title</th>
                        <th>When Needed</th>
                        <th>Amount</th>
                        <th>Collected Amount</th>
                        <th>Status</th>
                        <th>Donors</th>
                        <th>View</th>
                        <th>Edit</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                    @if($fundraiser)

                        @foreach($fundraiser as $fundraisers)
                            <tr>
                                <td data-th="Supplier Code">
                                    {{$fundraisers->id}}
                                </td>
                                <td data-th="Supplier Name">
                                    {{$fundraisers->cause_title}}
                                </td>
                                <td data-th="Invoice Number">
                                    {{$fundraisers->date_by_when_you_need}}
                                </td>
                                <td data-th="Invoice Date">
                                    Rs. {{number_format($fundraisers->amount,2)}}
                                </td>
                                <td data-th="Due Date">
                                        <?php
                                        $totalAmountReceived =  sumOfReceivedAmount($fundraisers->id);
                                        ?>
                                    {{number_format($totalAmountReceived,2)}}
                                </td>
                                <td data-th="Due Date">
                                    @if($fundraisers->status == 0)
                                        <span class="badge badge-warning">Inactive</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td data-th="Net Amount">
                                    <a href="{{url('users/view-all-donors/'.encrypt($fundraisers->id))}}" type="button" class="btn btn-info btn-sm">Donors</a>
                                </td>
                                <td data-th="Net Amount">
                                    <a href="{{url('users/view-fundraiser/'.$fundraisers->id)}}" type="button" class="btn btn-info btn-sm">View</a>
                                </td>
                                <td data-th="Net Amount">
                                    <a href="{{url('users/edit-fundraiser/'.$fundraisers->id.'/'.$fundraisers->slug)}}" type="button" class="btn btn-success btn-sm">Edit</a>
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
