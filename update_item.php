<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require("conecta.php");

        $id_item = $_POST['id_item'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];

        $sql = "UPDATE itens_estoque SET nome = '$nome', quantidade = '$quantidade', categoria = '$categoria', descricao = '$descricao' WHERE id_item = $id_item";

        if ($conn->query($sql) === TRUE) {
            header("Location: visualiza_itens_estoque.php");
            exit();
        } else {
            echo "<h3>Ocorreu um erro ao atualizar o item:</h3> " . $conn->error;
        }

        $conn->close();
    } else {
        header("Location: index.html");
        exit();
    }
?>
