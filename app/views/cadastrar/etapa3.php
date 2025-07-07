        <form action="app/controllers/cadastroUser.php" method="POST" class="loginCadastroForm cadastroEtapa" id="rEtapa3" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tipoTitulacaoUsuario" class="form-label">Tipo Titulação</label>
                <select class="form-select" aria-label="Graduação..." name="tipoTitulacaoUsuario" id="tipoTitulacaoUsuario">
                    <option value="Graduação">Graduação</option>
                    <option value="Pós-Graduação">Pós-Graduação</option>
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

            <div class='btnsCadastro'>
                <button type="submit" class="btn btn-outline-success LoginCadastroBtn" id="antBtn" name="anterior">Anterior</button>
                <button type="submit" class="btn btn-outline-success LoginCadastroBtn" id="proximoBtn" name="proximo">Próximo</button>
            </div>
        </form>