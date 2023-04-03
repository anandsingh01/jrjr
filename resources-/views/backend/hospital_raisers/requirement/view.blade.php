@extends('layouts.dashboard')
@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Donors
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Primary button-->
                        <a href="{{ url('hospital/'.$hospital_data[0]->hospital_id.'/requirement/create') }}" class="btn btn-sm fw-bold btn-primary">
                            Send To All
                        </a>
                        <!--end::Primary button-->
                    </div>
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
                        <th class="min-w-125px">Patient's name</th>
                        <th>Blood group</th>
                        <th>Mobile</th>
                        <th class="">Actions</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                    @forelse ($requirement_view as $requirement_views)
                        <tr>
                            <td>{{ $requirement_views->fName ?? 'N/A' }} {{ $requirement_views->lName ?? 'N/A' }}</td>
                            <td>{{ $requirement_views->blood_group ?? 'N/A' }}</td>
                            <td>{{ $requirement_views->mobile ?? 'N/A' }}</td>
                            <td>

                                <a href="{{ url('hospital/'.$hospital_data[0]->hospital_id.'/requirement/view/'.$requirement_views->id) }}"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editCustomer">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <i class="fa fa-eye"></i>
                                    <!--end::Svg Icon-->
                                </a>

                                <a href="{{ url('hospital/'.$hospital_data[0]->hospital_id.'/requirement/edit/'.$requirement_views->id) }}"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editCustomer">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->

                                    <!--end::Svg Icon-->
                                </a>

                                <a href="{{ url('hospital/'.$hospital_data[0]->hospital_id.'/requirement/delete/'.$requirement_views->id) }}"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editCustomer">

                                </a>

                            </td>
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
