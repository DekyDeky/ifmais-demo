<?php

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $errosOficina = [];

        $dadosOficina = $_POST;
        
        include '../models/oficinas/validacaoOficina.php';

        $fotoOficina  = $_FILES['fotoOficina']['name'];
        $tipoDaImagem = strtolower(pathinfo($fotoOficina, PATHINFO_EXTENSION));

        if ($_FILES['fotoOficina']['size'] != 0){
            if($_FILES['fotoOficina']['size'] > 5000000){
                    $errosOficina['fotoOficina'] = 'imgPesada';
                } else if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                    $errosOficina['fotoOficina'] = $tipoDaImagem;
                }
        } else $errosOficina['fotoOficina'] = 'imgVazia';

        if(!empty($errosOficina)){
            $_SESSION['errosOficina'] = [];
            $_SESSION['errosOficina'] = $errosOficina;
        }    

        if(isset($_SESSION['errosOficina'])){
            $_SESSION['dadosOficina'] = $dadosOficina;
            header('location: ../../criarOficina.php?');
            exit;
        }

            include '../models/oficinas/adicionarOficina.php';
    }

?>