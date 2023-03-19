@extends('layouts.dashboard')
@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Add Sub Category</span>
            </h3>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <form class="forms-sample" id="addCategoryForm" method="post"
                action="{{ route('admin-cause-sub-category-update', ['token' => encrypt($subcategory->id)]) }}">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column mb-5 fv-row">
                    <label class="control-label mb-2"><span class="text-danger">* </span>Category</label>
                    <select class="form-control form-control-solid select2-element" id="category" name="category">
                        {{-- <option selected disabled>Select Category</option> --}}
                        @forelse ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' :
                            '' }}>{{ $category->category }}</option>
                        @empty
                        <option value="" disabled>No data found</option>
                        @endforelse
                    </select>
                </div>
                <div class="d-flex flex-column mb-5 fv-row">
                    <label class="control-label mb-2"><span class="text-danger">* </span>Sub Category Name</label>
                    <input type="text" class="form-control form-control-solid" placeholder="Enter sub catgory"
                        id="sub_category" name="sub_category" value="{{ $subcategory->sub_category }}">
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