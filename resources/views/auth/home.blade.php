@extends('layouts.app')

@section('content')

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