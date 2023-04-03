@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">Edit Hospital Raiser Details</span>
                </h3>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="">
                    <form action="{{-- {{url('updatehospital')}} --}}" method="post">
                    {{-- @csrf --}}
                        <input type="hidden" name="id" value="{{-- {{$data->id}} --}}">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hospital ID </label>
                                    <input type="number" name="hospital_id" class="form-control" placeholder="Enter Hospital ID" value="{{--{{$data->hospital_id}} --}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hospital Name</label>
                                    <input type="text" name="hospital_name" class="form-control" placeholder="Enter Hospital Name" value="{{--{{$data->hospital_name}} --}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hospital Address</label>
                                    <input type="text" name="hospital_address" class="form-control" placeholder="Enter Hospital Address" value="{{--{{$data->hospital_address}} --}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hospital Landline</label>
                                    <input type="text" name="hospital_landline" placeholder="Enter Hospital Landline" class="form-control" value="{{--{{$data->hospital_landline}} --}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hospital Number</label>
                                    <input type="number" name="hospital_no" class="form-control" placeholder="Enter Hospital Number" value="{{--{{$data->hospital_no}} --}}">
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