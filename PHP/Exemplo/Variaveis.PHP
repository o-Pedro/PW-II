<?php

if(isset($_POST['enviar'])){

$nome = $_POST ["nome"];
$num = $_POST ['num'];
$valor = $_POST ["valor"];

echo "O seu nome é: ". $nome. "<br>";
echo "Valor: ". " $valor". "<br>";
$res = $num * $valor;
echo "Resposta é: ". "$res";

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <form type="text" action="" method="post">
        <p>Digite seu nome: </p>
        <input type="text" name="nome">
        <p>Digite um número: </p>
        <input type="text" name="num"><br>
        <p>Digite um valor: </p>
        <input type="text" name="valor"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>