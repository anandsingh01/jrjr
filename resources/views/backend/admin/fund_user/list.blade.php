@extends('layouts.dashboard')
@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Fund user listing</span>
            </h3>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Name</th>
                        <th class="min-w-125px">Email</th>
                        <th class="min-w-125px">Number</th>
                        <th class="min-w-125px">Status</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    @forelse ($fundusers as $funduser)
                    <tr>
                        <td>{{ $funduser->fName ?? 'N/A' }} {{ $funduser->lName ?? 'N/A' }}</td>
                        <td>{{ $funduser->email ?? 'N/A' }}</td>
                        <td>{{ $funduser->number ?? 'N/A' }}</td>
                        <td>
                            @php
                            $bgColorClass = '';
                            if ($funduser->status == \App\Models\FundUser::ACTIVE_SLUG) {
                            $bgColorClass = 'badge badge-light-success';
                            } elseif ($funduser->status == \App\Models\FundUser::DEACTIVE_SLUG) {
                            $bgColorClass = 'badge badge-light-success';
                            }
                            @endphp
                            <span class="{{ $bgColorClass }}">{{ $funduser->status_slug ?? 'N/A' }}</span>
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
