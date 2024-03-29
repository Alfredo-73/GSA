 

<div class="modal fade" id="modal_control{{ $control->id }}" tabindex="3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 font-weight-bold text-center" style="color:darkblue">CONTROL DE QUINCENA:  @if(!empty($control->quincena)){{$control->quincena->nombre}}@endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
                  

                                
            <div class="modal-body " style="margin-left:3rem">
                <div class="row">
                     
                    <!--<div class="md-form mb-1" style="width:100%">
                            <input type="date" id="orangeForm-name" class="form-control" value="@if(!empty($control->quincena)){{$control->quincena->nombre}}@endif" name="">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Quincena:  @if(!empty($control->quincena)){{$control->quincena->nombre}}@endif </label>
                            
                        </div> -->


                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-id-card-alt prefix" style="color:darkblue"></i>
                        <input  style="width:7rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control->cliente)) {{$control->cliente->nombre}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">CLIENTE</label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-book prefix"  style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control->num_factura)) {{$control->num_factura}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">NUMERO FACTURA </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix " style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orange" class="form-control" value="@if(!empty($control)) {{$control->importe}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">IMPORTE FACTURA </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control)){{$control->retencion}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">RETENCIONES  </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control)) {{$control->monto_cobrado}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">MONTO COBRADO  </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control)){{$control->gasto_bancario}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">GASTOS BANCARIOS   </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control)) {{$disponible}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">LIBRE DISPONIBILIDAD </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control)){{$control->pago_personal}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">PAGO COSECHA   </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control))  {{$control->pago_transporte}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">PAGO TRANSPORTE </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($control)) {{$disponible - $totalPago}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">SALDO QUINCENA </label>
                        </div>
                </div>

            </div>
            
                <div class="modal-footer" style="width:100%">
                    <div class="mx-auto">
                    @can('update_control')
                        <a id="modificar" class="btn btn-primary " href="/../modif_control/{{ $control->id }}"  ><i class="far fa-edit mr-2"></i>Modificar </a>
                    @endcan
                      
                        <a class="btn btn-deep-orange" href="{{action('controlController@verPDF', $control->id)}}"><i class="fas fa-print mr-2 " style="color:white"></i>Imprimir</a>

                    </div>
                </div>
        </div>                
            
        
    </div>
                          
</div>



