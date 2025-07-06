<?php

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        include '../models/validacoesAvisos.php';

        $_SESSION['dadosAviso'] = $_POST;

        include '../models/adicionarAviso.php';

    }

?>