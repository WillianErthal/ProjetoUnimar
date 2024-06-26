<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Itens de Estoque</title>
    <link rel="stylesheet" href="visualiza_itens_estoque.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <center>
        <h1>Itens de Estoque Cadastrados</h1>

        <table border="1">
            <tr>
                <th>NOME DO ITEM</th>
                <th>QUANTIDADE</th>
                <th>CATEGORIA</th>
                <th>DESCRIÇÃO</th>
                <th>AÇÕES</th>
            </tr>
            <?php
            require("conecta.php");

            $dados_select = mysqli_query($conn, "SELECT * FROM itens_estoque");

            while ($dado = mysqli_fetch_array($dados_select)) {
                echo '<tr>';
                echo '<td>' . $dado['nome'] . '</td>';
                echo '<td>' . $dado['quantidade'] . '</td>';
                echo '<td>' . $dado['categoria'] . '</td>';
                echo '<td>' . $dado['descricao'] . '</td>';
                echo '<td>';
                echo '<a href="editar_item_estoque.php?id=' . $dado['id_item'] . '" class="btn btn-edit"><i class="fas fa-edit"></i>Editar</a>';
                echo '&nbsp;';
                echo '<a href="deleta_item.php?id=' . $dado['id_item'] . '" class="btn btn-delete"><i class="fas fa-trash-alt"></i>Excluir</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <br />
        <a href="index.html" class="btn btn-voltar"><i class="fas fa-arrow-left"></i>Voltar</a>
    </center>
</body>

</html>
