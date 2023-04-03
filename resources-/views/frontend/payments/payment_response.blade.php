@extends('layouts.header')
@section('css')
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    </style>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
    <style>
        #payment_response_div{
            padding:5em;
        }
    </style>
    @stop
@section('content')
    <section id="payment_response_div">
        <div class="site-header2" id="header2">
            <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
        </div>

        <div class="main-content">
            <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
            <p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for supporting. It means a lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for being you.</p>
        </div>

        <div class="row">
            <a href="{{url('/')}}" class="btn btn-success">Go To Homepage</a>
        </div>
    </section>

@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.razorpay-payment-button').click();
        });
    </script>
@stop
