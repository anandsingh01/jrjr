@extends('layouts.header')
@section('css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

@stop
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 col-md-offset-6">
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> {{ Session::get('error') }}
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}"
                             role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> {{ Session::get('success') }}
                        </div>

                    @endif
                </div>
            </div>
            <form action="{!! route('payment') !!}" method="POST">
                @csrf
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="rzp_test_ZB8GMwDqEm40nX"
                        data-amount="{{ $amount * 100}}"
                        data-currency="INR"
                        data-buttontext="Pay {{ $amount }} INR"
                        data-description="{{$fundraiser_id}}"
                        data-name="{{$name}}"
                        data-prefill.name="name"
                        data-prefill.email="{{$email}}"
                        data-image=""
                        data-theme.color="#F37254"></script>
            </form>
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
