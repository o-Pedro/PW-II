<?php
    include_once 'conexao.php';

    $cpf             = $_POST["cpf"] ?? '';
    $nome            = $_POST["nome_funcionario"] ?? '';
    $telefone        = $_POST["telefone"] ?? '';
    $data_nascimento = $_POST["data_nascimento"] ?? '';
    $cep             = $_POST["cep"] ?? '';
    $funcao          = $_POST["funcao"] ?? '';
    $salario         = $_POST["salario"] ?? '';

    if(empty($cpf) || empty($nome) || empty($telefone) || empty($data_nascimento) || empty($cep) || empty($funcao) || empty($salario)){
        die("Erro: Todos os campos são obrigatórios.");
    }

    $stmt = $sql->prepare("INSERT INTO funcionario (cpf, nome, telefone, data_nascimento, cep, funcao, salario) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssd", $cpf, $nome, $telefone, $data_nascimento, $cep, $funcao, $salario);

    if($stmt->execute()){
        echo "<script>alert('Funcionário cadastrado com sucesso!'); window.location.href='../HTML/Funcionario.HTML';</script>";
    } else {
        die("Erro ao cadastrar funcionário: " . $sql->error);
    }
?>
