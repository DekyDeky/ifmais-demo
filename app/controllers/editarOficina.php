<?php

    session_Start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $errosOficina = [];

        $idOficinaAtual = $_POST['idOficina'];

        $dadosOficina = $_POST;
        
        include '../models/oficinas/validacaoOficina.php';

        $fotoOficina = "storage/oficinas/" . basename($_FILES['fotoOficina']['name']);
        $tipoDaImagem = strtolower(pathinfo($_FILES['fotoOficina']['name'], PATHINFO_EXTENSION));

        echo "$tipoDaImagem";

        if ($_FILES['fotoOficina']['size'] != 0){
            if($_FILES['fotoOficina']['size'] > 5000000){
                $errosOficina['fotoOficina'] = 'imgPesada';
            } else if ($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp") {
                $errosOficina['fotoOficina'] = 'imgInvalida';
            }
        }

        if(!empty($errosOficina)){
            $_SESSION['errosOficina'] = [];
            $_SESSION['errosOficina'] = $errosOficina;
        }
    

        if(isset($_SESSION['errosOficina'])){
            $_SESSION['dadosOficina'] = $dadosOficina;
            header('location: ../../editarOficina.php?idOficina='.$idOficinaAtual);
            exit;
        }

        include '../models/oficinas/atualizarOficina.php';
    }

?>