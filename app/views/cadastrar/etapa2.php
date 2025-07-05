        <form action="app/controllers/cadastroUser.php" method="POST" class="loginCadastroForm cadastroEtapa" id="rEtapa2" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="emailUsuario" class="form-label">Endereço de Email</label>
                <input type="email" name="emailUsuario" id="emailUsuario" placeholder="usuario@exemplo.com" class="form-control" value="<?= htmlspecialchars($_SESSION['dados']['emailUsuario'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="senhaUsuario" class="form-label">Senha</label>
                <input type="password" name="senhaUsuario" id="senhaUsuario" placeholder="*************" class="form-control" value="<?= htmlspecialchars($_SESSION['dados']['senhaUsuario'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="confirmarSenhaUsuario" class="form-label">Confirmar Senha</label>
                <input type="password" name="confirmarSenhaUsuario" id="confirmarSenhaUsuario" placeholder="*************" class="form-control" value="<?= htmlspecialchars($_SESSION['dados']['confirmarSenhaUsuario'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="telefoneUsuario" class="form-label">Número de Telefone</label>
                <input type="text" name="telefoneUsuario" id="telefoneUsuario" placeholder="(00) 00000-0000" class="form-control">
            </div>
            <div class="mb-3">
                <label for="fotoUsuario" class="form-label">Foto de Perfil (Max. 5MB)</label>
                <input class="form-control" type="file" id="fotoUsuario" name="fotoUsuario" value="<?= htmlspecialchars($_SESSION['dados']['fotoUsuario'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="sobreUsuario" class="form-label">Sobre Mim</label>
                <textarea class="form-control" placeholder="Eu sou docente do instituto..." id="sobreUsuario" name="sobreUsuario" style="height: 100px;"></textarea>
            </div>

            <div class='btnsCadastro'>
                <button type="submit" class="btn btn-outline-success LoginCadastroBtn" id="antBtn" name="anterior">Anterior</button>
                <button type="submit" class="btn btn-outline-success LoginCadastroBtn" id="proximoBtn" name="proximo">Próximo</button>
            </div>
        </form>