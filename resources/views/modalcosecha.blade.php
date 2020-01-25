<div class="modal fade" id="modalcosecha{{ $cosecha->id }}" tabindex="3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 font-weight-bold text-center" style="color:darkblue">PARTE DIARIO DE COSECHA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left:3rem">
                <div class="row">
                    <!--<input hidden="true" type="text" id="orangeForm-name" class="form-control" value="@if(!empty($cosecha->id_cliente)) {{$cosecha->id_cliente}}@endif" name="id_cliente">
                        <input hidden="true" type="text" id="orangeForm-name" class="form-control" value="@if(!empty($cosecha->id_capataz)) {{$cosecha->id_capataz}}@endif" name="id_capataz">-->
                    <div class="md-form mb-1" style="width:30%">
                        <i class="far fa-calendar-alt prefix" style="color:darkblue"></i>
                        <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror text-center" name="fecha" value="{{ $cosecha->fecha }}" required autocomplete="fecha" autofocus>
                        <label style="color:darkblue">FECHA</label>
                        @error('fecha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="md-form mt-3 mx-auto" style="width:30%">
                        <i class="fas fa-id-card-alt prefix" style="color:darkblue"></i>
                        <label style="color:darkblue">CLIENTE</label>
                        <br>
                        <br>
                        <select class="selectpicker show-menu-arrow" name="id_cliente">
                            <option value="{{$cosecha->id_cliente}}">{{$cosecha->cliente->nombre}}</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form mt-3" style="width:50%">
                        <i class="fas fa-users prefix" style="color:darkblue"></i>
                        <label style="color:darkblue">CAPATAZ</label>
                        <br>
                        <br>
                        <select class="selectpicker show-menu-arrow" name="id_capataz">
                            <option value="{{$cosecha->id_capataz}}">{{$cosecha->capataz->nombre}}</option>
                            @foreach($capataz as $capat)
                            <option value="{{$capat->id}}">{{$capat->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-users prefix" style="color:darkblue"></i>
                        <input style="width:2rem" type="text" id="orangeForm-pass" class="form-control text-center" value="@if(!empty($cosecha->jornales)) {{$cosecha->jornales}}@endif" name="jornales">
                        <label style="color:darkblue" data-error="wrong" data-success="right" for="orangeForm-pass">{{ __('JORNALES') }}</label>
                    </div>

                    <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-users prefix" style="color:darkblue"></i>
                        <input style="width:2rem" type="text" id="orangeForm-pass" class="form-control text-center" value="@if(!empty($cosecha->cosecheros)) {{$cosecha->cosecheros}}@endif" name="cosecheros">
                        <label style="color:darkblue" data-error="wrong" data-success="right" for="orangeForm-pass">COSECHEROS</label>
                    </div>
                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-truck-loading prefix" style="color:darkblue"></i>
                        <input style="width:3rem" type="text" id="orangeForm-pass" class="form-control text-center" value="@if(!empty($cosecha->bines)) {{$cosecha->bines}}@endif" name="bines">
                        <label style="color:darkblue" data-error="wrong" data-success="right" for="orangeForm-pass">BINES</label>
                    </div>

                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-lemon prefix" style="color:darkblue"></i>
                        <input style="width:4rem" type="text" id="orangeForm-pass" class="form-control text-center" value="@if(!empty($cosecha->maletas)) {{$cosecha->maletas}}@endif" name="maletas">
                        <label style="color:darkblue" data-error="wrong" data-success="right" for="orangeForm-pass">MALETAS</label>
                    </div>
                    <div class="md-form mb-1 w-50">

                        <i class="fas fa-weight-hanging prefix" style="color:darkblue"></i>
                        <input style="width:4rem" type="text" id="orangeForm-pass" class="form-control text-center" value="@if(!empty($cosecha->toneladas)) {{$cosecha->toneladas}}@endif" name="toneladas">
                        <label style="color:darkblue" data-error="wrong" data-success="right" for="orangeForm-pass">TONELADAS</label>
                    </div>
                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-weight prefix" style="color:darkblue"></i>
                        <input style="width:4rem" type="text" id="orangeForm-pass" class="form-control text-center" value="@if(!empty($cosecha->prom_kg_bin)) {{$cosecha->prom_kg_bin}}@endif" name="prom_kg_bin">
                        <label style="color:darkblue" data-error="wrong" data-success="right" for="orangeForm-pass">PROMEDIO KG/BIN</label>
                    </div>
                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-user prefix" style="color:darkblue"></i>
                        <input style="width:6rem" type="text" id="orangeForm-pass" class="form-control text-center" value="@if(!empty($cosecha->supervisor)) {{$cosecha->supervisor}}@endif" name="supervisor">
                        <label style="color:darkblue" data-error="wrong" data-success="right" for="orangeForm-pass" s>SUPERVISOR</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="width:100%">
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary" action="{{url('/modalcosecha/'.$cosecha->id) }}">
                        {{ __('Grabar') }}
                    </button>
                    
                    <a class="btn btn-deep-orange" href="{{action('cosechaController@vercosechaPDF', $cosecha->id)}}">Imprimir</a>
                    <form method="POST" action="{{url('/borrar_cosecha/'.$cosecha->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button hidden="true" type="submit" onclick="return confirm('¿Desea eliminar el parte de cosecha?')" id="borrar" class="btn btn-danger btn-rounded mb-1 btn-sm m-0 text-center"> BORRAR
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>