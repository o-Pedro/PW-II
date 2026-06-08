<?php

    $nome = $_POST["nome"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    $imc = ($peso/($altura*$altura));

    if ($imc < 18.5){
        echo "Olá ". $nome. "seu IMC é: ". number_format($imc, 4). "e você está abaixo do peso ideal (magresa)"; //number_format --> primeiro jeito de arredondar as casas decimais; o 4 representa o total de casas após a vírgula
    } else if ($imc >= 18.5 && $imc <= 24.9){
        echo "Olá ". $nome. "seu IMC é: ". sprintf("%.4f", $imc). "e você está em seu peso ideal (em forma)"; //sprintf --> segundo jeito de arredondar as casas decimais; o 4 representa o total de casas após a vírgula
    } else if ($imc >= 25 && $imc <30) {
        echo "Olá ". $nome. "seu IMC é: ". round($imc, 4). "e você está com o peso acima do ideal (sobrepeso)"; //round --> terceito jeito de arredondar as casas decimais; o 4 representa o total de casas após a vírgula
    } else if ($imc >= 30 && $imc < 35) {
        echo "Olá ". $nome. "seu IMC é: ". number_format($imc, 4). "e você está com o peso muito acima do seu ideal (obeso grau 1)";
    } else if ($imc >= 35 && $imc < 40) {
        echo "Olá ". $nome. "seu IMC é: ". number_format($imc, 4). "e você está com o peso muito acima do seu ideal (obeso grau 2)";
    } else {
        echo "Olá ". $nome. "seu IMC é: ". number_format($imc, 4). "e você está com o peso muito acima do seu ideal (obeso grau 3)";
    }

?>