<?php
    $servername = "127.0.0.1";  
    $database = "projetoestoque";  
    $username = "root";  
    $password = "";  

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }
?>
