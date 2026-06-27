<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários Cadastrados</title>
    <link rel="stylesheet" href="../CSS/Listagem.CSS">
</head>
<body>
    <div id="topo">
        <a href="../HTML/Index.HTML"><img src="../Imagens/Logo_Branco.png" alt="" id="logo"></a>
        <h1>Funcionários Cadastrados</h1>
    </div>

    <div id="conteudo">
        <?php
            include_once 'conexao.php';

            $query = $sql->query("SELECT cpf, nome, telefone, data_nascimento, cep, funcao, salario FROM funcionario ORDER BY nome");

            if(!$query){
                die("Erro ao buscar funcionários: " . $sql->error);
            }
        ?>

        <table>
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>CEP</th>
                <th>Função</th>
                <th>Salário</th>
            </tr>

            <?php while($row = $query->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['cpf']); ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row['data_nascimento'])); ?></td>
                    <td><?php echo htmlspecialchars($row['cep']); ?></td>
                    <td><?php echo htmlspecialchars($row['funcao']); ?></td>
                    <td>R$ <?php echo number_format($row['salario'], 2, ',', '.'); ?></td>
                </tr>
            <?php } ?>
        </table>

        <a href="../HTML/Funcionario.HTML" id="voltar">VOLTAR</a>
    </div>
</body>
</html>
