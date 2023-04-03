@extends('layouts.dashboard')
@section('content')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->


<div class="post d-flex flex-column-fluid" id="kt_post">
  <!--begin::Container-->
  <div id="kt_content_container" class="container-xxl">
    <div class="card">
      <!--begin::Card header-->
      <div class="card-header">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bolder text-dark">Edit Fundraiser</span>
        </h3>
      </div>
      <!--end::Card header-->
      <!--begin::Card body-->
      <div class="card-body">
        <!--begin::Calendar-->
        <div id="">
          <form action="{{-- {{url('updatefundraiser')}} --}}" method="">
            {{-- @csrf --}}
            <input type="hidden" name="id" value="{{-- {{$data->id}} --}}">


            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>User ID</label>
                  <input type="text" name="user_id" class="form-control" placeholder="Enter User id" value="{{-- {{$data->user_id}} --}}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="f_name" class="form-control" placeholder="Enter First Name" value="{{-- {{$data->f_name}} --}}">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name" value="{{-- {{$data->l_name}} --}}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Amount to Raise</label>
                  <input type="text" name="amount_to_raise" class="form-control" placeholder="Enter Amount to Raise" value="{{-- {{$data->amount_to_raise}} --}}">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Date by when your need</label>
                  <input type="date" name="date_by_when_your_need" class="form-control" placeholder="Enter Date by when your need" value="{{-- {{$data->date_by_when_your_need}} --}}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{-- {{$data->title}} --}}">
                </div>
              </div>
            </div>
            <br>


            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{-- {{$data->description}} --}}">
                </div>
              </div>
            </div>
            <br>

            <div class="row" id="dynamic_field1">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Feture Image/Video</label>
                  <input type="file" accept="image/*" name="image" class="form-control" placeholder="Enter Feture Image/Video" value="{{-- {{$data->image}} --}}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group p-9">
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-sm btn-primary" id="add1" data-kt-menu-dismiss="true">Add More</button>
                  </div>
                </div>
              </div>
            </div>

            <br>

            <div class="row" id="dynamic_field2">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Upload File Documents</label>
                  <input type="file" accept="image/*" name="documents" class="form-control" placeholder="Enter Upload File Documents" value="{{-- {{$data->documents}} --}}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group p-9">
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-sm btn-primary" id="add2" data-kt-menu-dismiss="true">Add More</button>
                  </div>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Patient Number</label>
                  <input type="text" name="patient_no" class="form-control" placeholder="Enter Patient Number" value="{{-- {{$data->patient_no}} --}}">
                </div>
              </div>
              <br>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Patient Email</label>
                  <input type="text" name="patient_email" class="form-control" placeholder="Enter Patient Email" value="{{-- {{$data->patient_email}} --}}">
                </div>
              </div>
              <div class="row">

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Patient ID</label>
                    <input type="text" name="patient_number" class="form-control" placeholder="Enter Patient ID" value="{{-- {{$data->patient_number}} --}}">
                  </div>
                </div>
              </div>
            </div>

            <br>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>To feature</label>
                  <input type="text" name="to_feature" class="form-control" placeholder="Enter To feature" value="{{-- {{$data->to_feature}} --}}">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label> Relation with Patient</label>
                  <input type="text" name="relation_with_patient" class="form-control" placeholder="Enter Relation with Patient" value="{{-- {{$data->relation_with_patient}} --}}">
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