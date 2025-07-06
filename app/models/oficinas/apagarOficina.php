<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $idOficinaDeletar = $_POST['idOficina'] ;

        $falhaDelete = false;

        $deletarOficinaSQL = "DELETE FROM oficina WHERE idOficina = $idOficinaDeletar";
        $deletarOficinaLigSQL = "DELETE FROM professores_oficina WHERE idOficina = $idOficinaDeletar";
        
        include '../../../config/database.php';

        if(!mysqli_query($conn, $deletarOficinaLigSQL)){
            echo 'Falha ao deletar ligação';
            $falhaDelete = true;
        }

        if(!mysqli_query($conn, $deletarOficinaSQL)){
            echo 'Falha ao deletar dados';
            $falhaDelete = true;
        }

        if(!$falhaDelete){
            header('location: ../../../oficinas.php');
        }
    }

?>