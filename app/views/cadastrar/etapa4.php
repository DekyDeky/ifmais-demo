        <form action="app/controllers/cadastroUser.php" method="POST" class="loginCadastroForm cadastroEtapa" id="rEtapa4" enctype="multipart/form-data">
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

                <div class='btnsCadastro'>
                    <button type="submit" class="btn btn-outline-success LoginCadastroBtn" id="antBtn" name="anterior">Anterior</button>
                    <button type="submit" class="btn btn-outline-success LoginCadastroBtn" id="proximoBtn" name="proximo">Próximo</button>
                </div>
        </form>