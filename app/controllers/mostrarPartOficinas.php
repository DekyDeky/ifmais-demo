<?php

    $idUsuarioAtual = $_SESSION['idUsuario'];

    $cpfUsuarioAtual = $_SESSION['cpfPessoa'];

    $oficinasUserSQL = "SELECT * FROM oficina, professores_oficina 
                        WHERE cpfProfessor = '$cpfUsuarioAtual' 
                        AND oficina.idOficina = professores_oficina.idOficina";

    include 'app/models/oficinas/pegarUserOficinas.php';

    include 'app/views/oficinas/mostrarTodasOficinas.php';

    echo "</div>
            </div>";

?>