<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumoCombustivelController extends Controller
{
    public function index()
    {
        return view('consumo_combustivel');
    }

    public function calcularConsumo(Request $request)
    {
        $distancia = $request->input('distancia');
        $combustivel = $request->input('combustivel');
        $tipoCombustivel = $request->input('tipo_combustivel');
        $valorCombustivel = $request->input('valor_combustivel');

        if ($distancia <= 0 || $combustivel <= 0 || $valorCombustivel <= 0) {
            $resultado = "❌ Valores inválidos. A distância, o combustível e o valor devem ser maiores que zero.";
        } else {
            $consumoMedio = $distancia / $combustivel;
            $custoTotal = $combustivel * $valorCombustivel;
            $autonomiaTotal = $combustivel * $consumoMedio;
            $tipoCombustivelTexto = ucfirst($tipoCombustivel);

            // Construção da string corrigida sem <strong>
            $resultado = "📌 Consumo médio: " . number_format($consumoMedio, 2) . " km/l.\n";
            $resultado .= "💰 Custo total: R$ " . number_format($custoTotal, 2, ',', '.') . ".\n";
            $resultado .= "⛽ Autonomia total estimada: " . number_format($autonomiaTotal, 2) . " km com " . $combustivel . " litros de " . $tipoCombustivelTexto . ".";
        }

        return view('consumo_combustivel', compact('resultado'));
    }
}
?>
