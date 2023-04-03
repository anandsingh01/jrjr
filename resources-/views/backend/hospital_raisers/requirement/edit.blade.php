@extends('layouts.dashboard')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark"> Requirement </span>
                    </h3>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Calendar-->
                    <div id="">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin-bottom: 0;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{url('hospital/requirement/update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="hospital_id" value="{{$hospital_data[0]->hospital_id}}"/>
                                <input type="hidden" name="id" value="{{$requirement_edit->id}}"/>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient's Name </label>
                                        <input type="text" name="patient_name" class="form-control"
                                               placeholder="Enter Patient's name"
                                               value="{{$requirement_edit->patient_name}}">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood group</label>
                                        <input type="text" name="blood_group" class="form-control"
                                               placeholder="Enter Blood Group"
                                               value="{{$requirement_edit->blood_group}}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Units Required(*)</label>
                                        <input type="number" name="unit" class="form-control"
                                               placeholder="Enter Units"
                                               value="{{$requirement_edit->unit}}">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient's Mobile</label>
                                        <input type="text" name="mobile" class="form-control"
                                               placeholder="Enter Patient's Mobile"
                                               value="{{$requirement_edit->mobile}}">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient's Email</label>
                                        <input type="text" name="email" placeholder="Enter Patient's Email"
                                               class="form-control"
                                               value="{{$requirement_edit->email}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Needed By</label>
                                        <input type="date" name="needed_by" class="form-control"
                                               placeholder="Enter"
                                               value="{{$requirement_edit->needed_by}}">
                                    </div>
                                </div>
                            </div>
                            <br>

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
