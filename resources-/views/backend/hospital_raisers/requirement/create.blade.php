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
                        <form action="{{url('hospital/requirement/save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="hospital_id" value="{{$hospital_data[0]->hospital_id}}"/>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient's Name </label>
                                        <input type="text" name="patient_name" class="form-control" placeholder="Enter Patient's name" value="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood group</label>
                                        <select name="blood_group" class="input form-control"  required >
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Units Required(*)</label>
                                        <input type="number" name="unit" class="form-control" placeholder="Enter Units" value="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient's Mobile</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="Enter Patient's Mobile" value="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient's Email</label>
                                        <input type="text" name="email" placeholder="Enter Patient's Email" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Needed By</label>
                                        <input type="date" name="needed_by" class="form-control" placeholder="Enter" value="">
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
