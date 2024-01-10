@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista Produktów') }}</div>

                <div class="card-body">
                    @if(count($products) > 0)
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <img src="/productimage/{{$product->zdjecie}}" class="card-img-top" alt="Zdjęcie produktu">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->nazwa }}</h5>
                                            <p class="card-text">
                                                <strong>Cena:</strong> {{ $product->cena }} PLN<br>
                                                <strong>Ilość:</strong> {{ $product->ilosc }} szt.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        <div class="d-flex justify-content-center">
                            {!! $products->links() !!}

                        </div>
                    @else
                        <p>Brak produktów do wyświetlenia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection