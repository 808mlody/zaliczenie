@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-responsive mt-4">
            <div class="form-container">
                @if(session()->has('message'))
                    <div class="alert-container alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="close-alert">
                            <span aria-hidden="true" style="font-size: 20px; color: #007BFF;">&times;</span>
                        </button>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById('close-alert').addEventListener('click', function () {
                                var alertContainer = document.getElementById('success-alert');
                                alertContainer.style.display = 'none';
                            });
                        });
                    </script>
                @endif
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nazwa</th>
                            <th>Cena</th>
                            <th>Ilość</th>
                            <th>Zdjęcie</th>
                            <th>Edytuj</th>
                            <th>Usuń</th>
                            
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

                                <td>
                                    <a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Edytuj</a>
                                </td>

                                <td>
                                    <a class="btn btn-danger" href="{{url('deleteproduct',$product->id)}}" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">Usuń</a>
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