<div class="modal fade" id="adicionarAviso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="app/controllers/cadastroAviso.php">
                        <div class="mb-3">
                            <label for="tituloAviso" class="form-label">Título Aviso</label>
                            <input type="text" name="tituloAviso" id="tituloAviso" placeholder="Manutenção do Sistema" class="form-control" name="tituloAviso" value="<?= htmlspecialchars($_SESSION['dadosAviso']['tituloAviso'] ?? '') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="textoAviso" class="form-label">Texto do Aviso</label>
                            <textarea class="form-control" placeholder="Informamos que o sistema..." id="textoAviso" name="textoAviso" style="height: 100px;" value="<?= htmlspecialchars($_SESSION['dadosAviso']['textoAviso'] ?? '') ?>"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="validadeAviso" class="form-label">Validade do Aviso</label>
                            <input type="datetime-local" name="validadeAviso" id="validadeAviso" placeholder="Manutenção do Sistema" class="form-control" name="validadeAviso" value="<?= htmlspecialchars($_SESSION['dadosAviso']['validadeAviso'] ?? '') ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Criar Aviso</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>