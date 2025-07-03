<?php include "app/views/general/libs.php"?>
<title>login - IFMais</title>
<link rel="stylesheet" href="css/loginCadastro.css">
</head>
<body>

    <main class="loginCadastro">
        <img src="assets/logo.svg" alt="">
        <h1>Login</h1>
        <form method="POST" action="app/models/loginUser.php" class="loginCadastroForm">
            <div class="mb-3">
                <label for="loginUsuario" class="form-label">Endereço de Email</label>
                <input type="email" name="loginUsuario" id="loginUsuario" placeholder="usuario@exemplo.com" class="form-control" name="loginUsuario">
            </div>
            <div class="mb-3">
                <label for="loginSenhaUsuario" class="form-label">Senha</label>
                <input type="password" name="loginSenhaUsuario" id="loginSenhaUsuario" placeholder="*************" class="form-control" name="loginSenhaUsuario">
            </div>
            <button type="submit" class="btn btn-outline-success LoginCadastroBtn">Entrar</button>

                <?php
    
                    if(isset($_GET['erroLogin'])){
                        $erroLogin = $_GET['erroLogin'];

                        if($erroLogin == 'senhaIncorreta'){
                            echo "<div class='alert alert-warning text-center m-3'>Senha Incorreta!</div>";
                        }

                        if($erroLogin == 'emailIncorreto'){
                            echo "<div class='alert alert-warning text-center m-3'>Email Incorreto!</div>";
                        }

                        if($erroLogin == 'falhaConsulta'){
                            echo "<div class='alert alert-warning text-center m-3'>Falha na consulta com banco de dados! Contate um administrador.</div>";
                        }
                    }
                
                ?>

        </form>
        <a href="registrar.php" class="loginCadastroRegistrar">Ainda não possuo uma conta!</a>
    </main>
</body>