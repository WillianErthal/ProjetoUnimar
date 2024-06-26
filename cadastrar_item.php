<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require("conecta.php");

        $nome_item = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];

        $sql_verifica = "SELECT nome FROM itens_estoque WHERE LOWER(nome) = LOWER('$nome_item')";
        $result_verifica = $conn->query($sql_verifica);

        if ($result_verifica->num_rows > 0) {
            echo "<center><h1> item '$nome_item' já está cadastrado.</h1>";
            echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
        } else {
            $sql = "INSERT INTO itens_estoque (nome, quantidade, categoria, descricao)
                    VALUES ('$nome_item', '$quantidade', '$categoria', '$descricao')";

            if ($conn->query($sql) === TRUE) {
                echo "<center><h1>Item Inserido com Sucesso</h1>";
                echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
            } else {
                echo "<h3>Ocorreu um erro ao inserir o item:</h3> " . $conn->error;
            }
        }

        $conn->close();
    } else {
        header("Location: index.html");
        exit();
    }
?>
