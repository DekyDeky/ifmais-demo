<?php

    include '../../config/database.php';

    $falhaEnvio = false;

    $tituloOficina = $sobreOficina = $dataOficina = $horaOficina = '';

    $tituloOficina = mysqli_real_escape_string($conn, $_POST['tituloOficina']);
    $sobreOficina = mysqli_real_escape_string($conn, $_POST['sobreOficina']);
    $dataOficina = $_POST['dataOficina'];
    $horaOficina = $_POST['horaOficina'];

    $idUsuarioAtual = $_SESSION['idUsuario'];

    $diretorioSalvar = "../../storage/oficinas/" . basename($_FILES['fotoOficina']['name']);
    $diretorio = "storage/oficinas/" . basename($_FILES['fotoOficina']['name']);

    $oficinaSQL = "INSERT INTO oficina (tituloOficina, descricaoOficina, dataOficina, horaOficina, criadorOficina, fotoOficina) VALUES ('$tituloOficina', '$sobreOficina', '$dataOficina', '$horaOficina', $idUsuarioAtual, '$diretorio')";

    if(mysqli_query($conn, $oficinaSQL)){
        echo "Oficina Adicionada com sucesso";
        $idOficina = mysqli_insert_id($conn);

        if(!move_uploaded_file($_FILES['fotoOficina']['tmp_name'], $diretorioSalvar)){
            echo "Falha ao salvar a imagem.";
            $falhaEnvio = true;
        }
        
    }else{
        echo "Oficina não foi adicionada";
        $falhaEnvio = true;
    }

    if(isset($_POST['cpfProfs'])){
        $cpfProfs = $_POST['cpfProfs'];

        $quantidadeCpfs = count($cpfProfs);

        for($i = 0; $i < $quantidadeCpfs; $i++){
            $cpf = mysqli_real_escape_string($conn, $cpfProfs[$i]);

            $inserirProfOficina = "INSERT INTO professores_oficina (idOficina, cpfProfessor) VALUES ('$idOficina', '$cpf')";

            if(mysqli_query($conn, $inserirProfOficina)){
                echo "Ligação adicionada com sucesso!";
            }else {
                echo "Ligação falhou!";
                $falhaEnvio = true;
            }
        }
    }

    mysqli_close($conn);

    if(!$falhaEnvio){
        header("location: ../../oficinas.php?formOficina=criado");
    }

?>