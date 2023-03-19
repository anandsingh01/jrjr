@extends('layouts.dashboard')
@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Add Category</span>
            </h3>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <form class="forms-sample" id="addCategoryForm" method="post"
                action="{{ route('admin-cause-category-update', ['token' => encrypt($category->id)]) }}">
                @csrf
                @method('PUT')
                <div class=" d-flex flex-column mb-5 fv-row">
                    <label class="control-label mb-2"><span class="text-danger">* </span>Category Name</label>
                    <input type="text" class="form-control form-control-solid" placeholder="Enter Catgory" id="category"
                        name="category" value="{{ $category->category }}">
                </div>
                {{-- <div class="modal-footer"> --}}
                    <button type="submit" class="btn btn-primary" style="float: right">Update</button>
                    {{--
                </div> --}}
            </form>
            <!--end::Table-->
        </div>
    </div>

</div>
@endsection