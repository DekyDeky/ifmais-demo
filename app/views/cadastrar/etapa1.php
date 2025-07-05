        <form action="app/controllers/cadastroUser.php" method="POST" class="loginCadastroForm cadastroEtapa" id="rEtapa1" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nomeUsuario" class="form-label">Nome Completo</label>
                <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Fulano de Tal" class="form-control" value="<?= htmlspecialchars($_SESSION['dados']['nomeUsuario'] ?? '') ?>" data-apenas-letras>
            </div>
            <div class="mb-3">
                <label for="nomeSocialUsuario" class="form-label">Nome Social (Opcional)</label>
                <input type="text" name="nomeSocialUsuario" id="nomeSocialUsuario" placeholder="Fulane de Tal" class="form-control" value="<?= htmlspecialchars($_SESSION['dados']['nomeSocialUsuario'] ?? '') ?>" data-apenas-letras>
            </div>
            <div class="mb-3">
                <label for="dataNascUsuario" class="form-label">Data de Nascimento</label>
                <input type="date" name="dataNascUsuario" id="dataNascUsuario" class="form-control" value="<?= htmlspecialchars($_SESSION['dados']['dataNascUsuario'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="cpfUsuario" class="form-label">CPF</label>
                <input type="text" name="cpfUsuario" id="cpfUsuario" class="form-control" placeholder="000.000.000-00" value="<?= htmlspecialchars($_SESSION['dados']['cpfUsuario'] ?? '') ?>">
            </div>

            <div class='btnsCadastro'>
                <button type="submit" class="btn btn-outline-success LoginCadastroBtn" id="antBtn" name="anterior">Anterior</button>
                <button type="submit" class="btn btn-outline-success LoginCadastroBtn" id="proximoBtn" name="proximo">Próximo</button>
            </div>
        </form>