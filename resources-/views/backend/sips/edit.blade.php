@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder text-dark">Edit SIP</span>
				</h3>
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Calendar-->
				<div id="">
					<form action="{{url('updatesip')}}" method="post">
						@csrf
						<input type="hidden" name="id" value="{{--{{$data->id}} --}}">
						<div class="row">

							<div class="col-sm-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="f_name" class="form-control" placeholder="Enter First Name" value="{{-- {{$data->f_name}} --}}">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="l_name" class="form-control" placeholder="Enter Last Name" value="{{-- {{$data->naml_namee}} --}}">
								</div>
							</div>
						</div>
						</br>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Date of Birth</label>
									<input type="date" name="dob" placeholder="Enter Date of Birth" class="form-control" value="{{--{{$data->dob}} --}}">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>Phone Number</label>
									<input type="number" name="phone_number" class="form-control" placeholder="Enter Phone Number" value="{{-- {{$data->phone_number}} --}}">
								</div>
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" placeholder="Enter Email" class="form-control" value="{{--{{$data->email}} --}}">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>Aadhar Card Number</label>
									<input type="number" name="aadhar_card" class="form-control" placeholder="Enter Aadhar Card Number" value="{{--{{$data->aadhar_card}} --}}">
								</div>
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>PAN Card Number</label>
									<input type="text" name="pan_card" placeholder="Enter PAN Card Number" class="form-control" value="{{-- {{$data->pan_card}} --}}">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>IFSC</label>
									<input type="number" name="ifsc" class="form-control" placeholder="Enter IFSC" value="{{-- {{$data->ifsc}} --}}">
								</div>
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Bank Name</label>
									<input type="text" name="bank_name" placeholder="Enter Bank Name" class="form-control" value="{{--{{$data->bank_name}} --}}">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>SIP Debit Date</label>
									<input type="date" name="debit_date" class="form-control" placeholder="Enter SIP Debit Date" value="{{--{{$data->debit_date}} --}}">
								</div>
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Account Type</label>
									<!-- <input type="text"  name="pan_card_number" placeholder="Enter Account Type" class="form-control" value=""> -->
									<select name="order_type" data-control="select2" data-placeholder="Select Account Type" class="form-select form-select-solid form-select-lg">
										<option value="">Select Account Type</option>
										<option value="Pre-Book"><b>Saving</b></option>
										<option value="Pre-Book"><b>Current</b></option>
										<option value="Pre-Book"><b>Other</b></option>
									</select>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>SIP Amount</label>
									<input type="number" name="sip_amount" class="form-control" placeholder="Enter SIP Amount" value="{{-- {{$data->sip_amount}} --}}">
								</div>
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Starting Date</label>
									<input type="date" name="starting_date" placeholder="Enter Starting Date" class="form-control" value="{{--{{$data->starting_date}} --}}">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>Ending Date</label>
									<input type="date" name="ending_date" placeholder="Enter Ending Date" class="form-control" value="{{--{{$data->ending_date}} --}}">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>SIP Frequency</label>
									<select name="order_type" data-control="select2" data-placeholder="Select SIP Frequency" class="form-select form-select-solid form-select-lg">
										<option value="">Select SIP Frequency</option>
										<option value="Pre-Book"><b>Monthly</b></option>
										<option value="Pre-Book"><b>Quarterly</b></option>
									</select>
								</div>
							</div>

							<!-- <div class="col-sm-6">
								<div class="form-group">
									<label>Ending Date</label>
									<input type="date"  name="ending_date" placeholder="Enter Ending Date" class="form-control" value="">
								</div>
							</div>-->
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