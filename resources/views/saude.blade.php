@extends('layout.app')
@section('title', 'Calculadora de IMC e Qualidade do Sono')
@section('content')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC e Qualidade do Sono</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .resultado-card {
            margin-top: 20px;
            background-color: #e9f7e3;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            font-size: 18px;
        }

        .resultado-card h3 {
            font-size: 24px;
            color: #28a745;
        }

        .resultado-card p {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Calculadora de IMC e Qualidade do Sono</h2>
        <form method="POST" action="{{ url('/saude') }}">
            @csrf
            <label for="peso">Peso (kg):</label>
            <input type="number" name="peso" step="0.01" min="0" required>
            
            <label for="altura">Altura (m):</label>
            <input type="number" name="altura" step="0.01" min="0" required>

            <label for="idade">Idade (anos):</label>
            <input type="number" name="idade" min="0" required>

            <label for="horas_dormidas">Horas de Sono (por noite):</label>
            <input type="number" name="horas_dormidas" step="0.1" min="0" required>

            <input type="submit" value="Calcular IMC e Qualidade do Sono">
        </form>

        @if (isset($resultado))
            <div class="resultado-card">
                <h3>Resultado do IMC</h3>
                <p><strong>IMC:</strong> {{ $resultado['imc'] }}</p>
                <h3>Qualidade do Sono</h3>
                <p><strong>Horas de Sono:</strong> {{ $resultado['sono'] }}</p>
            </div>
        @endif
    </div>

</body>
</html>

@endsection
