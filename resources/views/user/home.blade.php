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
    
    <style>
body {
    /* Gradient poziomy od lewej (czerwony) do prawej (zielony) do niebieskiego */
    background: linear-gradient(0deg, rgba(172,172,172,1) 0%, rgba(255,255,255,1) 89%);
    /* Reszta stylów */
    color: white; /* Kolor tekstu na tle gradientu */
}
        .card {
            background-color: #ffffff; /* Kolor tła karty */
            border: 1px solid #ddd; /* Krawędź karty */
            margin-bottom: 20px; /* Margines między kartami */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Cień karty */
        }

        .card-body {
            padding: 20px; /* Wypełnienie dla treści wewnątrz karty */
        }

        .btn-primary {
            background-color: #007bff; /* Kolor tła przycisku głównego */
            border-color: #007bff; /* Kolor obramowania przycisku głównego */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Kolor tła przycisku głównego po najechaniu myszką */
            border-color: #0056b3; /* Kolor obramowania przycisku głównego po najechaniu myszką */
        }

        .alert {
            padding: 15px; /* Wypełnienie dla komunikatów */
            margin-bottom: 20px; /* Margines na dole komunikatów */
            border: 1px solid transparent; /* Krawędź komunikatów */
            border-radius: 4px; /* Zakrzywienie narożników komunikatów */
        }

        .alert-success {
            background-color: #d4edda; /* Kolor tła komunikatu sukcesu */
            border-color: #c3e6cb; /* Kolor obramowania komunikatu sukcesu */
            color: #155724; /* Kolor tekstu komunikatu sukcesu */
        }
    </style>
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
                                            <input type="number" value="1" min="1" class="form-control" style="width:100px" name="ilosc">
                                            <br><br>

                                        <input class="btn btn-primary" type="submit" value="Dodaj do koszyka">
                                        </form>
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