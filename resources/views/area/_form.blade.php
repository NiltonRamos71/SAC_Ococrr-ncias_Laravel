<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Área</h4>
            </div>

            <div class="modal-body">

                <div class="row" hidden="">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="codigo">ID</label>
                            <input type="text" readonly class="form-control" name="id_area" id="id_area">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="nome" class="control-label">Nome:</label>
                            <input required type="text" class="form-control" name="nome_area" id="nome_area" maxlength="300" autocomplete="off">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="sigla" class="control-label">Sigla:</label>
                            <input required type="text" class="form-control" name="sigla_area" id="sigla_area" maxlength="40" autocomplete="off">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="email" class="control-label">Email:</label>
                            <input required type="text" class="form-control" name="email" id="email" maxlength="40" autocomplete="off">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-2">
                        <div class="mt-checkbox-outline">
                            <label for="ativo"> Status </label>
                            <label class="mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" onchange="" value='1' name="status" id="status"> <span></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row text-right">
                    <div class="col-md-12">
                        <div class="form-actions">
                            <button type="submit" class="btn blue" id="salvar">Salvar</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- /.modal -->