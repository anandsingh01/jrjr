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

        .select2-container--bootstrap5 .select2-selection--multiple.form-select-lg {
            height: fit-content;
        }


        @media (max-width: 768px) {

            .main_box {
                padding: 20px 0 !important;
            }

            .stay .col-lg-6 {
                margin-top: 20px !important;
            }

            .education .col-lg-4 {
                margin-top: 20px !important;
            }
        }

        h2#heading {
            text-align: center;
            padding: 0 0 25px 0;
        }

        /* @media (max-width: 420px){
                                        .logo_upload {
                                            margin-left: 0px !important;
                                        }
                                     } */
        .same_no {
            width: 200%;
        }

        @media (max-width: 768px) {

            .same_no {
                width: 100%;
            }
        }



        @media (max-width: 1190px) {
            .main_box {
                width: 60% !important;
            }
        }

        @media (max-width: 924px) {
            .main_box {
                width: 70% !important;
            }
        }

        @media (max-width: 420px) {
            .logo_upload {
                margin-left: 0px !important;
            }

            .main_box {
                width: 100% !important;
            }

            #msform fieldset {
                padding: 20px 35px;
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
                            <h2 id="heading">User Register</h2>

                            <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                                @if (session()->has('messages'))
                                    <p class="alert {{ session('alert-class') }}">{{ session('messages') }}</p>
                                @endif
                                <form method="POST" action="{{ route('fund-users-store') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-form-label text-md-end">
                                            {{ __('First name') }}
                                        </label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control" name="fname" required autofocus>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-form-label text-md-end">
                                            {{ __('Last name') }}
                                        </label>

                                        <div class="col-md-6">
                                            <input id="lname" type="text" class="form-control" name="lname" required autofocus>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-form-label text-md-end">
                                            {{ __('Email') }}
                                        </label>

                                        <div class="col-md-6">
                                            <input id="email" type="text" class="form-control" name="email" required autofocus>
                                        </div>
                                    </div>

                                    <!-- <div class="row mb-3">
                                                                                                                                            <div class="col-md-6 offset-md-4">
                                                                                                                                                <div class="form-check">
                                                                                                                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                                                                                                    <label class="form-check-label" for="remember">
                                                                                                                                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('submit') }}
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
