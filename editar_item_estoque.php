<?php
if (isset($_GET['id'])) {
    $id_item = $_GET['id'];

    require("conecta.php");

    $sql = "SELECT * FROM itens_estoque WHERE id_item = $id_item";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $quantidade = $row['quantidade'];
        $categoria = $row['categoria'];
        $descricao = $row['descricao'];
    } else {
        echo "Item não encontrado.";
        exit();
    }

    $conn->close();
} else {
    echo "ID do item não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item de Estoque</title>
    <link rel="stylesheet" href="editar_item_estoque.css">
</head>

<body>
    <div class="container">
        <h1 id="titulo">Editar Item de Estoque</h1>

        <form method="POST" action="update_item.php">
            <input type="hidden" name="id_item" value="<?php echo $id_item; ?>">

            <div class="campo">
                <label for="nome"><strong>Nome do Item</strong></label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" required>
            </div>

            <div class="campo">
                <label for="quantidade"><strong>Quantidade</strong></label>
                <input type="number" name="quantidade" id="quantidade" value="<?php echo $quantidade; ?>" required>
            </div>

            <div class="campo">
                <label for="categoria"><strong>Categoria</strong></label>
                <select id="categoria" name="categoria" required>
                    <option value="Eletrônicos" <?php if ($categoria == "Eletrônicos") echo "selected"; ?>>Eletrônicos</option>
                    <option value="Vestuário" <?php if ($categoria == "Vestuário") echo "selected"; ?>>Vestuário</option>
                    <option value="Alimentos" <?php if ($categoria == "Alimentos") echo "selected"; ?>>Alimentos</option>
                    <option value="Livros" <?php if ($categoria == "Livros") echo "selected"; ?>>Livros</option>
                    <option value="Outros" <?php if ($categoria == "Outros") echo "selected"; ?>>Outros</option>
                </select>
            </div>

            <div class="campo">
                <label for="descricao"><strong>Descrição</strong></label>
                <textarea rows="4" id="descricao" name="descricao" required><?php echo $descricao; ?></textarea>
            </div>

            <button class="botao" type="submit">Atualizar Item</button>
        </form>
    </div>
</body>

</html>
