<div id="modalmantenimiento" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbltitulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form method="post" id="mantenimiento_form">
                <div class="modal-body">
                    <input type="hidden" name="usu_id" id="usu_id"/>

                    <div class="row gy-2">
                        <div class="col-md-12">

                            <div>
                                <label for="basiInput" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="txtpass">
                            </div>
                            <div>
                                <label for="labelInput" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="txtpassconfirm">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="btnguardar" class="form-control btn btn-primary btn-label waves-effect waves-light rounded-pill"><i class="ri-folder-lock-line label-icon align-middle rounded-pill fs-16 me-2"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>