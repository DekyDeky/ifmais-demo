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

            $falhaEnvio = false;

            //Inicia as inserções no banco de dados
            include "../../config/database.php";

            //Pega todos os valores, previamente válidados

            if(empty($_SESSION['dados']["nomeSocialUsuario"])){
                $nomeUsuario = mysqli_real_escape_string($conn, $_SESSION['dados']['nomeUsuario']);
            } else {
                $nomeUsuario = mysqli_real_escape_string($conn, $_SESSION['dados']["nomeSocialUsuario"]);
            }
            
            $dataNasc = $_SESSION['dados']["dataNascUsuario"];
            $cpfUsuario = preg_replace('/\D/', '', $_SESSION['dados']["cpfUsuario"]);
            $emailUsuario = $_SESSION['dados']["emailUsuario"];
            $senhaUsuario = password_hash($_SESSION['dados']["senhaUsuario"], PASSWORD_DEFAULT);
            $telefoneUsuario = preg_replace('/\D/', '', $_SESSION['dados']["telefoneUsuario"]);
            
            $diretorioImg = "storage/usuarios/";
            $fotoUsuario = $diretorioImg . basename($_SESSION['dados']['fotoUsuario_nome'] );
//Da upload da imagem do usuário para o app


            $sobreUsuario = mysqli_real_escape_string($conn, $_SESSION['dados']["sobreUsuario"]);

            $cep = preg_replace('/\D/', '', $_SESSION['dados']["cepUsuario"]);
            $estado = mysqli_real_escape_string($conn, $_SESSION['dados']["estadoUsuario"]);
            $cidade = mysqli_real_escape_string($conn, $_SESSION['dados']["cidadeUsuario"]);
            $bairro = mysqli_real_escape_string($conn, $_SESSION['dados']["bairroUsuario"]);
            $rua = mysqli_real_escape_string($conn, $_SESSION['dados']["ruaUsuario"]);
            $numeroCasa = mysqli_real_escape_string($conn, $_SESSION['dados']["numeroUsuario"]);

            //Insere na tabela pessoa
            $inserirPessoa = "INSERT INTO pessoa (cpfPessoa, nomePessoa, dataNasc) VALUES ('$cpfUsuario', '$nomeUsuario', '$dataNasc')";

            if(mysqli_query($conn, $inserirPessoa)){
                echo "<div class='alert alert-success text-center'>Pessoa cadastrada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Pessoa!</div>";
                $falhaEnvio = true;
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
                    $falhaEnvio = true;
                }
            } else {
                $inserirEndereco = "INSERT INTO endereco (cep, estado, cidade, bairro, rua) VALUES ('$cep', '$estado', '$cidade', '$bairro', '$rua')";

                if(mysqli_query($conn, $inserirEndereco)) {
                    echo "<div class='alert alert-success text-center'>Endereço cadastrada com sucesso!</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Endereço!</div>";
                    $falhaEnvio = true;
                }
                
                $inserirPessoaEndereco = "INSERT INTO endereco_pessoa (cepEndereco, cpfPessoa, numero) VALUES ('$cep', '$cpfUsuario', '$numeroCasa')";

                if(mysqli_query($conn, $inserirPessoaEndereco)){
                    echo "<div class='alert alert-success text-center'>Ligação de Endereço e Pessoa cadastrada com sucesso!</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Ligação!</div>";
                    $falhaEnvio = true;
                }
            }

            //Insere na tabela usuario
            $inserirUsuario = "INSERT INTO usuario (emailUsuario, senhaHash, telefone, fotoUsuario, sobreUsuario, cpfPessoa) VALUES ('$emailUsuario', '$senhaUsuario', '$telefoneUsuario', '$fotoUsuario', '$sobreUsuario', '$cpfUsuario')";

            if(mysqli_query($conn, $inserirUsuario)){
                echo "<div class='alert alert-success text-center'>Usuario cadastrado com sucesso!</div>";            
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Usuário!</div>";
                $falhaEnvio = true;
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
                        $falhaEnvio = true;
                    }

                    $idTitulacao = mysqli_insert_id($conn);

                    $inserirTitulacaoUsuario = "INSERT INTO titulacao_pessoa(idTitulacao, cpfPessoa) VALUES ($idTitulacao, $cpfUsuario)";

                    if(!mysqli_query($conn, $inserirTitulacaoUsuario)){
                        echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Ligação!</div>";
                        $falhaEnvio = true;
                    }
                }

                echo "<div class='alert alert-success text-center'>Titulações cadastradas com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Falha ao cadastrar Titulações!</div>";
                $falhaEnvio = true;
            }

                        
            
        }

    mysqli_close($conn);

    if(!$falhaEnvio){
        header('Location: ../../index.php?registro=concluido');
        session_destroy();
    }
    
    
    ?>
</body>
