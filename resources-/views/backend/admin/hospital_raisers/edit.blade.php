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
                    <form action="{{-- {{url('updatehospital_raiser')}} --}}" method="post">
                    {{-- @csrf --}}
                        <input type="hidden" name="id" value="{{-- {{$data->id}} --}}">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title </label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{-- {{$data->title}} --}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Blood Group </label>
                                    <input type="text" name="blood_gp" class="form-control" placeholder="Enter Hospital Code" value="{{-- {{$data->blood_gp}} --}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Liter</label>
                                    <input type="text" name="liter" class="form-control" placeholder="Enter Liter" value="{{-- {{$data->liter}} --}}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>By When</label>
                                    <input type="date" name="by_when" placeholder="Enter By When" class="form-control" value="{{-- {{$data->by_when}} --}}">
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