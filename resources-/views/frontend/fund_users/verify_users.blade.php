@extends('layouts.header')
@section('css')
    <style>
        @media only screen and (min-width: 767px){
            .verify-infolist1 {
                width: 50%;
                background: #eef;
                padding: 2em;
                margin: 0 auto;
            }
        }
    </style>
@stop
@section('content')

    <section style="margin-top: 40px">
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="verify-infolist1">
                            <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                                @if (session()->has('messages'))
                                    <p class="alert {{ session('alert-class') }}">{{ session('messages') }}</p>
                                @endif

                                @if(Session::has('otp_number'))
                                    <p class="alert">OTP has sent to {{Session::get('otp_number')}}. Please enter OTP. <a href="{{url('/login')}}">Edit number ?</a></p>
                                @endif

                                <?php
                                 // print_r($Candidate);
                                ?>
                                <form method="POST" action="{{ route('fund-users-otp-verify') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <label for="phone" class="">
                                                    {{ __('Enter Otp.') }}
                                                </label>

                                                <div class="">
                                                    <input id="phone" type="number" class="form-control" name="otp"
                                                           required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- contact info -->
@endsection
