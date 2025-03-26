@extends('layout.app')
@section('title', 'IMC')
@section('content')


<!DOCTYPE html>
<html>
<head>
    <title> IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        form {
            display: inline-block;
            text-align: left;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h2>IMC</h2>
    <form method="POST" action="{{ url('/imc') }}">
        @csrf
        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso" step="0.01" min="0" required>
        <br>
        <label for="altura">Altura (m):</label>
        <input type="number" name="altura" step="0.01" min="0" required>
        <br>
        <input type="submit" value="Calcular IMC">
    </form>

    @if (isset($resultado))
        <h3>Resultado:</h3>
        <p>{{ $resultado }}</p>
    @endif
</body>
</html>


@endsection
