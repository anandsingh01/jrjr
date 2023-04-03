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
          <span class="card-label fw-bolder text-dark"> fundraiser </span>
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
          <form action="{{-- {{url('savefundraiser')}} --}}" method="" enctype="multipart/form-data">
            {{-- @csrf --}}
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>User ID</label>

                  <select name="user_id" data-control="select2" class="form-select form-select-solid form-select-lg">
                    <option value="">Select User ID</option>
                    {{-- @foreach($user as $row) --}}
                    <option value="{{-- {{$row->id}} --}}"><b>{{-- {{$row->name}} --}}</b></option>
                    {{-- @endforeach --}}
                  </select>

                  <!-- <input type="text" name="user_id" class="form-control" placeholder="Enter User id" value=""> -->
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="f_name" class="form-control" placeholder="Enter First Name" value="">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name" value="">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Amount to Raise</label>
                  <input type="text" name="amount_to_raise" class="form-control" placeholder="Enter Amount to Raise"
                    value="">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Date by when your need</label>
                  <input type="date" name="date_by_when_your_need" class="form-control"
                    placeholder="Enter Date by when your need" value="">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter Title" value="">
                </div>
              </div>
            </div>
            <br>


            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="description" class="form-control" placeholder="Enter Description" value="">
                </div>
              </div>
            </div>
            <br>

            <div class="row" id="dynamic_field1">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Feature Image/Video</label>
                  <input type="file" accept="image/*" name="image" class="form-control"
                    placeholder="Enter Feture Image/Video" value="">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group p-9">
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-sm btn-primary" id="add1" data-kt-menu-dismiss="true">Add
                      More</button>
                  </div>
                </div>
              </div>
            </div>
            <br>

            <div class="row" id="dynamic_field2">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Upload File Documents</label>
                  <input type="file" accept="image/*" name="documents" class="form-control"
                    placeholder="Enter Upload File Documents" value="">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group p-9">
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-sm btn-primary" id="add2" data-kt-menu-dismiss="true">Add
                      More</button>
                  </div>
                </div>

              </div>
            </div>


            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Patient Number</label>
                  <input type="text" name="patient_no" class="form-control" placeholder="Enter Patient Number" value="">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Patient Email</label>
                  <input type="text" name="patient_email" class="form-control" placeholder="Enter Patient Email"
                    value="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Patient ID</label>
                  <input type="text" name="patient_number" class="form-control" placeholder="Enter Patient ID" value="">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>To feature</label>
                  <input type="text" name="to_feature" class="form-control" placeholder="Enter To feature" value="">
                </div>
              </div>
            </div>
            <br>
            <div class="row">

              <div class="col-sm-6">
                <div class="form-group">
                  <label> Relation with Patient</label>
                  <input type="text" name="relation_with_patient" class="form-control"
                    placeholder="Enter Relation with Patient" value="">
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
<script type="text/javascript">
  $(document).ready(function() {
    var postURL = "<?php echo url('addmore'); ?>";
    var i = 1;


    $('#add1').click(function() {
      i++;
      $('#dynamic_field1').append('<div id="row' + i + '"><div class="col-sm-5"><div class="form-group"><label>Feture Image/Video</label><input type="file" name="image[]" class="form-control" placeholder="Enter Feture Image/Video" value=""></div></div><div class="col-sm-2"><div class="form-group"><label></label><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove1">X</button></div></div></div>')
    });


    $(document).on('click', '.btn_remove1', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var postURL = "<?php echo url('addmore'); ?>";
    var j = 1;


    $('#add2').click(function() {
      j++;
      $('#dynamic_field2').append('<div id="row' + j + '"><div class="col-sm-5"><div class="form-group"><label>Upload File Documents</label><input type="file" name="documents[]" class="form-control" placeholder="Select Upload File Documents" value=""></div></div><div class="col-sm-2"><div class="form-group"><label></label><button type="button" name="remove" id="' + j + '" class="btn btn-danger btn_remove2">X</button></div></div></div>')
    });


    $(document).on('click', '.btn_remove2', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  });
</script>


@endsection