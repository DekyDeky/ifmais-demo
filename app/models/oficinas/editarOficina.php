<?php

    if(isset($_GET['idOficina'])){

        $erroConsulta = false;
    
        $idOficinaAtualizar = $_GET['idOficina'];

        $oficinaAtualizarSQL = "SELECT * FROM oficina WHERE idOficina = $idOficinaAtualizar";
        $oficinaLigsAtualizarSQL = "SELECT * FROM professores_oficina WHERE idOficina = $idOficinaAtualizar";

        include 'config/database.php';

        $oficinaDados = mysqli_query($conn, $oficinaAtualizarSQL);

        if(!$oficinaDados){
            echo 'Erro na consulta :(';
            $erroConsulta = true;
        }

        $oficinaDado = mysqli_fetch_assoc($oficinaDados);

        $oficinaDadosLigacao = mysqli_query($conn, $oficinaLigsAtualizarSQL);

        $cpfsProfsAtual = [];
        
        while($linha = mysqli_fetch_assoc($oficinaDadosLigacao)) array_push($cpfsProfsAtual, $linha['cpfProfessor']);

    }

?>