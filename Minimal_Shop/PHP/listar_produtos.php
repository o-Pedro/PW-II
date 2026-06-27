<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Cadastrados</title>
    <link rel="stylesheet" href="../CSS/Listagem.CSS">
</head>
<body>
    <div id="topo">
        <a href="../HTML/Index.HTML"><img src="../Imagens/Logo_Branco.png" alt="" id="logo"></a>
        <h1>Produtos Cadastrados</h1>
    </div>

    <div id="conteudo">
        <?php
            include_once 'conexao.php';

            $query = $sql->query("SELECT codigo, nome, categoria, cor, marca, descricao, preco, quantidade FROM produto ORDER BY codigo");

            if(!$query){
                die("Erro ao buscar produtos: " . $sql->error);
            }
        ?>

        <table>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Cor</th>
                <th>Marca</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>

            <?php while($row = $query->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                    <td><?php echo htmlspecialchars($row['cor']); ?></td>
                    <td><?php echo htmlspecialchars($row['marca']); ?></td>
                    <td><?php echo htmlspecialchars($row['descricao']); ?></td>
                    <td>R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($row['quantidade']); ?></td>
                </tr>
            <?php } ?>
        </table>

        <a href="../HTML/Produto.HTML" id="voltar">VOLTAR</a>
    </div>
</body>
</html>
