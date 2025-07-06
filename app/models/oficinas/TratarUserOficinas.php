<?php

    $tituloUserOficina = htmlspecialchars($oficinasUser['tituloOficina'], ENT_QUOTES, 'UTF-8');
    $sobreUserOficina = htmlspecialchars($oficinasUser['descricaoOficina'], ENT_QUOTES, 'UTF-8');
    $dataUserOficina = "";

    if(strlen($oficinasUser['dataOficina']) == 10){
        $dia = substr($oficinasUser['dataOficina'], 8, 2);
        $mes = substr($oficinasUser['dataOficina'], 5, 2);
        $ano = substr($oficinasUser['dataOficina'], 0, 4);

        $dataUserOficina = $dia . "/" . $mes ."/". $ano;
    } else {
        $dataUserOficina = $oficinasUser['dataOficina'];
    }

    $horarioUserOficina = $oficinasUser['horaOficina'];

    $fotoUserOficina = $oficinasUser['fotoOficina'];

    $idOficinaAtual = $oficinasUser['idOficina'];

    include 'app/models/oficinas/listarProfessoresOficinas.php';


?>