<?php include "../views/general/libs.php";?>
</head>
<body>
    <?php
    
        //Inicia com a requesição POST
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Seta todos os nomes de usuário para '';
            $nomeUsuario = $dataNasc = $cpfUsuario = $emailUsuario = $senhaUsuario 
            = $telefoneUsuario = $fotoUsuario = $sobreUsuario = $cep = $estado 
            = $cidade = $bairro = $rua = $numeroCasa = ''; 

            //Pega todos os valores, previamente válidados

            if(empty($_POST["nomeSocialUsuario"])){
                $nomeUsuario = $_POST["nomeUsuario"];
            } else {
                $nomeUsuario = $_POST["nomeSocialUsuario"];
            }
            
            $dataNasc = $_POST["dataNascUsuario"];
            $cpfUsuario = preg_replace('/\D/', '', $_POST["cpfUsuario"]);
            $emailUsuario = $_POST["emailUsuario"];
            $senhaUsuario = password_hash($_POST["senhaUsuario"], PASSWORD_DEFAULT);
            $telefoneUsuario = preg_replace('/\D/', '', $_POST["telefoneUsuario"]);
            
            $diretorioImg = "../../storage/usuarios/";
            $fotoUsuario = $diretorioImg . basename($_FILES["fotoUsuario"]["name"]);

            //Da upload da imagem do usuário para o app
            if(!move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $fotoUsuario)){
                echo "<div class='alert alert-warning text-center'>
                        Erro ao tentar mover a <strong>FOTO</strong> para o diretório $diretorioImg!
                    </div>";
                $erroUpload = true;
            }

            $sobreUsuario = $_POST["sobreUsuario"];

            $cep = preg_replace('/\D/', '', $_POST["cepUsuario"]);
            $estado = $_POST["estadoUsuario"];
            $cidade = $_POST["cidadeUsuario"];
            $bairro = $_POST["bairroUsuario"];
            $rua = $_POST["ruaUsuario"];
            $numeroCasa = $_POST["numeroUsuario"];

            //Inicia as inserções no banco de dados
            include "../../config/database.php";

            //Insere na tabela pessoa
            $inserirPessoa = "INSERT INTO pessoa (cpfPessoa, nomePessoa, dataNasc, tipoUsuario) VALUES ('$cpfUsuario', '$nomeUsuario', '$dataNasc', 'Professor')";

            if(mysqli_query($conn, $inserirPessoa)){
                echo "<div class='alert alert-success text-center'>Pessoa cadastrada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Pessoa!</div>";
            }

            //Insere na tabela endereço

            $checarCEP = "SELECT cep FROM endereco WHERE cep = '$cep'";
            $resultado = mysqli_num_rows(mysqli_query($conn, $checarCEP));

            if($resultado > 0){
                //Insere na tabela endereço_pessoa
                $inserirPessoaEndereco = "INSERT INTO endereco_pessoa (cepEndereco, cpfPessoa, numero) VALUES ('$cep', '$cpfUsuario', '$numeroCasa')";

                if(mysqli_query($conn, $inserirPessoaEndereco)){
                    echo "<div class='alert alert-success text-center'>Ligação de Endereço e Pessoa cadastrada com sucesso!</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Ligação!</div>";
                }
            } else {
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
            }

            //Insere na tabela usuario
            $inserirUsuario = "INSERT INTO usuario (emailUsuario, senhaHash, telefone, fotoUsuario, sobreUsuario, cpfPessoa) VALUES ('$emailUsuario', '$senhaUsuario', '$telefoneUsuario', '$fotoUsuario', '$sobreUsuario', '$cpfUsuario')";

            if(mysqli_query($conn, $inserirUsuario)){
                echo "<div class='alert alert-success text-center'>Usuario cadastrado com sucesso!</div>";            
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Usuário!</div>";
            }


            //Insere na tabela titulações
            if (
                isset($_POST['tipo'], $_POST['titulo'], $_POST['instituicao'], $_POST['anoInicio'], $_POST['anoConclusao'])
            ) {
                $tipos = $_POST['tipo'];
                $titulos = $_POST['titulo'];
                $instituicoes = $_POST['instituicao'];
                $anosInicio = $_POST['anoInicio'];
                $anosConclusao = $_POST['anoConclusao'];

                $quantidade = count($tipos);

                for ($i = 0; $i < $quantidade; $i++) {
                    $tipo = mysqli_real_escape_string($conn, $tipos[$i]);
                    $titulo = mysqli_real_escape_string($conn, $titulos[$i]);
                    $instituicao = mysqli_real_escape_string($conn, $instituicoes[$i]);
                    $anoInicio = mysqli_real_escape_string($conn, $anosInicio[$i]);
                    $anoConclusao = mysqli_real_escape_string($conn, $anosConclusao[$i]);

                    $inserirTitulacao = "INSERT INTO titulacao (tipoTitulacao, nomeTitulacao, instituicao, anoInicio, anoFim) VALUES ('$tipo', '$titulo', '$instituicao', '$anoInicio', '$anoConclusao')";

                    if (!mysqli_query($conn, $inserirTitulacao)) {
                        echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Titulações!</div>";
                    }

                    $idTitulacao = mysqli_insert_id($conn);

                    $inserirTitulacaoUsuario = "INSERT INTO titulacao_pessoa(idTitulacao, cpfPessoa) VALUES ($idTitulacao, $cpfUsuario)";

                    if(!mysqli_query($conn, $inserirTitulacaoUsuario)){
                        echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Ligação!</div>";
                    }
                }

                echo "<div class='alert alert-success text-center'>Titulações cadastradas com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Titulações!</div>";
            }

                        
            
        }

    mysqli_close($conn);
    
    ?>
</body>
