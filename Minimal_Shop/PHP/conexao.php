<?php
    $sql = new mysqli("localhost", "root", "");

    if ($sql->connect_error) {
        die("Erro na conexão: " . $sql->connect_error);
    }

    $sql->set_charset("utf8mb4");

    $sql->query("CREATE DATABASE IF NOT EXISTS minimal_shop CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    $sql->select_db("minimal_shop");

    $sql->query("CREATE TABLE IF NOT EXISTS funcionario (
        cpf char(11) NOT NULL DEFAULT '',
        nome varchar(100) NOT NULL DEFAULT '',
        telefone bigint NOT NULL DEFAULT 0,
        data_nascimento date NOT NULL,
        cep char(8) NOT NULL DEFAULT '',
        funcao varchar(50) NOT NULL DEFAULT '',
        salario decimal(10,2) NOT NULL DEFAULT 0.00,
        PRIMARY KEY (cpf)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

    $sql->query("CREATE TABLE IF NOT EXISTS produto (
        codigo int NOT NULL AUTO_INCREMENT,
        nome varchar(100) NOT NULL DEFAULT '',
        categoria varchar(50) NOT NULL DEFAULT '',
        cor varchar(50) NOT NULL DEFAULT '',
        marca varchar(100) NOT NULL DEFAULT '',
        descricao varchar(100) NOT NULL DEFAULT '',
        preco decimal(10,2) NOT NULL DEFAULT 0.00,
        quantidade int NOT NULL,
        PRIMARY KEY (codigo)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
?>
