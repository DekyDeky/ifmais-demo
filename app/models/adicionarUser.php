<?php include "../views/general/libs.php";?>
</head>
<body>
    <?php
    
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nomeUsuario = $dataNasc = $cpfUsuario = $emailUsuario = $senhaUsuario 
            = $telefoneUsuario = $fotoUsuario = $sobreUsuario = $cep = $estado 
            = $cidade = $bairro = $rua = $numeroCasa = '';
            $erroPreenchimento = false;

            $nomeUsuario = $_POST["nomeUsuario"];
            $dataNasc = $_POST["dataNascUsuario"];
            $cpfUsuario = $_POST["cpfUsuario"];
            $emailUsuario = $_POST["emailUsuario"];
            $senhaUsuario = password_hash($_POST["senhaUsuario"], PASSWORD_DEFAULT);
            $telefoneUsuario = $_POST["telefoneUsuario"];
            
            $diretorioImg = "storage/usuarios/";
            $fotoUsuario = $diretorioImg . basename($_FILES["fotoUsuario"]["name"]);
            $erroUpload = false;
            $tipoDaImagem = strtolower(pathinfo($fotoUsuario, PATHINFO_EXTENSION));

            $sobreUsuario = $_POST["sobreUsuario"];

            $cep = $_POST["cepUsuario"];
            $estado = $_POST["estadoUsuario"];
            $cidade = $_POST["cidadeUsuario"];
            $bairro = $_POST["bairroUsuario"];
            $rua = $_POST["ruaUsuario"];
            $numeroCasa = $_POST["numeroUsuario"];

            include "../../config/database.php";

            $inserirPessoa = "INSERT INTO pessoa (cpfPessoa, nomePessoa, dataNasc, tipoUsuario) VALUES ('$cpfUsuario', '$nomeUsuario', '$dataNasc', 'Professor')";

            if(mysqli_query($conn, $inserirPessoa)){
                echo "<div class='alert alert-success text-center'>Pessoa cadastrada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Pessoa!</div>";
            }

            $inserirEndereco = "INSERT INTO endereco (cep, estado, cidade, bairro, rua) VALUES ('$cep', '$estado', '$cidade', '$bairro', '$rua')";

            if(mysqli_query($conn, $inserirEndereco)) {
                echo "<div class='alert alert-success text-center'>Endereço cadastrada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Endereço!</div>";
            }

            $inserirPessoaEndereco = "INSERT INTO endereco_pessoa (cepEndereco, cpfPessoa, numero) VALUES ('$cep', '$cpfUsuario', '$numeroCasa')";

            if(mysqli_query($conn, $inserirPessoaEndereco)){
                echo "<div class='alert alert-success text-center'>Ligação de Endereço e Pessoa cadastrada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Ligação!</div>";
            }

            $inserirUsuario = "INSERT INTO usuario (emailUsuario, senhaHash, telefone, fotoUsuario, sobreUsuario, cpfUsuario) VALUES ('$emailUsuario', '$senhaUsuario', '$telefoneUsuario', '$fotoUsuario', '$sobreUsuario', '$cpfUsuario')";

            if(mysqli_query($conn, $inserirUsuario)){
                echo "<div class='alert alert-success text-center'>Usuario cadastrado com sucesso!</div>";                
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Usuário!</div>";
            }

            

            
            
        }
    
    ?>
</body>
