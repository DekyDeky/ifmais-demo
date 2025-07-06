<?php

    include 'config/database.php';

    $avisoSelect = "SELECT * FROM aviso";

    $todosAvisos = mysqli_query($conn, $avisoSelect);
    
    while($aviso = mysqli_fetch_array($todosAvisos)){
        echo "
        
            <div class='aviso p-3 rounded-4'>
                <h4 class='text-center text-danger'>{$aviso['tituloAviso']}</h4>
                <pre style='white-space:pre-wrap;'>{$aviso['descricaoAviso']}</pre>
            </div>
        
        ";
    }
?>