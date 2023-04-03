@extends('layouts.dashboard')
@section('content')

<style>
    .btn-jrjr_theme{
        background-color: #00a859;
        color: white;
    }
    .btn-jrjr_theme:hover{
        background-color: #008144;
        color: white;
    }
</style>

    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">

                    <div class="col-md-6 mt-5 mb-5">
                        <h2>Welcome, {{Auth::user()->name}}</h2>
                    </div>
                    <div class="col-md-5 mt-5 mb-5" style="text-align: right;">
                        <a href="{{url('cause/create')}}" class="btn btn-jrjr_theme pull-right">Add Fundraiser</a>
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
                        <th>Actions</th>
                        <!--<th>Edit</th>-->
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
                                        <span class="badge badge-danger">Inactive</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td data-th="Net Amount">
                                    
                                    <a href="{{url('users/view-all-donors/'.encrypt($fundraisers->id))}}" type="button" class="btn btn-info btn-sm">Donors</a>
                                </td>
                                <td data-th="Net Amount">
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <a href="{{url('users/view-fundraiser/'.$fundraisers->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                            </span>
                                        </a>
                                    
                                        <a href="{{url('users/edit-fundraiser/'.$fundraisers->id.'/'.$fundraisers->slug)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                            </span>
                                        </a>
                                    </div>
                                </td>
                                <!--<td data-th="Net Amount">-->
                                <!--    <a href="{{url('users/edit-fundraiser/'.$fundraisers->id.'/'.$fundraisers->slug)}}" type="button" class="btn btn-success btn-sm">Edit</a>-->
                                <!--</td>-->
                                

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
