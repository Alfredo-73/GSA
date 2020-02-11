 

<div class="modal fade" id="modal_sancion{{ $sancion->id }}" tabindex="3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 font-weight-bold text-center" style="color:darkblue">EMPLEADO:  @if(!empty($sancion->empleado->nombre)){{$sancion->empleado->nombre}}   {{$sancion->empleado->apellido}}@endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
                  

                                
            <div class="modal-body " style="margin-left:3rem">
                <div class="row">
                     
                    <!--<div class="md-form mb-1" style="width:100%">
                            <input type="date" id="orangeForm-name" class="form-control" value="@if(!empty($sancion->quincena)){{$sancion->quincena->nombre}}@endif" name="">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Quincena:  @if(!empty($sancion->quincena)){{$sancion->quincena->nombre}}@endif </label>
                            
                        </div> -->


                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-id-card-alt prefix" style="color:darkblue"></i>
                        <input  style="width:7rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($sancion->cliente->nombre)) {{$sancion->cliente->nombre}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">CLIENTE</label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-book prefix"  style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($sancion->legajo)) {{$sancion->legajo}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">LEGAJO </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix " style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orange" class="form-control" value="@if(!empty($sancion)) {{$sancion->capataz->nombre}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">CAPATAZ </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($sancion)){{$sancion->dias}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">DIAS  </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($sancion)) {{$sancion->fecha}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">FECHA SANCION  </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($sancion)){{$sancion->reincorporacion}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">FECHA REINCORPORACION   </label>
                        </div>

                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($sancion)) {{$sancion->motivo}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">MOTIVO </label>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-dollar-sign prefixapp prefix" style="color:darkblue"></i>
                        <input  style="width:5rem" type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($sancion)){{$sancion->observacion}} @endif">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass" style="color:blue">OBSERVACION   </label>
                        </div>
                        
                </div>

            </div>
            
                <div class="modal-footer" style="width:100%">
                    <div class="mx-auto">
                    
                        <a id="modificar" class="btn btn-primary " href="/../modif_sancion/{{$sancion->id}}"  ><i class="far fa-edit mr-2"></i>Modificar </a>

                      
                        <a class="btn btn-deep-orange" href="/../PDFSancion/{{$sancion->id}}"><i class="fas fa-print mr-2 " style="color:white"></i>Imprimir</a>

                    </div>
                </div>
        </div>                
            
        
    </div>
                          
</div>



    
