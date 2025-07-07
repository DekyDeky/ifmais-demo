<?php include "app/views/general/libs.php"?>
    <title>Registrar - IFMais</title>
    <link rel="stylesheet" href="css/loginCadastro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <?php session_start(); ?>


    <script>
        $(document).ready(function(){
            $("#cpfUsuario").mask("000.000.000-00");
            
            $('#telefoneUsuario').mask('(00) 0000-00009', {
                onKeyPress: function (val, e, field, options) {
                    const mask = val.replace(/\D/g, '').length === 11
                        ? '(00) 00000-0000'
                        : '(00) 0000-00009';
                    $('#telefoneUsuario').mask(mask, options);
                }
            });

            $("#cepUsuario").mask("00000-000");
        });
    </script>

    <main class="loginCadastro">
        <img src="assets/logo.svg" alt="">
        <h1>Registrar</h1>
        <h2 id="cadastro-status">Cadastro de Usuário</h2>

        <?php
        
            
            if(empty($_SESSION["etapaAtual"])){
                include "app/views/cadastrar/etapa1.php";
            } else {
                switch($_SESSION["etapaAtual"]){
                    case 1:
                        include "app/views/cadastrar/etapa1.php";
                        break;
                    case 2:
                        include "app/views/cadastrar/etapa2.php";
                        
                        break;
                    case 3:
                        include "app/views/cadastrar/etapa4.php";
                        break;
                    case 4:
                        include "app/views/cadastrar/etapa3.php";
                        
                }
            }



        
        ?>
        <a href="index.php" class="loginCadastroRegistrar">Já possuo uma conta!</a>
    </main>

    <?php
    
        if(!empty($_SESSION["etapaAtual"])){
            switch($_SESSION["etapaAtual"]){
                case 4:
                    echo "<script src='js/adicionarTitulacao.js' method='module'></script>";
                    break;
                case 3:
                    echo "<script src='js/pegarEndereco.js' method='module'></script>";
                    break;
            }
        }
            
    
    ?>

    <script>

        <?php
            //Planejei colocar mensagens para cada tipo de erro, mas não descobri como fazer isso
            if (!empty($_SESSION['erros'])) {
                foreach ($_SESSION['erros'] as $campo => $problema) {

                    echo 'console.log("' . addslashes($campo) . ' => ' . addslashes($problema) . '");';

                    switch ($problema) {
                        case 'obrigatorio':
                            echo 'document.getElementById("' . addslashes($campo) . '").classList.add("is-invalid");';
                            break;

                        case 'letras':
                            echo 'document.getElementById("' . addslashes($campo) . '").classList.add("is-invalid");';
                            break;
                        
                        case 'senha':
                            echo 'document.getElementById("' . addslashes($campo) . '").classList.add("is-invalid");';
                            break;
                    }


                }

                unset($_SESSION['erros']);
            }   
        
        ?>

    </script>
</body>