<?php

    include '../../config/database.php';

    $falhaEnvio = false;

    $tituloAviso = $textoAviso = $validadeAviso = $idUsuarioAtual = "";

    $tituloAviso = mysqli_real_escape_string($conn, $_SESSION['dadosAviso']['tituloAviso']);
    $textoAviso = mysqli_real_escape_string($conn, $_SESSION['dadosAviso']['textoAviso']);
    $validadeAviso = $_SESSION['dadosAviso']['validadeAviso'];

    $idUsuarioAtual = $_SESSION['idUsuario'];

    $avisoSQL = "INSERT INTO aviso (tituloAviso, descricaoAviso, validadeAviso, criadorAviso) VALUES ('$tituloAviso', '$textoAviso', '$validadeAviso', '$idUsuarioAtual')";

    if(mysqli_query($conn, $avisoSQL)){
        echo "<div class='alert alert-success text-center'>Aviso cadastrado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Aviso!</div>";
        $falhaEnvio = true;
    }

    mysqli_close($conn);

    if(!$falhaEnvio){
        unset($_SESSION['errosAviso']);
        unset($_SESSION['dadosAviso']);
        header('location: ../../home.php?formAviso=concluido');
    }




?>