@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">Found Doner </span>
                </h3>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="">
                    {{-- @if ($errors->any()) --}}
                    <div class="alert alert-danger">
                        <ul style="margin-bottom: 0px;">
                            {{-- @foreach ($errors->all() as $error) --}}
                            <li>{{-- {{ $error }} --}}</li>
                            {{-- @endforeach --}}
                        </ul>
                    </div>
                    {{-- @endif --}}
                    <form action="{{-- {{url('savefund_doner')}} --}}" method="" enctype="multipart/form-data">
                        {{-- @csrf --}}
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="f_name" class="form-control" placeholder="Enter First Name" value="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name" value="">
                                </div>
                            </div>
                        </div>
                        <br>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone_number" class="form-control" placeholder="Enter Phone Number" value="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" value="">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" name="amount" placeholder="Enter Amount" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Transaction ID</label>
                                    <input type="number" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" value="">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fundraiser ID</label>
                                    <input type="text" name="fundraiser_id" placeholder="Enter Fundraiser ID" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>User ID</label>
                                    <select name="user_id" data-control="select2" class="form-select form-select-solid form-select-lg">
                                        <option value="">Select User ID</option>
                                        {{-- @foreach($user as $row) --}}
                                        <option value="{{-- {{$row->id}} --}}"><b>{{-- {{$row->name}} --}}</b></option>
                                        {{-- @endforeach --}}
                                    </select>

                                    <!-- <input type="text" name="user_id" class="form-control" placeholder="Enter User ID" value=""> -->
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Anonymous</label>
                                    <br>
                                    <form action="{{-- /action_page.php --}}">
                                        <input type="checkbox" id="anonymous" name="yes" value="Yess">
                                        <label for="vehicle1"> Yess</label><br>
                                        <input type="checkbox" id="no" name="vehicle2" value="No">
                                        <label for="vehicle2">No</label><br>
                                    </form>
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