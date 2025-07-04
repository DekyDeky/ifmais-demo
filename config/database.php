<?php 

    $host       = "localhost";
    $user       = "root";
    $senhaBD    = "";
    $database   = "demo";
    $porta      = 3306;

    $conn = mysqli_connect($host, $user, $senhaBD, $database, $porta);

    if(!$conn){
        echo "<p>Erro ao tentar conectar à Base de Dados <strong>$database</strong>!</p>";
    }

?>
