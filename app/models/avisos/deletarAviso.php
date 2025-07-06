<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        include '../../../config/database.php'; 

        $idAvisoApg = $_POST["idAviso"];

        $avisoDelSQL = "DELETE FROM aviso WHERE idAviso = $idAvisoApg";

        if(mysqli_query($conn, $avisoDelSQL)){
            header("location: ../../../home.php?formAviso=deletado");
        }

    }

?>