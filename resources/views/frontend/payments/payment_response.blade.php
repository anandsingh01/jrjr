@extends('layouts.header')
@section('css')
    <!--<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>-->
    <!--<style>-->
    <!--    @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);-->
    <!--    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);-->
    <!--</style>-->
    <!--<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">-->
    <!--<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>-->
    <!--<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>-->
    <style>
        #payment_response_div{
            padding:5em;
            text-align: center;
        }
        
        .payment_response_div .site-header__title{
            font-size: 50px;
            margin: 20px 0;
            
        } 
        .payment_response_div i{
            font-size: 65px;
            color: #00a859;
        } 
        .payment_response_div p.main-content__body{
            font-size: 15px;
            margin: 20px 0;
        } 
    </style>
    @stop
@section('content')
    <section id="payment_response_div" class="payment_response_div">
        <div class="site-header2" id="header2">
            <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
            <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
        </div>

        <div class="main-content">
            
            <p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for supporting. It means a lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for being you.</p>
        </div>

        <div class="row">
            <!--<a href="{{url('/')}}" class="btn btn-success" style="background: #00a859">Go To Homepage</a>-->
            <a href="{{url('/')}}" data-ripple="" class="ls-l sl-2 layer-button" style="font:bold 11px 'open sans';color:#fff;letter-spacing:1px;padding:18px 18px;text-transform:uppercase;display:inline-block;" data-ls="offsetxin:50;delayin:1500;skewxin:-60;offsetxout:-50;durationout:1000;skewxout:-60;">Go To Homepage</a>
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
