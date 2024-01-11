@extends('layouts.app')

@section('content')
<style>
body {
    /* Gradient poziomy od lewej (czerwony) do prawej (zielony) do niebieskiego */
    background: linear-gradient(0deg, rgba(172,172,172,1) 0%, rgba(255,255,255,1) 89%);
    /* Reszta stylów */
    color: white;
    background-size: cover;
    height: 100vh; /* Kolor tekstu na tle gradientu */
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
