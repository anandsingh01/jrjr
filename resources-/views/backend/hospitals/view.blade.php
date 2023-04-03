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
						<div class="col-sm-3">
							<h4>Hospital Name</h4>
							<p class="fs-5">{{-- {{$data->hospital_name}} --}} dummy</p>
						</div>
						<div class="col-sm-3">
							<h4>Hospital Code</h4>
							<p class="fs-5">{{-- {{$data->hospital_code}} --}} dummy</p>
						</div>
						<div class="col-sm-3">
							<h4> Hospital Distric</h4>
							<p class="fs-5">{{-- {{$data->hospital_distric}} --}} dummy</p>
						</div>
						<div class="col-sm-3">
							<h4> Hospital State</h4>
							<p class="fs-5">{{-- {{$data->hospital_state}} --}} dummy</p>
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

@endsection