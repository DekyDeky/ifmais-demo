<?php

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $campos = ['tituloAviso', 'textoAviso', 'validadeAviso'];
        include '../models/avisos/validacoesAvisos.php';

        if(isset($_SESSION['errosAviso'])){
            $_SESSION['errosAvisoTipo'] = "addAviso";
            header('location: ../../home.php');
        }

        $_SESSION['dadosAviso'] = $_POST;

        include '../models/avisos/adicionarAviso.php';
    }

?>