@extends('layouts.header')
@section('css')
    <style>
        @media only screen and (min-width: 767px){
            .verify-infolist1 {
                width: 35%;
                /*background: #eef;*/
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


    <style>
    .container1 {
  width: 100%;
  background-color: #ffffff;
  padding: 4em 2em;
  /*position: absolute;*/
  /*transform: translate(-50%, -50%);*/
  /*top: 50%;*/
  /*left: 50%;*/
  border-radius: 0.8em;
  box-shadow: 0 45px 60px rgba(30, 22, 1, 0.3);
}
.inputfield {
  width: 100%;
  /*display: flex;*/
  /*justify-content: space-around;*/
}
.input {
    margin: 12px 0;
    padding: 0 15px;
  height: 50px;
    width: 100%;
  border: 2px solid #dad9df;
  outline: none;
  font-size: 17px;
  border-radius: 0.3em;
  background-color: #ffffff;
  outline: none;
  /*Hide number field arrows*/
  -moz-appearance: textfield;
}

#submit {
  background-color: #00a859;
  border: none;
  outline: none;
  font-size: 1.2em;
  padding: 0.8em 2em;
  color: #ffffff;
  border-radius: 0.1em;
  margin: 1em auto 0 auto;
  cursor: pointer;
}
.input:focus {
  border: 2px solid #00a859;
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
{{--                                <form method="POST" action="{{ route('fund-users-store') }}">--}}
{{--                                    @csrf--}}
{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="phone" class="col-md-4 col-form-label text-md-end">--}}
{{--                                            {{ __('First name') }}--}}
{{--                                        </label>--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <input id="phone" type="text" class="form-control" name="fname" required autofocus>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="phone" class="col-md-4 col-form-label text-md-end">--}}
{{--                                            {{ __('Last name') }}--}}
{{--                                        </label>--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <input id="lname" type="text" class="form-control" name="lname" required autofocus>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="phone" class="col-md-4 col-form-label text-md-end">--}}
{{--                                            {{ __('Email') }}--}}
{{--                                        </label>--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <input id="email" type="text" class="form-control" name="email" required autofocus>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}



{{--                                </form>--}}


                                <div class="container1">
                                  <div class="inputfield">
                                      <form method="POST" action="{{ route('fund-users-store') }}">
                                          @csrf
                                    <input type="text" name="fname" class="input" placeholder="First Name" required />
                                    <input type="text" name="lname" class="input" placeholder="Last Name" required />
                                    <input type="email"  name="email" class="input" placeholder="Email Id" required />
                                          <label>Blood Group</label>
                                          <select name="blood_group" class="input"  required >
                                          <option value="A+">A+</option>
                                          <option value="A-">A-</option>
                                          <option value="B+">B+</option>
                                          <option value="B-">B-</option>
                                          <option value="O+">O+</option>
                                          <option value="O-">O-</option>
                                          <option value="AB+">AB+</option>
                                          <option value="AB-">AB-</option>
                                      </select>
                                          <label>DOB</label>
                                          <input type="date" name="dob" class="input" placeholder="date" required />

                                          <input type="text" name="address_1" class="input" placeholder="Address Line 1" required />
                                          <input type="text" name="address_2" class="input" placeholder="Address Line 2" required />
                                          <input type="text" name="city" class="input" placeholder="City" required />
                                          <input type="text" name="zipcode" class="input" placeholder="City" required />
                                          <div class="row mb-0">
                                              <div class="col-md-8 offset-md-5">
                                                  <button type="submit" id="submit" class="btn btn-primary">
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

            </div>
        </div>
    </section><!-- contact info -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
