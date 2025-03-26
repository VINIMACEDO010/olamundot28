@extends('layout.app')
@section('Combustível')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Consumo de Combustível</title>
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
        input[type="number"], select {
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
    <h2>Calculadora de Consumo de Combustível</h2>
    <form method="POST" action="{{ url('/consumo-combustivel') }}">
        @csrf
        <label for="distancia">Distância percorrida (km):</label>
        <input type="number" name="distancia" step="0.1" min="0" required>
        <br>
        <label for="combustivel">Combustível consumido (litros):</label>
        <input type="number" name="combustivel" step="0.1" min="0" required>
        <br>
        <label for="tipo_combustivel">Tipo de combustível:</label>
        <select name="tipo_combustivel" required>
            <option value="gasolina">Gasolina</option>
            <option value="alcool">Álcool</option>
            <option value="diesel">Diesel</option>
        </select>
        <br>
        <label for="valor_combustivel">Valor do combustível (por litro):</label>
        <input type="number" name="valor_combustivel" step="0.01" min="0" required>
        <br>
        <input type="submit" value="Calcular Consumo">
    </form>

    @if (isset($resultado))
        <h3>Resultado:</h3>
        <p>{{ $resultado }}</p>
    @endif
</body>
</html>
@endsection
