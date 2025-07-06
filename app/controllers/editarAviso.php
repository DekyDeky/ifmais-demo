<?php

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $campos = ['editarTituloAviso', 'editarTextoAviso', 'editarValidadeAviso'];
        include '../models/avisos/validacoesAvisos.php';

        if(isset($_SESSION['errosAviso'])){
            $_SESSION['errosAvisoTipo'] = "editAviso";
            header('location: ../../home.php');
        }else {
            echo "sem erros";
        }

        $_SESSION['dadosAviso'] = $_POST;

        include '../models/avisos/atualizarAviso.php';


    }

?>