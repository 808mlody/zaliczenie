@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nazwa</th>
                            <th>Cena</th>
                            <th>Ilość</th>
                            <th>Zdjęcie</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->nazwa }}</td>
                                <td>{{ $product->cena }}</td>
                                <td>{{ $product->ilosc }}</td>
                                <td>
                                    <img src="/productimage/{{ $product->zdjecie }}" alt="Zdjęcie produktu" class="img-thumbnail" style="max-width: 50px;">
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection