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
                        <th class="min-w-125px">Order Id</th>
                        <th class="min-w-125px">Payment Id</th>
                        <th class="min-w-125px">Amount</th>
                        <th class="min-w-125px">Causes Name</th>
                        <th class="min-w-125px">Donor Name</th>
                        <th class="min-w-125px">Date</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $payment->order_id ?? 'N/A' }}</td>
                            <td>{{ $payment->payment_id ?? 'N/A' }}</td>
                            <td>{{ $payment->amount / 100 ?? 'N/A' }}</td>
                            <td>{{ $payment->causes_title }}</td>
                            <td>{{ $payment->userFirstName }} {{ $payment->userLastName }}</td>
                            <td>{{$payment->created_at}}</td>

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
