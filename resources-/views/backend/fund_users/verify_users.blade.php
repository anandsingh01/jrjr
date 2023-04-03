@extends('layouts.header')

@section('content')
    <div class="container-fluid" style="margin-top: 10rem;margin-bottom: 10rem;">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center mt-3 mb-2 main_box_small">
                <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                    @if (session()->has('messages'))
                        <p class="alert {{ session('alert-class') }}">{{ session('messages') }}</p>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body">
                                <form method="POST" action="{{ route('fund-users-otp-verify') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-form-label text-md-end">
                                            {{ __('Enter Otp.') }}
                                        </label>

                                        <div class="col-md-6">
                                            <input id="phone" type="number" class="form-control" name="otp"
                                                required autofocus>
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
    </div>
@endsection
