                <div class="modal fade" id="modalcosecha{{ $cosecha->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title w-100 font-weight-bold">Sign up</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-5">

                                <div class="md-form mb-1">
                                    <i class="fas fa-book prefix grey-text"></i>
                                    <input type="text" id="orangeForm-name" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Cliente @if(!empty($cosecha->id_cliente)) {{$cosecha->id_cliente}}@endif</label>
                                </div>
                                <div class="md-form mb-1">
                                    <i class="fas fa-dollar-sign prefix grey-text"></i>
                                    <input type="text" id="orangeForm-email" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-email">Capataz @if(!empty($cosecha->id_capataz)) {{$cosecha->id_capataz}}@endif</label>
                                </div>

                                <div class="md-form mb-1">
                                    <i class="fas fa-dollar-sign prefix grey-text"></i>
                                    <input type="text" id="orangeForm-pass" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Jornales @if(!empty($cosecha->jornales)) {{$cosecha->jornales}}@endif</label>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-dollar-sign grey-text"></i>
                                    <input type="text" id="orangeForm-pass" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Cosecheros @if(!empty($cosecha->cosecheros)) {{$cosecha->cosecheros}}@endif</label>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-dollar-sign grey-text"></i>
                                    <input type="text" id="orangeForm-pass" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Bines @if(!empty($cosecha->bines)) {{$cosecha->bines}}@endif</label>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-dollar-sign grey-text"></i>
                                    <input type="text" id="orangeForm-pass" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Maletas @if(!empty($cosecha->maletas)) {{$cosecha->maletas}}@endif</label>
                                </div>
                                <div class="md-form mb-4">
                                    <i class="fas fa-dollar-sign grey-text"></i>
                                    <input type="text" id="orangeForm-pass" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Toneladas @if(!empty($cosecha->toneladas)) {{$cosecha->toneladas}}@endif</label>
                                </div>
                                <div class="md-form mb-4">
                                    <i class="fas fa-dollar-sign grey-text"></i>
                                    <input type="text" id="orangeForm-pass" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Promedio KG/BIN @if(!empty($cosecha->prom_kg_bin)) {{$cosecha->prom_kg_bin}}@endif</label>
                                </div>
                                <div class="md-form mb-4">
                                    <i class="fas fa-dollar-sign grey-text"></i>
                                    <input type="text" id="orangeForm-pass" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Supervisor @if(!empty($cosecha->supervisor)) {{$cosecha->supervisor}}@endif</label>
                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-deep-orange">Imprimir</button>
                            </div>

                        </div>
                    </div>
                </div>
                </div>