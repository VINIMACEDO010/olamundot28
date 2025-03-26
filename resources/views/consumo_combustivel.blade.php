@extends('layout.app')
@section('Combustível')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Consumo de Combustível</title>
    <style>
    /* Estilos gerais */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h2 {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
        color: #333;
    }

    /* Estilizando o formulário */
    form {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 100%;
        max-width: 400px;
        box-sizing: border-box;
    }

    form label {
        font-size: 16px;
        color: #555;
        margin-bottom: 8px;
        display: block;
    }

    input[type="number"], select {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
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
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Estilos para o resultado */
    .resultado-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin-top: 20px;
        text-align: center;
    }

    .resultado-card h3 {
        font-size: 22px;
        color: #28a745;
        margin-bottom: 20px;
    }

    .resultado-item {
        font-size: 16px;
        margin-bottom: 10px;
        color: #333;
    }

    .resultado-item strong {
        font-weight: bold;
        color: #007BFF;
    }

    .resultado-item i {
        color: #007BFF;
        margin-right: 8px;
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
        <p>{!! nl2br(e($resultado)) !!}</p>
    @endif
</body>
</html>
@endsection
