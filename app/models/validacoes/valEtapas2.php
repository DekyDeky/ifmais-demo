<?php

    if(empty(trim($_SESSION["dados"]["emailUsuario"]))) $erros['emailUsuario'] = "obrigatorio";
    if(empty(trim($_SESSION["dados"]["senhaUsuario"]))) $erros['senhaUsuario'] = "obrigatorio"; 
    if(empty(trim($_SESSION["dados"]["confirmarSenhaUsuario"]))) $erros['confirmarSenhaUsuario'] = "obrigatorio"; 
    if(empty(trim($_SESSION["dados"]["telefoneUsuario"]))) $erros['telefoneUsuario'] = "obrigatorio"; 
    
    if(trim($_SESSION["dados"]["senhaUsuario"]) != trim($_SESSION["dados"]["confirmarSenhaUsuario"])) {

        $erros["senhaUsuario"] = 'senha';
        $erros["confirmarSenhaUsuario"] = 'senha';

    }

    if (isset($_FILES['fotoUsuario']) && $_FILES['fotoUsuario']['error'] === UPLOAD_ERR_OK) {
        $_SESSION['dados']['fotoUsuario_nome'] = $_FILES['fotoUsuario']['name'];

        $diretorioSalvar = "../../storage/usuarios/" . basename($_SESSION['dados']['fotoUsuario_nome'] );
        move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $diretorioSalvar);
    }
                        
?>