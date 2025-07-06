<?php

    $idUsuarioAtual = $_SESSION['idUsuario'];

    $oficinasUserSQL = "SELECT * FROM oficina";

    include 'app/models/oficinas/pegarUserOficinas.php';

    include 'app/views/oficinas/mostrarTodasOficinas.php';
?>