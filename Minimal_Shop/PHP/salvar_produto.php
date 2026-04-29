<?php
    include_once 'conexao.php'; //Pega tudo do outro PHP

    //Recebendo dados do formulário
    $nome       = $_POST["nome_produto"] ?? '';
    $categoria  = $_POST["categoria_produto"] ?? '';
    $cor        = $_POST["cor_produto"] ?? '';
    $marca      = $_POST["marca_produto"] ?? '';
    $descricao  = $_POST["descricao_produto"] ?? '';
    $preco      = $_POST["preco_produto"] ?? '';
    $quantidade = $_POST["quantidade_produto"] ?? '';

    //Verifica se os campos obrigatórios estão preenchidos
    if(empty($nome) || empty($categoria) || empty($cor) || empty($marca) || empty($descricao) || empty($preco) || empty($quantidade)){
        die("Erro: Todos os campos são obrigatórios.");
    }

    //Insere os dados no banco de dados
    $stmt = $sql->prepare("INSERT INTO produto (nome, categoria, cor, marca, descricao, preco, quantidade) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssdi", $nome, $categoria, $cor, $marca, $descricao, $preco, $quantidade);

    if($stmt->execute()){
        echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='../HTML/Produto.HTML';</script>";
    } else {
        die("Erro ao cadastrar produto: " . $sql->error);
    }
?>
