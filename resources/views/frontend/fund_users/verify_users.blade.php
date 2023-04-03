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
        .alert{
            padding: 0 8px;
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
  box-shadow: 0 0 15px 0px rgba(30, 22, 1, 0.3);
  margin: 25px 0px;
}
.inputfield {
  width: 100%;
  display: flex;
  justify-content: space-around;
}
.input {
  height: 55px;
  width: 55px;
  border: 2px solid #dad9df;
  outline: none;
  text-align: center;
  font-size: 26px;
  border-radius: 0.3em;
  background-color: #ffffff;
  outline: none;
  /*Hide number field arrows*/
  -moz-appearance: textfield;
}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
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
.show {
  display: block;
}
.hide {
  display: none;
}
.input:disabled {
  color: #89888b;
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
                            <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                              {{--   @if (session()->has('messages'))
                                    <p class="alert {{ session('alert-class') }}">{{ session('messages') }}</p>
                                @endif

                                @if(Session::has('otp_number'))
                                    <p class="alert">OTP has sent to {{Session::get('otp_number')}}. Please enter OTP. <a href="{{url('/login')}}">Edit number ?</a></p>
                                @endif --}}

                                <?php
                                 // print_r($Candidate);
                                ?>
                                <form method="POST" action="{{ route('fund-users-otp-verify') }}">
                                    @csrf
{{--                                    <div class="row mb-3">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}

{{--                                                <label for="phone" class="">--}}
{{--                                                    {{ __('Enter Otp.') }}--}}
{{--                                                </label>--}}

{{--                                                <div class="">--}}
{{--                                                    <input id="phone" type="number" class="form-control"--}}
{{--                                                           name="otp"--}}
{{--                                                           required autofocus>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="container1">
                                        <h3 class="text-uppercase mt-0" style="text-align:center;margin-bottom:15px">OTP</h3>
                                        @if (session()->has('messages'))
                                    <p class="alert {{ session('alert-class') }}">{{ session('messages') }}</p>
                                @endif

                                @if(Session::has('otp_number'))
                                    <p class="alert">Enter OTP which has sent on <b>{{Session::get('otp_number')}}</b>. <a href="{{url('/login')}}"> <br>Edit number ?</a></p>
                                @endif

                                        <div class="inputfield">
                                            <form>


                                                <input type="number" name="otp[]" maxlength="1" class="input" required />
                                                <input type="number" name="otp[]" maxlength="1" class="input" required />
                                                <input type="number" name="otp[]" maxlength="1" class="input" required />
                                                <input type="number" name="otp[]" maxlength="1" class="input" required />
                                            </form>


                                        </div>
                                        <div class="otp_submit" style="text-align:center">
                                            <button type="submit" id="submit" >Submit</button
                                        </div>
                                    </div>

{{--                                    <div class="row mb-0">--}}
{{--                                        <div class="col-md-8 offset-md-5">--}}
{{--                                            <button type="submit" class="btn btn-primary">--}}
{{--                                                {{ __('Login') }}--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </form>






                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- contact info -->



    <script>
        //Initial references
const input = document.querySelectorAll(".input");
const inputField = document.querySelector(".inputfield");
const submitButton = document.getElementById("submit");
let inputCount = 0,
  finalInput = "";

//Update input
const updateInputConfig = (element, disabledStatus) => {
//   element.disabled = disabledStatus;
  if (disabledStatus) {
    element.focus();
  } else {
      element.focus();
  }
};

input.forEach((element) => {
  element.addEventListener("keyup", (e) => {
    e.target.value = e.target.value.replace(/[^0-9]/g, "");
    let { value } = e.target;

    if (value.length == 1) {
      updateInputConfig(e.target, true);
      if (inputCount <= 3 && e.key != "Backspace") {
        finalInput += value;
        if (inputCount < 4) {
          updateInputConfig(e.target.nextElementSibling, true);
        }
      }
      inputCount += 1;
    } else if (value.length == 0 && e.key == "Backspace") {
      finalInput = finalInput.substring(0, finalInput.length - 1);
      if (inputCount == 0) {
        updateInputConfig(e.target, false);
        return false;
      }
      updateInputConfig(e.target, false);
      e.target.previousElementSibling.value = "";
      updateInputConfig(e.target.previousElementSibling, false);
      inputCount -= 1;
    } else if (value.length > 1) {
      e.target.value = value.split("")[0];
    }
    // submitButton.classList.add("hide");
  });
});

window.addEventListener("keyup", (e) => {
  if (inputCount > 4) {
    // submitButton.classList.remove("hide");
    // submitButton.classList.add("show");
    if (e.key == "Backspace") {
      finalInput = finalInput.substring(0, finalInput.length - 1);
      updateInputConfig(inputField.lastElementChild, false);
      inputField.lastElementChild.value = "";
      inputCount -= 1;
      submitButton.classList.add("hide");
    }
  }
});

const validateOTP = () => {
  alert("Success");
};

//Start
// const startInput = () => {
//   inputCount = 0;
//   finalInput = "";
//   input.forEach((element) => {
//     element.value = "";
//   });
//   updateInputConfig(inputField.firstElementChild, false);
// };

window.onload = startInput();

    </script>
@endsection
