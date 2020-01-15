<div class="modal fade" id="modalcosecha{{ $cosecha->id }}" tabindex="3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="/modalcosecha/{{$cosecha->id}}" >
                        @csrf
                        {{method_field('PUT')}}
                <div class="modal-header">
                    <h5 class="modal-title w-100 font-weight-bold text-center">FECHA: @if(!empty($cosecha->fecha)) {{$cosecha->fecha}}@endif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                
                    <div class="md-form mb-1" style="width:100%">
                        
                        <!--<input type="text" id="orangeForm-name" class="form-control" value="@if(!empty($cosecha->id_cliente)) {{$cosecha->id_cliente}}@endif">-->
                        <label data-error="wrong" data-success="right" for="orangeForm-name">{{ __('CLIENTE') }} @if(!empty($cosecha->id_cliente)) {{$cosecha->id_cliente}}@endif</label>
                    </div>
                    <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="orangeForm-email" class="form-control" value="@if(!empty($cosecha->id_capataz)) {{$cosecha->id_capataz}}@endif" name="id_capataz">
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Capataz </label>
                    </div>

                    <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-users prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($cosecha->jornales)) {{$cosecha->jornales}}@endif" name="jornales">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">{{ __('Jornales') }}</label>
                    </div>

                    <div class="md-form mb-1" style="width:50%">
                        <i class="fas fa-users prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($cosecha->cosecheros)) {{$cosecha->cosecheros}}@endif" name="cosecheros">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Cosecheros </label>
                    </div>

                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-truck-loading prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($cosecha->bines)) {{$cosecha->bines}}@endif" name="bines">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Bines </label>
                    </div>

                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-lemon prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($cosecha->maletas)) {{$cosecha->maletas}}@endif" name="maletas">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Maletas </label>
                    </div>
                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($cosecha->toneladas)) {{$cosecha->toneladas}}@endif" name="toneladas">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Toneladas </label>
                    </div>
                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-weight prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($cosecha->prom_kg_bin)) {{$cosecha->prom_kg_bin}}@endif" name="prom_kg_bin">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Promedio KG/BIN </label>
                    </div>
                    <div class="md-form mb-1 w-50">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="orangeForm-pass" class="form-control" value="@if(!empty($cosecha->supervisor)) {{$cosecha->supervisor}}@endif" name="supervisor">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass"s>Supervisor </label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <!--<a id="modificar" class="btn btn-primary btn-rounded mb-4 btn-sm m-0 text-center" href="/modalcosecha/{{$cosecha->id}}" role="button">Modificar </a>-->
                   <button type="submit" class="btn btn-success">
                                    {{ __('Grabar') }}
                                </button>
                    <button class="btn btn-deep-orange">Imprimir</button>
                    <form method="POST" action="{{ url('/borrar_cosecha/'.$cosecha->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Desea eliminar el parte de cosecha?')" id="borrar" class="btn btn-danger btn-rounded mb-1 btn-sm m-0 text-center"> BORRAR
                    </button>
                </div>
            </div>
        </div>
</div>