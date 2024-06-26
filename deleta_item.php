<?php
if (isset($_GET['id'])) {
    $id_item = $_GET['id'];

    require("conecta.php");

    $sql = "DELETE FROM itens_estoque WHERE id_item = $id_item";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Item deletado com sucesso!');</script>";
        echo "<script>window.location.href = 'visualiza_itens_estoque.php';</script>";
    } else {
        echo "Erro ao deletar o item: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do item não fornecido.";
}
?>
