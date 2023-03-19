@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder text-dark">View SIP</span>
				</h3>
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Calendar-->
				<div class="col-md-12">

					<div class="row">

						<div class="col-sm-2">
							<h4>First Name</h4>
							<p class="fs-5">{{-- {{$data->f_name}} --}}</p>
						</div>
						<div class="col-sm-2">
							<h4>Last Name</h4>
							<p class="fs-5">{{-- {{$data->l_name}} --}}</p>
						</div>
						<div class="col-sm-2">
							<h4> Date of Birth</h4>
							<p class="fs-5">{{-- {{$data->dob}} --}}</p>
						</div>
						<div class="col-sm-3">
							<h4> Phone Number</h4>
							<p class="fs-5">{{-- {{$data->phone_no}} --}}</p>
						</div>
						<div class="col-sm-3">
							<h4>Email</h4>
							<p class="fs-5">{{-- {{$data->email}} --}}</p>
						</div>

					</div>
					<!-- <br> -->
				</div>
			</div>
		</div>

	</div>
	<!--end::Container-->
</div>
<!--end::Post-->

@endsection