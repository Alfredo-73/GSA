 

<div class="modal fade" id="modal_empleado{{ $empleado->id }}" tabindex="3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 font-weight-bold text-center" style="color:darkblue">EMPLEADO:  @if(!empty($empleado->nombre)){{$empleado->nombre}} . " " . {{$empleado->apellido}}@endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
                  

                                
            <div class="modal-body " style="margin-left:3rem">
                <div class="row">
                     
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-id-card-alt prefix" style="color:darkblue"></i>
                        <input  style="width:7rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado->empresa)) {{$empleado->empresa->razon_social}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">EMPRESA</label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-book prefix"  style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado->legajo)) {{$empleado->legajo}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">LEGAJO </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix " style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orange" class="form-control" value="@if(!empty($empleado)) {{$empleado->nombre}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">NOMBRE </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado)){{$empleado->apellido}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">APELLIDO  </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado)) {{$empleado->dni}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">DNI  </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado)){{$empleado->cuil}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">CUIL   </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado)) {{$empleado->fecha_ingreso}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">FECHA INGRESO </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado)){{$empleado->fecha_egreso}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">FECHA EGRESO   </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado->capataz))  {{$empleado->capataz->nombre}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">CAPATAZ </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($empleado->sanciones)) {{$empleado->sanciones->legajo}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">SANCION </label>
                        </div>
                </div>

            </div>
            
                <div class="modal-footer" style="width:100%">
                    <div class="mx-auto">
                    
                        <a id="modificar" class="btn btn-primary " href="/../modif_empleado/{{$empleado->id}}"  ><i class="far fa-edit mr-2"></i>Modificar </a>

                      
                        <a class="btn btn-deep-orange" href="{{action('empleadoController@verPDF', $empleado->id)}}"><i class="fas fa-print mr-2 " style="color:white"></i>Imprimir</a>

                    </div>
                </div>
        </div>                
            
        
    </div>
                          
</div>



    
<!--
<form id="actualidarDatos">
<div class="modal fade" id="modal_empleado{{ $empleado->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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

