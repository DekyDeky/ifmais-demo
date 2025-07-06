<?php

    include 'config/database.php';

    $professoresSQL = "SELECT * FROM pessoa ORDER BY nomePessoa ASC";

    $checarProfs = mysqli_query($conn, $professoresSQL);

    while($professores = mysqli_fetch_assoc($checarProfs)){
        echo "<option value='{$professores['cpfPessoa']}'>{$professores['nomePessoa']}</option>";
    }


?>