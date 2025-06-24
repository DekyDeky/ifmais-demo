<?php include "app/views/general/libs.php"?>
<title>login - IFMais</title>
<link rel="stylesheet" href="css/loginCadastro.css">
</head>
<body>
    <main class="loginCadastro">
        <img src="assets/logo.svg" alt="">
        <h1>Login</h1>
        <form method="POST" action="" class="loginCadastroForm">
            <div class="mb-3">
                <label for="loginUsuario" class="form-label">Endereço de Email</label>
                <input type="email" name="loginUsuario" id="loginUsuario" placeholder="usuario@exemplo.com" class="form-control">
            </div>
            <div class="mb-3">
                <label for="loginSenhaUsuario" class="form-label">Senha</label>
                <input type="password" name="loginSenhaUsuario" id="loginSenhaUsuario" placeholder="*************" class="form-control">
            </div>
            <button type="submit" class="btn btn-outline-success LoginCadastroBtn">Entrar</button>
        </form>
        <a href="registrar.php" class="loginCadastroRegistrar">Ainda não possuo uma conta!</a>
    </main>
</body>