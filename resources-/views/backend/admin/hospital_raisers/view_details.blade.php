@extends('layouts.dashboard')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">View Hospital Raiser Details</span>
                    </h3>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Calendar-->
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-sm-4">
                                <h4>Hospital Name</h4>
                                <p class="fs-5">{{$data->hospital_name}}</p>
                            </div>
                            <div class="col-sm-4">
                                <h4>Hospital Code</h4>
                                <p class="fs-5">{{$data->hospital_id}}</p>
                            </div>
                            <div class="col-sm-4">
                                <h4> Hospital Distric</h4>
                                <p class="fs-5">{{$data->hospital_address}}</p>
                            </div>
                            <div class="col-sm-4">
                                <h4> Hospital Landline</h4>
                                <p class="fs-5">{{$data->hospital_landline}}</p>
                            </div>
                            <div class="col-sm-4">
                                <h4> Hospital phone</h4>
                                <p class="fs-5">{{$data->hospital_no}}</p>
                            </div>
                            <div class="col-sm-4">
                                <h4> Hospital Password</h4>
                                <p class="fs-5">{{$data->password}}</p>
                            </div>


                        </div>
                        <br>

                    </div>
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->



    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Requirements
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->

                    <!--end::Actions-->
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
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Patient Name</th>
                        <th class="">Hospital Id</th>
                        <th class="min-w-125px">Blood Group</th>
                        <th class="min-w-125px">Unit</th>
                        <th class="min-w-125px">Mobile</th>
                        <th class="min-w-125px">Email</th>
                        <th class="min-w-125px">Needed By</th>
                        <th class="min-w-125px">Status</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                    @forelse ($data->getRequirements as $hospital_requirements)
                        <tr>
                            <td>{{ $hospital_requirements->patient_name ?? 'N/A' }}</td>
                            <td>{{ $hospital_requirements->hospital_id ?? 'N/A' }}</td>
                            <td>{{ $hospital_requirements->blood_group ?? 'N/A' }}</td>
                            <td>Needed : {{ $hospital_requirements->unit ?? 'N/A' }} Arranged : {{$hospital_requirements->arranged ?? 'NA'}}</td>
                            <td>{{ $hospital_requirements->mobile ?? 'N/A' }}</td>
                            <td>{{ $hospital_requirements->email ?? 'N/A' }}</td>
                            <td>{{ $hospital_requirements->needed_by ?? 'N/A' }}</td>
                            <td>{{ $hospital_requirements->status == 1 ?  'Active' : 'Inactive' }}</td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Data Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
        </div>

    </div>

@endsection
