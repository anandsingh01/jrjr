@extends('layouts.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark"> Add Event </span>
                </h3>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="">
                    <form action="{{ route('admin-events-add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mb-5">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" name="event_name" class="form-control"
                                        placeholder="Enter event name" value="">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-5">
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input type="date" name="event_date" class="form-control"
                                           placeholder="Enter event name" value="">
                                </div>
                            </div>

                            <div class="col-sm-6 mb-5">
                                <div class="form-group">
                                    <label>Event Time</label>
                                    <input type="time" name="event_time" class="form-control"
                                           placeholder="Enter event location" value="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fetured Image</label>
                                    <input type="file" accept="image/*" name="feature_image" class="form-control"
                                           placeholder="Enter Feture Image/Video" value="">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12 mb-5">
                                <div class="form-group">
                                    <label>Event Description</label>
                                    <textarea class="form-control" name="event_desc" id="event_desc" cols="30"
                                              rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5" id="dynamic_field1">



                            <div class="col-sm-6 mb-5">
                                <div class="form-group">
                                    <label>Event Address 1</label>
                                    <input type="text" name="event_address_1" class="form-control"
                                           placeholder="Enter event  address 1" value="">
                                </div>
                            </div>

                            <div class="col-sm-6 mb-5">
                                <div class="form-group">
                                    <label>Event Address 2</label>
                                    <input type="text" name="event_address_2" class="form-control"
                                           placeholder="Enter event address 2" value="">
                                </div>
                            </div>

                            <div class="col-sm-4 mb-5">
                                <div class="form-group">
                                    <label>Event State</label>
                                    <input type="text" name="event_state" class="form-control"
                                           placeholder="Enter event State" value="">
                                </div>



{{--                                <select type="text" name="event_address_2" class="form-control">--}}
{{--                                    <?php--}}
{{--                                    $getstates = \App\Models\State::get();--}}
{{--                                    foreach ($getstates as $getstate){--}}
{{--                                        ?>--}}
{{--                                    <option>{{$getstate->}}</option>--}}
{{--                                        <?php--}}

{{--                                    }--}}
{{--                                    ?>--}}
{{--                                </select>--}}


                            </div>

                            <div class="col-sm-4 mb-5">

                                <div class="form-group">
                                    <label>Event City</label>
                                    <select type="text" name="event_city" class="form-control">
                                        <?php
                                        $getcity = \App\Models\City::get();
                                        foreach ($getcity as $getcities){
                                            ?>
                                        <option>{{$getcities->city}}</option>
                                            <?php

                                        }
                                        ?>
                                    </select>
                                    {{--                                    <input type="text" name="event_state" class="form-control"--}}
                                    {{--                                           placeholder="Enter event State" value="">--}}
                                </div>
                            </div>

                            <div class="col-sm-4 mb-5">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input type="text" name="event_pincode" class="form-control"
                                           placeholder="Enter event Pincode" value="">
                                </div>
                            </div>

                        </div>
                        <br>

                        <div class="row">

                            <div class="col-sm-6 mb-5">
                                <div class="form-group">
                                    <label>Event End date</label>
                                    <input type="date" name="event_end_date" class="form-control"
                                        placeholder="Enter event location" value="">
                                </div>
                            </div>

                            <div class="col-sm-6 mb-5">
                                <div class="form-group">
                                    <label>Event End Time</label>
                                    <input type="time" name="event_end_time" class="form-control"
                                           placeholder="Enter event location" value="">
                                </div>
                            </div>
                        </div>


                        <br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-sm btn-primary"
                                data-kt-menu-dismiss="true">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--end::Container-->
</div>
@endsection
