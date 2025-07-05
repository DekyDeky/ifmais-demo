<?php

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $etapa = $_SESSION['etapaAtual'] ?? 1;

        if(isset($_POST["anterior"])) {
            $_SESSION['etapaAtual'] = $etapa - 1;
            header('location: ../../registrar.php');
            exit;
        }

        if(isset($_POST["proximo"])){
            
            $_SESSION['dados'] = array_merge($_SESSION['dados'] ?? [], $_POST);
            
            $erros = [];
            
            switch($etapa){
                case 1:
                    
                    include '../models/validacoes/valEtapas1.php';
                    
                    if(empty($erros)) $_SESSION['etapaAtual'] = 2;
                    
                    break;
                    
                case 2:
                    include '../models/validacoes/valEtapas2.php';

                    if(empty($erros)) $_SESSION['etapaAtual'] = 3;
                        
                    break;
                case 3:

                    include '../models/validacoes/valEtapas4.php';

                    if(empty($erros)) $_SESSION['etapaAtual'] = 4;

                    break;

                case 4:

                    include '../views/etapa2.php';
                    include '../models/adicionarUser.php';
                    exit;
                    
                }
                    
                if(!empty($erros)){
                        $_SESSION['erros'] = $erros;
                } 
                    
                header('location: ../../registrar.php');
                exit;
        }

    }


?>