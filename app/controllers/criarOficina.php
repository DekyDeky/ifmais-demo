<?php

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $errosOficina = [];

        $dadosOficina = $_POST;
        
        include '../models/oficinas/validacaoOficina.php';

        if(isset($_SESSION['errosOficina'])){
            $_SESSION['dadosOficina'] = $dadosOficina;
            header('location: ../../criarOficina.php');
            exit;
        }

        include '../models/oficinas/adicionarOficina.php';
    }

?>