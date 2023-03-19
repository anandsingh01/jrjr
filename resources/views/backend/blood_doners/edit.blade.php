@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
  <!--begin::Container-->
  <div id="kt_content_container" class="container-xxl">
    <div class="card">
      <!--begin::Card header-->
      <div class="card-header">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bolder text-dark">Edit Blood Donation</span>
        </h3>
      </div>
      <!--end::Card header-->
      <!--begin::Card body-->
      <div class="card-body">
        <!--begin::Calendar-->
        <div id="">
          <form action="" method="">
          {{--  @csrf --}}
            <input type="hidden" name="id" {{-- value="{{$data->id}}" --}}>


            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>User ID</label>
                  <input type="text" name="user_id" class="form-control" placeholder="Enter First Name" {{-- value="{{$data->user_id}}" --}}>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>SMS</label>
                  <input type="text" name="sms" class="form-control" placeholder="Enter SMS" {{-- value="{{$data->sms}}" --}}>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Last Donation Date</label>
                  <input type="date" name="last_donation_date" placeholder="Enter last donation date" class="form-control" {{-- value="{{$data->last_donation_date}}" --}}>
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