<?php

    if (!empty(trim($_SESSION['dados']['nomeSocialUsuario']))){
        if(!preg_match('/^[\p{L} ]+$/u', $_SESSION['dados']['nomeSocialUsuario'])) $erros['nomeSocialUsuario'] = "letras";
    } else {
        if(empty(trim($_SESSION['dados']['nomeUsuario']))) $erros['nomeUsuario'] = "obrigatorio";
        else if(!preg_match('/^[\p{L} ]+$/u', trim($_SESSION['dados']['nomeUsuario']))) $erros['nomeUsuario'] = "letras"; 
    } 

    if(empty(trim($_SESSION["dados"]["dataNascUsuario"]))) $erros['dataNascUsuario'] = "obrigatorio";

    if(empty(trim($_SESSION["dados"]["cpfUsuario"]))) $erros['cpfUsuario'] = "obrigatorio"; 
    
?>