@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder text-dark">Edit blood donation</span>
				</h3>
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Calendar-->
				<div id="">
					<form action="{{-- {{url('updatefundraiser_category')}} --}}" method="post">
					{{--	@csrf --}}
						<input type="hidden" name="id" value="{{-- {{$data->id}} --}}">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Category Name</label>
									<input type="text" name="category_name" class="form-control" placeholder="Enter First Name" value="{{-- {{$data->category_name}} --}}">
								</div>
							</div>

						</div>
						</br>




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