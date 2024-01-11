<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie Produktu</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            position: relative;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            text-align: center;
            margin-top: 50px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #333333;
        }

        input {
            margin-bottom: 20px;
            padding: 10px;
            width: calc(100% - 20px);
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333333;
        }

        .alert-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 90%; 
            margin-top: -75px; 
        }
         .pagination-container {
            margin-top: 20px;
        }

        .show-all-button {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            margin-bottom: 20px; /* Dodany margines na dole */
            display: inline-block; /* Dodany styl, aby uniknąć blokowania całego wiersza */
        }

        .show-all-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="form-container">
        @if(session()->has('message'))
            <div class="alert-container alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="title">Dodaj Produkt</div>

        <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="productName">Nazwa Produktu:</label>
            <input type="text" id="productName" name="Name" required>
            <label for="productPrice">Cena (PLN):</label>
            <input type="number" id="productPrice" name="Price" required>
            <label for="productQuantity">Ilość:</label>
            <input type="number" id="productQuantity" name="Quantity" required>
            <label for="productImage">Zdjęcie:</label>
            <input type="file" id="productImage" name="file" accept="image/*" required>
            <button type="submit">Wyślij</button>
        </form>

        <a href="{{ url('showproduct') }}" class="show-all-button">Pokaż wszystkie produkty</a>
    </div>
</body>
</html>