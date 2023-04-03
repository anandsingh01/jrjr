@extends('layouts.header')

@section('css')
    <style>
        @media only screen and (min-width: 600px) {
            form.payment-form1{
                width:50%;
                margin:0 auto;
            }
            /*.container.upcoming_event {*/
            /*    padding: 10em 0;*/
            /*}*/
            .tab-content {
                padding: 30px 0;
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
  box-shadow: 0 0 15px 0px rgba(30, 22, 1, 0.3);
  margin: 25px 0;
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
  font-weight: 400;
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
.input:focus {
  border: 2px solid #00a859;
}

</style>

@endsection
@section('content')

    <div class="container upcoming_event">
        <!--<div class="section-title text-center">-->
        <!--    <h3 class="text-uppercase mt-0">Login</h3>-->
        <!--</div>-->
        <div class="row g-3 mtli-row-clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form class="payment-form1" method="POST" action="{{ url('fund/users-login') }}">
                    @csrf
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-sm-8">
                            {{--    <label for="phone" class="col-md-4 col-form-label text-md-end"> {{ __('Mobile No.') }} --}}
                                </label>
{{--                                <input id="phone" type="number" class="form-control" name="number" placeholder="Phone Number *"--}}
{{--                                       oninput="javascript: if (this.value.length = this.maxLength )--}}
{{--                                           this.value = this.value.slice(0, this.maxLength);"--}}
{{--                                       maxLength = "10"--}}
{{--                                       minLength = "10"--}}
{{--                                       required autofocus>--}}
{{--                                <input type="submit" class="wizard-btn" data-ripple="">--}}



                                <div class="container1">
                                  <div class="inputfield">
                                      <h3 class="text-uppercase mt-0" style="text-align:center;margin-bottom:15px">Login</h3>
                                    <form>
                                        <label for="number" class=""> {{ __('Mobile No.') }} </label>
                                        <input type="Number" class="input"
                                               placeholder="Mobile Number for OTP"
                                               required oninput="javascript: if (this.value.length = this.maxLength )
                                           this.value = this.value.slice(0, this.maxLength);"
                                       maxLength = "10"
                                       minLength = "10"
                                               name="number"
                                        />
                                    </form>
                                  </div>
                                  <button class="" id="submit" >Submit</button>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
