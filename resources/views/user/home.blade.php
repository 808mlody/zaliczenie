@extends('layouts.app')

@section('content')\
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
</head>   



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="form-container">

        @if(session()->has('message'))
            <div class="alert-container alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif



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
                                          <form action="{{url('addcart',$product->id)}}" method="POST">
                                            @csrf
                                            <input type="number" value="1" min="1" class="form=control" style="width:100px" name="quantity">
                                            <br><br>

                                        <input class="btn btn-primary" type="submit" value="Dodaj do koszyka">
                                        </from>
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