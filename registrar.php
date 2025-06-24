<?php include "app/views/general/libs.php"?>
    <title>Registrar - IFMais</title>
    <link rel="stylesheet" href="css/loginCadastro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <script>
        $(document).ready(function(){
            $("#cpfUsuario").mask("000.000.000-00");
        });
    </script>

    <main class="loginCadastro">
        <img src="assets/logo.svg" alt="">
        <h1>Registrar</h1>
        <h2 id="cadastro-status">Informações Pessoais</h2>

        <div class="cadastroEtapaView">
            <div class="etapa etapaAtual" id="vEtapa1"></div>
            <div class="etapa" id="vEtapa2"></div>
            <div class="etapa" id="vEtapa3"></div>
            <div class="etapa" id="vEtapa4"></div>
        </div>

        <form method="POST" action="" class="loginCadastroForm">
            <div class="cadastroEtapa" id="rEtapa1">
                <div class="mb-3">
                    <label for="nomeUsuario" class="form-label">Nome Completo</label>
                    <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Fulano de Tal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nomeSocialUsuario" class="form-label">Nome Social (Opcional)</label>
                    <input type="text" name="nomeSocialUsuario" id="nomeSocialUsuario" placeholder="Fulane de Tal" class="form-control" require>
                </div>
                <div class="mb-3">
                    <label for="dataNascUsuario" class="form-label">Data de Nascimento</label>
                    <input type="date" name="dataNascUsuario" id="dataNascUsuario" class="form-control" require>
                </div>
                <div class="mb-3">
                    <label for="cpfUsuario" class="form-label">CPF</label>
                    <input type="text" name="cpfUsuario" id="cpfUsuario" class="form-control" placeholder="000.000.000-00" require>
                </div>
            </div>

            <div class="cadastroEtapa cadastroInvisivel" id="rEtapa2">
                <div class="mb-3">
                    <label for="emailUsuario" class="form-label">Endereço de Email</label>
                    <input type="email" name="emailUsuario" id="emailUsuario" placeholder="usuario@exemplo.com" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="senhaUsuario" class="form-label">Senha</label>
                    <input type="password" name="senhaUsuario" id="senhaUsuario" placeholder="*************" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="fotoUsuario" class="form-label">Foto de Perfil</label>
                    <input class="form-control" type="file" id="fotoUsuario" name="fotoUsuario">
                </div>
                <div class="mb-3">
                    <label for="sobreUsuario" class="form-label">Sobre Mim</label>
                    <textarea class="form-control" placeholder="Eu sou docente do instituto..." id="sobreUsuario" name="sobreUsuario" style="height: 100px;"></textarea>
                </div>
            </div>

            <div class="cadastroEtapa cadastroInvisivel" id="rEtapa3">
                <div class="mb-3">
                    <label for="tipoTitulacaoUsuario" class="form-label">Tipo Titulação</label>
                    <select class="form-select" aria-label="Graduação..." name="tipoTitulacaoUsuario">
                        <option value="graduacao">Graduação</option>
                        <option value="bacharelado">Bacharelado</option>
                        <option value="licenciatura">Licenciatura</option>
                        <option value="doutorado">Doutorado</option>
                        <option value="mestrado">Mestrado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="titulacaoUsuario" class="form-label">Titulação</label>
                    <input type="text" name="titulacaoUsuario" class="form-control" id="titulacaoUsuario" placeholder="Engenharia de Software">
                </div>

                <button type="button" class="btn btn-outline-success addTitulacao">Adicionar Titulação</button>

                <div class="mb-3 titulacoes">

                </div>
            </div>


            <div class='btnsCadastro'>
                <button type="button" class="btn btn-outline-success LoginCadastroBtn disabled" id="antBtn">Anterior</button>
                <button type="button" class="btn btn-outline-success LoginCadastroBtn" id="proxBtn">Próximo</button>
                <button type="submit" class="btn btn-outline-success LoginCadastroBtn d-none" id="fimBtn">Finalizar</button>
            </div>
        </form>
        <a href="login.php" class="loginCadastroRegistrar">Já possuo uma conta!</a>
    </main>

    <script src="js/etapasCadastro.js" method="module"></script>
</body>