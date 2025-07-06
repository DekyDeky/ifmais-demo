<?php

    include 'config/database.php';

    $checarUserOficinas = mysqli_query($conn,$oficinasUserSQL);

    if(!$checarUserOficinas) echo "falha pesquisar pelas oficinas!";


?>