        <div class="modal fade" id="modalGerenciarAviso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gerenciar Avisos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <?php
                            
                                include 'app/models/avisos/listarAvisosEspecificos.php';
                            
                            ?>
                    </div>

                    <script src="js/editarAviso.js"></script>
                </div>
            </div>
        </div>