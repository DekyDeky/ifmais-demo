<div class="modal fade" id="modalEditarAviso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Aviso</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="app/controllers/editarAviso.php">
                        <div class="mb-3">
                            <label for="editarTituloAviso" class="form-label">Título Aviso</label>
                            <input type="text" name="editarTituloAviso" id="editarTituloAviso" class="form-control" name="editarTituloAviso" placeholder="Manutenção no sistema">
                        </div>

                        <div class="mb-3">
                            <label for="editarTextoAviso" class="form-label">Texto do Aviso</label>
                            <textarea class="form-control" placeholder="Informamos que o sistema..." id="editarTextoAviso" name="editarTextoAviso" style="height: 100px;"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="editarValidadeAviso" class="form-label">Validade do Aviso</label>
                            <input type="datetime-local" name="editarValidadeAviso" id="editarValidadeAviso" class="form-control" name="editarValidadeAviso">
                        </div>

                        <input type="hidden" id="editarIdAviso" name="editarIdAviso">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalGerenciarAviso">Fechar</button>
                            <button type="submit" class="btn btn-primary">Editar Aviso</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>