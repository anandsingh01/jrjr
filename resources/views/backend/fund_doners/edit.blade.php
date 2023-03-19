@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">Edit Blood Donation</span>
                </h3>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="">
                    <form action="{{-- {{url('updatefund_doner')}} --}}" method="">
                    {{--    @csrf --}}
                        <input type="hidden" name="id" value="{{-- {{$data->id}} --}}">

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="f_name" class="form-control" placeholder="Enter First Name" value="{{-- {{$data->f_name}} --}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name" value="{{-- {{$data->l_name}} --}}">
                                </div>
                            </div>
                        </div>
                        <br>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone_no" class="form-control" placeholder="Enter Phone Number" value="{{-- {{$data->phone_no}} --}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{-- {{$data->email}} --}}">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" name="amount" placeholder="Enter Amount" class="form-control" value="{{-- {{$data->amount}} --}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Transaction ID</label>
                                    <input type="number" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" value="{{-- {{$data->transaction_id}} --}}">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fundraiser ID</label>
                                    <input type="text" name="fundraiser_id" placeholder="Enter Fundraiser ID" class="form-control" value="{{-- {{$data->fundraiser_id}} --}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>User ID</label>
                                    <input type="text" name="user_id" class="form-control" placeholder="Enter User ID" value="{{-- {{$data->user_id}} --}}">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Anonymous</label>
                                    <input type="text" name="anonymous" placeholder="Enter Anonymous" class="form-control" value="{{-- {{$data->anonymous}} --}}">
                                </div>
                            </div>
                        </div>
                        <br>


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection