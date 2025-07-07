<?php 

    session_start();
    include '../../config/database.php';

    $emailUsuario = mysqli_real_escape_string($conn, $_POST['loginUsuario']);
    $senhaUsuario = $_POST['loginSenhaUsuario'];

    $userSQL = "SELECT * FROM usuario WHERE emailUsuario = '$emailUsuario'";

    $checarUser = mysqli_query($conn, $userSQL);

    if(mysqli_num_rows($checarUser) === 1){
        $usuarioDados = mysqli_fetch_assoc($checarUser);

        if(password_verify($senhaUsuario, $usuarioDados['senhaHash'])){
            $_SESSION['idUsuario'] = $usuarioDados['idUsuario'];
            $_SESSION['emailUsuario'] = $usuarioDados['emailUsuario'];
            $_SESSION['cpfPessoa'] = $usuarioDados['cpfPessoa'];

            if(empty($usuarioDados['fotoUsuario'])){
                $_SESSION['fotoUsuario'] = 'storage/default/user.png';
            }else {
                $_SESSION['fotoUsuario'] = $usuarioDados['fotoUsuario'];
            }


            $cpfUser = $_SESSION['cpfPessoa'];

            $pessoaSQL = "SELECT * FROM pessoa WHERE cpfPessoa = '$cpfUser'";
            $pessoaDados = mysqli_fetch_assoc(mysqli_query($conn, $pessoaSQL));

            $_SESSION['nomePessoa'] = $pessoaDados['nomePessoa'];

            header("Location: ../../home.php");
            exit;
        }else {
            header("Location: ../../index.php?pagina=loginUser&erroLogin=senhaIncorreta");
            exit;
        }
    } elseif (mysqli_num_rows($checarUser) === 0){
        header("Location: ../../index.php?pagina=loginUser&erroLogin=emailIncorreto");
        exit;
    } else {
        header("Location: ../../index.php?pagina=loginUser&erroLogin=falhaConsulta");
        exit;
    }

?>