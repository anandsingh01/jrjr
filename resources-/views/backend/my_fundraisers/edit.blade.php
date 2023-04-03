@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">Edit blood donation</span>
                </h3>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="">
                    <form action="{{-- {{url('updateblood_donation')}} --}}" method="post">
                        {{-- @csrf --}}
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
                        </br>



                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="date_of_birth" placeholder="Enter Date of Birth" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone_number" class="form-control" placeholder="Enter Phone Number" value="">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" placeholder="Enter Email" class="form-control" value="">
                                </div>
                            </div>

                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone_number" class="form-control" placeholder="Enter Phone Number" value="">
                                </div>
                            </div> -->
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