<?php

    $camposObrg = ['tituloOficina', 'sobreOficina', 'dataOficina', 'horaOficina'];

    foreach($camposObrg as $c){
        if(empty(trim($dadosOficina[$c]))){
            $errosOficina[$c] = "obrigatorio";
        }
    }

?>