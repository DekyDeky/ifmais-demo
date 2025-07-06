<?php

    include '../../config/database.php';

    $falhaEnvio = false;

    $tituloAviso = $textoAviso = $validadeAviso = $idUsuarioAtual = "";

    $tituloAviso = mysqli_real_escape_string($conn, $_SESSION['dadosAviso']['editarTituloAviso']);
    $textoAviso = mysqli_real_escape_string($conn, $_SESSION['dadosAviso']['editarTextoAviso']);
    $validadeAviso = $_SESSION['dadosAviso']['editarValidadeAviso'];
    $idAviso = $_SESSION['dadosAviso']['editarIdAviso'];

    $idUsuarioAtual = $_SESSION['idUsuario'];

    $editarAvisoSQL = "UPDATE aviso SET tituloAviso = '$tituloAviso', descricaoAviso = '$textoAviso', validadeAviso='$validadeAviso' WHERE idAviso = $idAviso";

    if(mysqli_query($conn, $editarAvisoSQL)){
        echo "<div class='alert alert-success text-center'>Aviso editado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Falha ao editar Aviso!</div>";
        $falhaEnvio = true;
    }

    mysqli_close($conn);

    if(!$falhaEnvio){
        unset($_SESSION['errosAviso']);
        unset($_SESSION['dadosAviso']);
        header('location: ../../home.php?formAviso=editou');
    }

?>