<?php

    include '../../config/database.php';

    $falhaEnvio = false;

    $tituloOficina = $sobreOficina = $dataOficina = $horaOficina = '';

    $tituloOficina = mysqli_real_escape_string($conn, $_POST['tituloOficina']);
    $sobreOficina = mysqli_real_escape_string($conn, $_POST['sobreOficina']);
    $dataOficina = $_POST['dataOficina'];
    $horaOficina = $_POST['horaOficina'];
    $idOficina = $_POST['idOficina'];


    $idUsuarioAtual = $_SESSION['idUsuario'];

    $diretorio = $_POST['fotoOriginalOficina'];

    $removeValoresAntigos = "DELETE FROM professores_oficina WHERE idOficina = '$idOficina'";

    if(!mysqli_query($conn, $removeValoresAntigos)) {
        echo 'erro ao deletar valores antigos';
        $falhaEnvio = true;
    }

    if($_FILES['fotoOficina']['size'] != 0) {
        $diretorioSalvar = "../../storage/oficinas/" . basename($_FILES['fotoOficina']['name']);
        $diretorio = "storage/oficinas/" . basename($_FILES['fotoOficina']['name']);

        if(!move_uploaded_file($_FILES['fotoOficina']['tmp_name'], $diretorioSalvar)){
            echo "Falha ao salvar a imagem.";
            $falhaEnvio = true;
        }
    }

    $oficinaSQL = "UPDATE oficina SET tituloOficina = '$tituloOficina', descricaoOficina = '$sobreOficina', dataOficina = '$dataOficina', horaOficina = '$horaOficina', fotoOficina = '$diretorio' WHERE idOficina = $idOficina";

    if(mysqli_query($conn, $oficinaSQL)){
        echo "Oficina atualizada com sucesso";
    }else {
        echo "Oficina não foi adicionada";
        $falhaEnvio = true;
    }

    if(isset($_POST['cpfProfs'])){

        $cpfProfs = $_POST['cpfProfs'];

        $quantidadeCpfs = count($cpfProfs);

        echo "$idOficina";

        for($i = 0; $i < $quantidadeCpfs; $i++){
            $cpf = mysqli_real_escape_string($conn, $cpfProfs[$i]);

            $inserirProfOficina = "INSERT INTO professores_oficina(idOficina, cpfProfessor) VALUES ('$idOficina', '$cpf')";

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
        header("location: ../../oficinas.php?formOficina=atualizado");
    }

?>