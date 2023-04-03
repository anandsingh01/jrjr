@extends('layouts.header')

@section('css')
    <style>
        @media only screen and (min-width: 600px) {
            form.payment-form1{
                width:50%;
                margin:0 auto;
            }
            .container.upcoming_event {
                padding: 10em 0;
            }
            .tab-content {
                padding: 30px 0;
            }
        }
    </style>

@endsection
@section('content')

    <div class="container upcoming_event">
        <div class="section-title text-center">
            <h3 class="text-uppercase mt-0">Login</h3>
            <p>Help today because tomorrow you may be the one who needs more helping!</p>
        </div>
        <div class="row g-3 mtli-row-clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form class="payment-form1" method="POST" action="{{ url('fund/users-login') }}">
                    @csrf
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-sm-8">
                                <label for="phone" class="col-md-4 col-form-label text-md-end"> {{ __('Mobile No.') }}
                                </label>
                                <input id="phone" type="number" class="form-control" name="number" placeholder="Phone Number *"
                                       oninput="javascript: if (this.value.length = this.maxLength )
                                           this.value = this.value.slice(0, this.maxLength);"
                                       maxLength = "10"
                                       minLength = "10"
                                       required autofocus>
                                <input type="submit" class="wizard-btn" data-ripple="">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
