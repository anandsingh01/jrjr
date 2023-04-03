@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder text-dark">View Shipping</span>
				</h3>
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Calendar-->
				<div class="col-md-12">

					<div class="row">
						<div class="col-sm-4">
							<h4> Name</h4>
							<p class="fs-5">{{-- {{$data->name}} --}}</p>
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