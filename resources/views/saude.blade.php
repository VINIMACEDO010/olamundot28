@extends('layout.app')
@section('title', 'IMC')
@section('content')


<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de IMC e Qualidade do Sono</title>
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
        input[type="number"], input[type="text"] {
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
    <h2>Calculadora de IMC e Qualidade do Sono</h2>
    <form method="POST" action="{{ url('/saude') }}">
        @csrf
        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso" step="0.01" min="0" required>
        <br>
        <label for="altura">Altura (m):</label>
        <input type="number" name="altura" step="0.01" min="0" required>
        <br>
        <label for="idade">Idade (anos):</label>
        <input type="number" name="idade" min="0" required>
        <br>
        <label for="horas_dormidas">Horas de Sono (por noite):</label>
        <input type="number" name="horas_dormidas" step="0.1" min="0" required>
        <br>
        <input type="submit" value="Calcular IMC e Qualidade do Sono">
    </form>

    @if (isset($resultado))
        <h3>Resultado:</h3>
        <p>{{ $resultado['imc'] }}</p>
        <p>{{ $resultado['sono'] }}</p>
    @endif
</body>
</html>
@endsection
