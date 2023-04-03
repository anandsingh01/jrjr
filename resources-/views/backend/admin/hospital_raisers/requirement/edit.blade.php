@extends('layouts.dashboard')
@section('css')
<style>
.bloodRequirementTable tr{
    border:1px solid #000;
}
</style>
@stop
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

                        <table clas="table table-striped bloodRequirementTable" style="width:100%;" border="1">
                            <tbody>
                            <tr>
                                <th>Patient's Name</th>
                                <td>{{$requirement_edit->patient_name}}</td>
                            </tr>
                            <tr>
                                <th>Blood group</th>
                                <td>{{$requirement_edit->blood_group}}</td>
                            </tr>
                            <tr>
                                <th>Unit Required</th>
                                <td>{{$requirement_edit->unit}}</td>
                            </tr>
                            <tr>
                                <th>Patient's Mobile</th>
                                <td>{{$requirement_edit->mobile}}</td>
                            </tr>
                            <tr>
                                <th>Patient's Email</th>
                                <td>{{$requirement_edit->email}}</td>
                            </tr>
                            <tr>
                                <th>Needed By</th>
                                <td>{{$requirement_edit->needed_by}}</td>
                            </tr>

                            </tbody>
                        </table>
                        <form action="{{url('admin/hospital/requirement/update')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
{{--                            <div class="row">--}}
{{--                                <input type="hidden" name="hospital_id" value="{{$requirement_edit->hospital_id}}"/>--}}
                                <input type="hidden" name="id" value="{{$requirement_edit->id}}"/>
{{--                                --}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label></label>--}}
{{--                                        <input type="text" name="blood_group" class="form-control"--}}
{{--                                               placeholder="Enter Blood Group"--}}
{{--                                               value="{{$requirement_edit->blood_group}}" readonly>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <br>
                            <div class="row">
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Units Required(*)</label>--}}
{{--                                        <input type="number" name="unit" class="form-control"--}}
{{--                                               placeholder="Enter Units"--}}
{{--                                               value="{{$requirement_edit->unit}}" readonly>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Patient's Mobile</label>--}}
{{--                                        <input type="text" name="mobile" class="form-control"--}}
{{--                                               placeholder="Enter Patient's Mobile"--}}
{{--                                               value="{{$requirement_edit->mobile}}" readonly>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-sm-12">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-4">Patient's Email</div>--}}
{{--                                        <div class="col-md-8">{{$requirement_edit->email}}</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Needed By</label>--}}
{{--                                        <div>{{$requirement_edit->needed_by}}</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Arranged</label>
                                        <input type="number" name="arranged" class="form-control"
                                               placeholder="Enter"
                                               value="{{$requirement_edit->arranged}}"
                                               maxlength="{{$requirement_edit->unit}}" >
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
