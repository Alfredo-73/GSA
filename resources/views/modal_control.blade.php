 

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
                    
                        <a id="modificar" class="btn btn-primary " href="/../modif_control/{{$control->id}}"  ><i class="far fa-edit mr-2"></i>Modificar </a>

                      
                        <a class="btn btn-deep-orange" href="{{action('controlController@verPDF', $control->id)}}"><i class="fas fa-print mr-2 " style="color:white"></i>Imprimir</a>

                    </div>
                </div>
        </div>                
            
        
    </div>
                          
</div>



<!--<div class="modal fade" id="modal_control{{ $control->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Quincena: @if(!empty($control->quincena)){{$control->quincena->nombre}}@endif </p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    
                    <p><h4>Cliente: @if(!empty($control->cliente)) {{$control->cliente->nombre}} @endif </h4>
                    </p>
                </div> 
                 <div class="text-center w-50" style="width:50%">
                    <p>Factura: @if(!empty($control)) {{$control->importe}} @endif
                   <i class="fas fa-dollar-sign  prefix grey-text w-50">@if(!empty($control)) {{$control->importe}} @endif</i>
                    
                </div>
                <div class="text-center w-50" style="width:50%">
                    <p>Importe Factura:  </p>
                    <i class="fas fa-dollar-sign  prefix grey-text ">@if(!empty($control)) {{$control->importe}} @endif</i>
                    
                </div>
                <div class="text-center w-50" style="width:50%">
                    <p>Retenciones:  </p>
                    <i class="fas fa-dollar-sign  prefix grey-text ">@if(!empty($control)){{$control->retencion}} @endif</i>
                    
                </div><div class="text-center w-50" style="width:50%">
                    <p>Monto Cobrado:  </p>
                    <i class="fas fa-dollar-sign  prefix grey-text ">@if(!empty($control)) {{$control->importe}} @endif</i>
                    
                </div><div class="text-center w-50" style="width:50%">
                    <p>Gastos Bancarios:  </p>
                    <i class="fas fa-dollar-sign  prefix grey-text ">@if(!empty($control)) {{$control->gasto_bancario}} @endif</i>
                    
                </div><div class="text-center w-50" style="width:50%">
                    <p>Libre Disponibilidad:  </p>
                    <i class="fas fa-dollar-sign  prefix grey-text">@if(!empty($control)) {{$control->disponible}} @endif</i>
                    
                </div><div class="text-center w-50" style="width:50%">
                    <p>Pago Cosecha:  </p>
                    <i class="fas fa-dollar-sign  prefix grey-text ">@if(!empty($control)) {{$control->pago_cosecha}} @endif</i>
                    
                </div>
                </div><div class="text-center w-50" style="width:50%">
                    <p>Pago Transporte:  </p>
                    <i class="fas fa-dollar-sign  prefix grey-text">@if(!empty($control)) {{$control->pago_transporte}} @endif</i>
                    
                </div>
                </div><div class="text-center w-50" style="width:50%">
                    <p>Neto Quincena:  </p>
                    <i class="fas fa-dollar-sign  prefix grey-text  w-50">@if(!empty($control)) {{$disponible - $totalPago}} @endif</i>
                    
                </div>
            
            
            </div>

            
        </div>
    </div>
</div> -->


 <!--<div id="modal_control{{ $control->id }}" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">Quincena</i>
                    <input value="{{ $control->quincena->nombre }}" title="Solo puede ingresar letras en este campo." id="Primer nombre" type="text" class="validate" required>
                    <label for="Primer nombre">Primer nombre:</label>
                </div>

                <div class="input-field col s10 m6 push-s1">
                    <input value="{{ $control->cliente->nombre }}" title="Solo puede ingresar letras en este campo." id="Segundo nombre" type="text" class="validate" required>
                    <label for="Segundo nombre">Segundo nombre:</label>
                </div>
            </div>
        </div>
    </div> 



    

<form id="actualidarDatos">
<div class="modal fade" id="modal_control{{ $control->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar país:</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
          <div class="form-group">
            <label for="codigo" class="control-label">Código:</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required maxlength="2">
			<input type="hidden" class="form-control" id="id" name="id">
          </div>
		  <div class="form-group">
            <label for="nombre" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="45">
          </div>
		  <div class="form-group">
            <label for="moneda" class="control-label">Moneda:</label>
            <input type="text" class="form-control" id="moneda" name="moneda" required maxlength="3">
          </div>
		  <div class="form-group">
            <label for="capital" class="control-label">Capital:</label>
            <input type="text" class="form-control" id="capital" name="capital" required maxlength="30"> 
          </div>
		  <div class="form-group">
            <label for="continente" class="control-label">Continente:</label>
            <input type="text" class="form-control" id="continente" name="continente" required maxlength="15">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>-->

