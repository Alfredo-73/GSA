 
<div class="modal fade" id="modal_control{{ $control->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100 font-weight-bold">CONTROL @if(!empty($control->quincena)){{$control->quincena->nombre}}@endif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
                  

                                
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                        <i class="fas fa-book prefix grey-text"></i>
                        <input type="text" id="orangeForm-name" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Numero Factura @if(!empty($control->num_factura)) {{$control->num_factura}} @endif</label>
                </div>
                <div class="md-form mb-5">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Importe Factura @if(!empty($control)) {{$control->importe}} @endif</label>
                </div>

                <div class="md-form mb-4">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Retenciones  @if(!empty($control)){{$control->retencion}} @endif</label>
                </div>

                <div class="md-form mb-4">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Monto Cobrado  @if(!empty($control)) {{$control->monto_cobrado}} @endif</label>
                </div>

                <div class="md-form mb-4">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Gastos Bancarios   @if(!empty($control)){{$control->gasto_bancario}} @endif</label>
                </div>

                <div class="md-form mb-4">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Libre Disponibilidad @if(!empty($control)) {{$disponible}} @endif</label>
                </div>
                <div class="md-form mb-4">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Pago Cosecha   @if(!empty($control)){{$control->pago_personal}} @endif </label>
                </div>
                <div class="md-form mb-4">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Pago Transporte @if(!empty($control))  {{$control->pago_transporte}} @endif</label>
                </div>
                <div class="md-form mb-4">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">SALDO QUINCENA @if(!empty($control)) {{$disponible - $totalPago}} @endif</label>
                </div>

            </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-deep-orange">Imprimir</button>
                </div>
                             
            
        </div>
    </div>
                      
</div>