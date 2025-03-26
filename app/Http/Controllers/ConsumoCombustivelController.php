<?php

// app/Http/Controllers/ConsumoCombustivelController.php

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
            $resultado = "Valores inválidos. A distância, o combustível e o valor devem ser maiores que zero.";
        } else {
            
            $consumoPorKm = $combustivel / $distancia;

            $custoTotal = $combustivel * $valorCombustivel;

            $tipoCombustivelTexto = ucfirst($tipoCombustivel);

            $resultado = "O consumo de combustível é de " . number_format($consumoPorKm, 2) . " litros por km. ";
            $resultado .= "O custo total para percorrer " . $distancia . " km com " . $combustivel . " litros de " . $tipoCombustivelTexto . " é R$ " . number_format($custoTotal, 2, ',', '.') . ".";
        }

        return view('consumo_combustivel', ['resultado' => $resultado]);
    }
}


?>