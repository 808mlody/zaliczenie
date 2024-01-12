@extends('layouts.app')

@section('content')

<table class="table table-dark table-striped-columns mx-auto" style="margin: 100px; width: 800px" >
            <tr>
                <td>Nazwa Produktu</td>
                <td>Ilość</td>
                <td>Cena</td>
            </tr>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->nazwa}}</td>
                <td>{{$cart->ilosc}}</td>
                <td>{{$cart->cena}}</td>
            </tr>
            @endforeach
</table>

@endsection