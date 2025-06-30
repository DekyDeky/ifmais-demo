<?php 

    $host       = "localhost";
    $user       = "root";
    $senhaBD    = "root";
    $database   = "ifdemo";

    $conn = mysqli_connect($host, $user, $senhaBD, $database);

    if(!$conn){
        echo "<p>Erro ao tentar conectar à Base de Dados <strong>$database</strong>!</p>";
    }

?>
