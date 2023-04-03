@extends('layouts.header')
@section('content')
<style>
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


<div class="container-fluid" style="margin-top: 100px">
    <div class="row justify-content-center" data-select2-id="select2-data-96-sxv5">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center mt-3 mb-2 main_box"
            data-select2-id="select2-data-95-a3sg">
            <h2 id="heading">User Register</h2>
            <div class="card1 px-0 pb-0 mb-3" data-select2-id="select2-data-94-4rlo">
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
                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">
                            {{ __('Blood Group') }}
                        </label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" required autofocus>
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
