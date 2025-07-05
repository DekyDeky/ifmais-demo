<?php

    if(empty(trim($_SESSION["dados"]["cepUsuario"]))) $erros['cepUsuario'] = "obrigatorio";
    if(empty(trim($_SESSION["dados"]["estadoUsuario"]))) $erros['estadoUsuario'] = "obrigatorio";
    if(empty(trim($_SESSION["dados"]["cidadeUsuario"]))) $erros['cidadeUsuario'] = "obrigatorio";
    if(empty(trim($_SESSION["dados"]["bairroUsuario"]))) $erros['bairroUsuario'] = "obrigatorio";
    if(empty(trim($_SESSION["dados"]["ruaUsuario"]))) $erros['ruaUsuario'] = "obrigatorio";
    if(empty(trim($_SESSION["dados"]["numeroUsuario"]))) $erros['numeroUsuario'] = "obrigatorio";

?>