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
            <div class="card dashboard-background">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Jesteś zalogowany jako administrator!') }}
                    <a href="{{ url('product') }}" class="btn btn-primary">Dodaj nowy produkt</a>
                    <a href="{{ url('showproduct')}}" class="btn btn-primary">Pokaż wszystkie produkty</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection