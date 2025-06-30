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
            $senhaUsuario = $_POST["senhaUsuario"];
            $telefoneUsuario = $_POST["telefoneUsuario"];
            
            $diretorioImg = "../../storage/";
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
            
        }
    
    ?>
</body>
