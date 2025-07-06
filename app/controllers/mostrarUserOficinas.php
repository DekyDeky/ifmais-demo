<?php

    $idUsuarioAtual = $_SESSION['idUsuario'];

    $oficinasUserSQL = "SELECT * FROM oficina WHERE criadorOficina = $idUsuarioAtual";

    include 'app/models/oficinas/pegarUserOficinas.php';

    include 'app/views/oficinas/mostrarUserOficinas.php';
?>