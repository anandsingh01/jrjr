@extends('layouts.dashboard')
@section('content')


    <div class="container-fluid" style="">
        <div class="row justify-content-center" data-select2-id="select2-data-96-sxv5">
            <div class="main_box"
                 data-select2-id="select2-data-95-a3sg">
{{--                <h2 id="heading">User Register</h2>--}}
                <div class="card1 px-0 pb-0 mb-3" data-select2-id="select2-data-94-4rlo">
                    <form id="form" method="post" name="emailform" action="{{url('update-profile')}}">
                        @csrf
                        <h3 class="form-title text-dark">Profile </h3>
                        {{--                                                                <p class="form-undertitle">Fields marked "*" are required.</p>--}}
                        <div class="form-input-grid">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="form-text">Name*</p>
                                    <div class="form-input-wrapper flexbox-left">
                                        <i class="uil uil-user"></i>
                                        <input class="form-input form-control" id="uname" name="name" type="text" placeholder="name" aria-label="" value="{{$user_data->name}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <p class="form-text">Email*</p>
                                    <div class="form-input-wrapper flexbox-left">
                                        <i class="uil uil-at"></i>
                                        <input class="form-input form-control" value="{{$user_data->email}}" readonly id="email" name="email" type="email" placeholder="Email" aria-label="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="form-text">Phone*</p>
                                    <div class="form-input-wrapper flexbox-left">
                                        <i class="uil uil-at"></i>
                                        <input class="form-input form-control" id="phone" readonly value="{{$user_data->number}}"  name="number" type="number" placeholder="Phone" aria-label="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="form-text">Blood Group*</p>
                                    <div class="form-input-wrapper flexbox-left">
                                        <i class="uil uil-at"></i>
                                        <select name="blood_group" class="input form-control"  required >
                                            <option value="A+" {{$user_data->blood_group == 'A+' ? 'selected' : ''}}>A+</option>
                                            <option value="A-" {{$user_data->blood_group == 'A+' ? 'selected' : ''}}>A-</option>
                                            <option value="B+" {{$user_data->blood_group == 'B+' ? 'selected' : ''}}>B+</option>
                                            <option value="B-" {{$user_data->blood_group == 'B-' ? 'selected' : ''}}>B-</option>
                                            <option value="O+" {{$user_data->blood_group == 'O+' ? 'selected' : ''}}>O+</option>
                                            <option value="O-" {{$user_data->blood_group == 'O-' ? 'selected' : ''}}>O-</option>
                                            <option value="AB+" {{$user_data->blood_group == 'AB+' ? 'selected' : ''}}>AB+</option>
                                            <option value="AB-" {{$user_data->blood_group == 'AB-' ? 'selected' : ''}}>AB-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="form-text">Address 1*</p>
                                    <div class="form-input-wrapper flexbox-left">
                                        <i class="uil uil-at"></i>
                                        <input class="form-input form-control" id="phone" readonly
                                               value="{{$user_data->address_1}}"  name="address_1" type="text" placeholder="Phone" aria-label="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="form-text">Address 2*</p>
                                    <div class="form-input-wrapper flexbox-left">
                                        <i class="uil uil-at"></i>
                                        <input class="form-input form-control" id="phone" readonly
                                               value="{{$user_data->address_2}}"  name="address_2" type="text" placeholder="Phone" aria-label="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="form-text">City*</p>
                                    <div class="form-input-wrapper flexbox-left">
                                        <i class="uil uil-at"></i>
                                        <input class="form-input form-control" id="city" readonly
                                               value="{{$user_data->city}}"  name="city" type="text" placeholder="Phone" aria-label="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="form-text">Zipcode*</p>
                                    <div class="form-input-wrapper flexbox-left">
                                        <i class="uil uil-at"></i>
                                        <input class="form-input form-control" id="phone" readonly
                                               value="{{$user_data->zipcode}}"  name="zipcode" type="number" placeholder="Phone" aria-label="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="form-input-max flexbox-left">--}}
{{--                            <div class="button-wrapper">--}}
{{--                                <button id="form-button" type="submit" class="button btn-primary"><i class="uil uil-envelope-heart"></i> Send<div class="btn-secondary"></div></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
