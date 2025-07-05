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
        <h2 id="cadastro-status">Informações Pessoais</h2>

        <div class="cadastroEtapaView">
            <div class="etapa etapaAtual" id="vEtapa1"></div>
            <div class="etapa" id="vEtapa2"></div>
            <div class="etapa" id="vEtapa3"></div>
            <div class="etapa" id="vEtapa4"></div>
        </div>

        <form action="app/models/adicionarUser.php" method="POST" class="loginCadastroForm" id="formRegistro" enctype="multipart/form-data">
            <div class="cadastroEtapa" id="rEtapa1">
                <div class="mb-3">
                    <label for="nomeUsuario" class="form-label">Nome Completo</label>
                    <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Fulano de Tal" class="form-control" data-apenas-letras required>
                </div>
                <div class="mb-3">
                    <label for="nomeSocialUsuario" class="form-label">Nome Social (Opcional)</label>
                    <input type="text" name="nomeSocialUsuario" id="nomeSocialUsuario" placeholder="Fulane de Tal" class="form-control" data-apenas-letras>
                </div>
                <div class="mb-3">
                    <label for="dataNascUsuario" class="form-label">Data de Nascimento</label>
                    <input type="date" name="dataNascUsuario" id="dataNascUsuario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="cpfUsuario" class="form-label">CPF</label>
                    <input type="text" name="cpfUsuario" id="cpfUsuario" class="form-control" placeholder="000.000.000-00" required>
                </div>
            </div>

            <div class="cadastroEtapa cadastroInvisivel" id="rEtapa2">
                <div class="mb-3">
                    <label for="emailUsuario" class="form-label">Endereço de Email</label>
                    <input type="email" name="emailUsuario" id="emailUsuario" placeholder="usuario@exemplo.com" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senhaUsuario" class="form-label">Senha</label>
                    <input type="password" name="senhaUsuario" id="senhaUsuario" placeholder="*************" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirmarSenhaUsuario" class="form-label">Confirmar Senha</label>
                    <input type="password" name="confirmarSenhaUsuario" id="confirmarSenhaUsuario" placeholder="*************" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telefoneUsuario" class="form-label">Número de Telefone</label>
                    <input type="email" name="telefoneUsuario" id="telefoneUsuario" placeholder="(00) 00000-0000" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="fotoUsuario" class="form-label">Foto de Perfil (Max. 5MB)</label>
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
                    <select class="form-select" aria-label="Graduação..." name="tipoTitulacaoUsuario" id="tipoTitulacaoUsuario">
                        <option value="Graduação">Graduação</option>
                        <option value="Bacharelado">Bacharelado</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Doutorado">Doutorado</option>
                        <option value="Mestrado">Mestrado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="titulacaoUsuario" class="form-label">Titulação</label>
                    <input type="text" name="titulacaoUsuario" id="titulacaoUsuario" class="form-control" id="titulacaoUsuario" placeholder="Engenharia de Software">
                </div>

                <div class="mb-3">
                    <label for="instituicaoUsuario" class="form-label">Instituição</label>
                    <input type="text" name="instituicaoUsuario" id="instituicaoUsuario" class="form-control" id="instituicaoUsuario" placeholder="IFPR - TB">
                </div>

                <div class="mb-3">
                    <label for="anoInicioTituloUsuario" class="form-label">Ano de Ínicio</label>
                    <input type="number" min="1900" max="2099" step="1" name="anoInicioTituloUsuario" id="anoInicioTituloUsuario" class="form-control" id="anoInicioTituloUsuario" placeholder="20XX">
                </div>

                <div class="mb-3">
                    <label for="anoConclusaoTituloUsuario" class="form-label">Ano de Conclusão</label>
                    <input type="number" min="1900" max="2099" step="1" name="anoConclusaoTituloUsuario" id="anoConclusaoTituloUsuario" class="form-control" id="anoConclusaoTituloUsuario" placeholder="20XX">
                </div>

                <button type="button" class="btn btn-outline-success addTitulacao" id="addTitulacao">Adicionar Titulação</button>

                <ul class="mb-3 titulacoes" id="titulacoes">
                </ul>
            </div>

            <div class="cadastroEtapa cadastroInvisivel" id="rEtapa4">
                <div class="mb-3">
                    <label for="cepUsuario" class="form-label">CEP</label>
                    <input type="text" name="cepUsuario" id="cepUsuario" class="form-control" id="cepUsuario" placeholder="00000-000" required>
                </div>
                <div class="mb-3">
                    <label for="estadoUsuario" class="form-label">Estado (Sigla)</label>
                    <input type="text" name="estadoUsuario" id="estadoUsuario" class="form-control" id="estadoUsuario" placeholder="Paraná" data-apenas-letras required>
                </div>
                <div class="mb-3">
                    <label for="cidadeUsuario" class="form-label">Cidade</label>
                    <input type="text" name="cidadeUsuario" id="cidadeUsuario" class="form-control" id="cidadeUsuario" placeholder="Telêmaco Borba" data-apenas-letras required>
                </div>
                <div class="mb-3">
                    <label for="bairroUsuario" class="form-label">Bairro</label>
                    <input type="text" name="bairroUsuario" id="bairroUsuario" class="form-control" id="bairroUsuario" placeholder="Centro" required>
                </div>
                <div class="mb-3">
                    <label for="ruaUsuario" class="form-label">Rua</label>
                    <input type="text" name="ruaUsuario" id="ruaUsuario" class="form-control" id="ruaUsuario" placeholder="Av. Horácio Klabin" required>
                </div>
                <div class="mb-3">
                    <label for="numeroUsuario" class="form-label">Número</label>
                    <input type="text" name="numeroUsuario" id="numeroUsuario" class="form-control" id="numeroUsuario" placeholder="12A" required>
                </div>
            </div>

            <div class='btnsCadastro'>
                <button type="button" class="btn btn-outline-success LoginCadastroBtn disabled" id="antBtn">Anterior</button>
                <button type="button" class="btn btn-outline-success LoginCadastroBtn" id="proxBtn">Próximo</button>
                <button type="submit" class="btn btn-outline-success LoginCadastroBtn d-none" id="fimBtn">Finalizar</button>
            </div>
        </form>
        <a href="index.php" class="loginCadastroRegistrar">Já possuo uma conta!</a>
    </main>

    <script src="js/etapasCadastro.js" method="module"></script>
    <script src="js/adicionarTitulacao.js" method="module"></script>
    <script src="js/pegarEndereco.js" method="module"></script>
</body>