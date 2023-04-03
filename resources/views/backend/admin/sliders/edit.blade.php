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
                action="{{ url('admin/dashboard/header-home-slider-update/') }}"
                enctype="multipart/form-data"
            >
                @csrf
                <div class=" d-flex flex-column mb-5 fv-row">
                    <input type="hidden" name="id" value="{{$slider->id}}"/>
                    <label class="control-label mb-2"><span class="text-danger">* </span>Banner Image</label>
                    <input type="file" class="form-control form-control-solid" placeholder="Enter Catgory" id="category"
                           name="image">
                    @if($slider->image)
                        <img src="{{asset($slider->image)}}" style="width:100px;">
                        @endif
                </div>

                <div class="d-flex flex-column mb-5 fv-row">
                    <label class="control-label mb-2"><span class="text-danger">* </span>Heading 1</label>
                    <input type="text" class="form-control form-control-solid" placeholder="Enter Category"
                           id=""
                           name="heading_one">
                </div>

                <div class="d-flex flex-column mb-5 fv-row">
                    <label class="control-label mb-2"><span class="text-danger">* </span>Heading 2</label>
                    <input type="text" class="form-control form-control-solid" placeholder="Enter Category"
                           id=""
                           value="{{$slider->heading_two}}"
                           name="heading_two">
                </div>

                <div class="d-flex flex-column mb-5 fv-row">
                    <label class="control-label mb-2"><span class="text-danger">* </span>link</label>
                    <input type="text" class="form-control form-control-solid" placeholder="Enter Category"
                           id=""
                           value="{{$slider->link}}"
                           name="link">
                </div>

                <div class="d-flex flex-column mb-5 fv-row">
                    <label class="control-label mb-2"><span class="text-danger">* </span>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{$slider->status == '1' ? 'selected' : ''}}>Active</option>
                        <option value="0" {{$slider->status == '0' ? 'selected' : ''}}>Inactive</option>
                    </select>
                </div>

                 <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="float: right">Update</button>

                </div>
            </form>
            <!--end::Table-->
        </div>
    </div>

</div>
@endsection
