<div class="modal fade" id="modalcosecha{{ $cosecha->id }}" tabindex="3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/modalcosecha/{{$cosecha->id}}">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-header">
                    <h5 class="modal-title w-100 font-weight-bold text-center">PARTE DIARIO DE COSECHA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input hidden="true" type="text" id="orangeForm-name" class="form-control" value="@if(!empty($cosecha->id_cliente)) {{$cosecha->id_cliente}}@endif" name="id_cliente">
                        <input hidden="true" type="text" id="orangeForm-name" class="form-control" value="@if(!empty($cosecha->id_capataz)) {{$cosecha->id_capataz}}@endif" name="id_capataz">
                        <div class="md-form mb-1" style="width:100%">
                            <!--<input type="date" id="orangeForm-name" class="form-control" value="@if(!empty($cosecha->fecha)) {{$cosecha->fecha}}@endif" name="">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Fecha</label>-->
                            <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ $cosecha->fecha }}" required autocomplete="fecha" autofocus>
                            <label>Fecha Cosecha</label>
                            @error('fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="md-form mb-1" style="width:100%">
                            <input type="text" id="orangeForm-name" class="form-control" value="@if(!empty($cosecha->cliente->nombre)) {{$cosecha->cliente->nombre}}@endif" name="nombre">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Cliente</label>
                            <select class="selectpicker show-menu-arrow" name="id_cliente" data-style="btn-success" data-width="auto">
                                <option selected>{{$cosecha->cliente->nombre}}</option>
                                @foreach($clientes as $cliente)

                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>


                                @endforeach

                            </select>
                        </div>
                        <div class="md-form mb-1" style="width:50%">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="orangeForm-email" class="form-control" value="@if(!empty($cosecha->capataz->nombre)) {{$cosecha->capataz->nombre}}@endif" name="nombre">
                            <label data-error="wrong" data-success="right" for="orangeForm-email">Capataz</label>
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
                            <label data-error="wrong" data-success="right" for="orangeForm-pass" s>Supervisor </label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <!--<a id="modificar" class="btn btn-primary btn-rounded mb-4 btn-sm m-0 text-center" href="/modalcosecha/{{$cosecha->id}}" role="button">Modificar </a>-->
                        <button type="submit" class="btn btn-success">
                            {{ __('Grabar') }}
                        </button>
                        <button class="btn btn-deep-orange">Imprimir</button>

                    </div>
                </div>
        </div>
    </div>