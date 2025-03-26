<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imcController extends Controller
{
    
    public function Exercicio() {
        return view('imc');
    }

    // Método para calcular o IMC
    public function calcularIMC(Request $request)
    {
        $peso = $request->input('peso');
        $altura = $request->input('altura');

        // Função para calcular o IMC
        if ($altura <= 0 || $peso <= 0) {
            $resultado = "Valores inválidos. Insira um peso e altura válidos.";
        } else {
            $imc = $peso / ($altura * $altura);
            if ($imc < 18.5) {
                $categoria = "Abaixo do peso";
            } elseif ($imc < 24.9) {
                $categoria = "Peso normal";
            } elseif ($imc < 29.9) {
                $categoria = "Sobrepeso";
            } else {
                $categoria = "Obesidade";
            }
            $resultado = "Seu IMC é " . number_format($imc, 2) . " (" . $categoria . ").";
        }

        return view('imc', ['resultado' => $resultado]);
    }
}
