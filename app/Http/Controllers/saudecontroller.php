<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class saudecontroller extends Controller
{
    // Exibe o formulário com os campos para IMC e sono
    public function index()
    {
        return view('saude');
    }

    // Calcula IMC e qualidade do sono
    public function calcularSaude(Request $request)
    {
        // Cálculo do IMC
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $idade = $request->input('idade');
        $horasDormidas = $request->input('horas_dormidas');

        // Validação dos inputs
        if ($altura <= 0 || $peso <= 0 || $horasDormidas < 0 || $idade <= 0) {
            $resultado = "Valores inválidos. Insira todos os dados corretamente.";
        } else {
            // Cálculo do IMC
            $imc = $peso / ($altura * $altura);
            if ($imc < 18.5) {
                $categoriaIMC = "Abaixo do peso";
            } elseif ($imc < 24.9) {
                $categoriaIMC = "Peso normal";
            } elseif ($imc < 29.9) {
                $categoriaIMC = "Sobrepeso";
            } else {
                $categoriaIMC = "Obesidade";
            }

            // Avaliação da qualidade do sono conforme a idade
            $recomendacaoSono = $this->avaliarQualidadeSono($idade, $horasDormidas);

            // Resultado final
            $resultado = [
                'imc' => "Seu IMC é " . number_format($imc, 2) . " (" . $categoriaIMC . ").",
                'sono' => $recomendacaoSono
            ];
        }

        return view('saude', ['resultado' => $resultado]);
    }

    private function avaliarQualidadeSono($idade, $horasDormidas)
    {
        // Recomendação de horas de sono por faixa etária
        if ($idade >= 18) {
            $recomendacao = [7, 9];  // Faixa de 7 a 9 horas
        } elseif ($idade >= 13) {
            $recomendacao = [8, 10]; // Faixa de 8 a 10 horas
        } elseif ($idade >= 6) {
            $recomendacao = [9, 11]; // Faixa de 9 a 11 horas
        } elseif ($idade >= 3) {
            $recomendacao = [10, 13]; // Faixa de 10 a 13 horas
        } else {
            $recomendacao = [12, 14]; // Faixa de 12 a 14 horas
        }
    
        // Avaliar a qualidade do sono
        if ($horasDormidas < $recomendacao[0]) {
            return "Qualidade do sono: Insuficiente. Tente dormir mais horas!";
        } elseif ($horasDormidas > $recomendacao[1]) {
            return "Qualidade do sono: Excesso de sono. Tente manter uma rotina mais equilibrada.";
        } else {
            return "Qualidade do sono: Ideal. Continue mantendo uma boa rotina de sono.";
        }
    }
}
?>