<?php

    $camposObrg = ['tituloOficina', 'sobreOficina', 'dataOficina', 'horaOficina'];

    foreach($camposObrg as $c){
        if(empty(trim($dadosOficina[$c]))){
            $errosOficina[$c] = "obrigatorio";
        }
    }

    if(!empty($errosOficina)){
        $_SESSION['errosOficina'] = [];
        $_SESSION['errosOficina'] = $errosOficina;
    }

?>