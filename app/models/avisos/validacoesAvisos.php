<?php

    $errosAviso = [];

    foreach($campos as $c){
        if(empty(trim($_POST[$c]))){
            array_push($errosAviso, $c);
        }
    }

    if(!empty($errosAviso)){
        $_SESSION['errosAviso'] = [];
        $_SESSION['errosAviso'] = $errosAviso;
    }

?>