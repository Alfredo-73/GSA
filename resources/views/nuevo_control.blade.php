@extends('layouts.app1')

@section('content')
<script src="../js/validacion_nuevo_control.js"></script>

<div class="row container-fluid col-8 mt-1" id="contenido">
    <div class="col-6 mx-auto mt-0">
        <div class="card">
            <div class="card-header text-white text-center text-truncate" style="background-color:darkblue; font-size:1.5rem">NUEVO CONTROL DE FACTURACION Y PAGO</div>

            <form method="POST" action="{{ url('/nuevo_control') }}" onsubmit="return validar_control(this)" name="formulario" id="formulario">
                @csrf


                <div class="row mx-auto" style="width: 85%;">
                    <div class="col-8 col-md-6 mt-2 mb-2">
                        <!--<label for="quincena_id" class="col-form-label text-md-right">QUINCENA</label>-->
                        <label class="input-group-text justify-content-center" for="gender3">QUINCENA</label>
                        <select class="custom-select" id="quincena_id" name="quincena_id">
                            <option selected>Elegir Quincena</option>
                            @foreach($quincenas as $quincena)
                            <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-8 col-md-6 mt-2">
                        <!--<label for="quincena_id" class="col-form-label text-md-right">QUINCENA</label>-->
                        <label for="id_cliente" class="input-group-text justify-content-center" for="gender3">CLIENTE</label>
                        <select class="custom-select" id="id_cliente" name="id_cliente">
                            <option selected>Elegir Cliente</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="modal-footer" style="width:100%; padding-top:0px"></div>

                <div class="row justify-content-center">
                    <div class="col-8 col-sm-10 col-md-10">
                        <div class="row justify-content-center text-center">
                            <div class="form-group col-sm-9 col-lg-6">
                                <label class="">FACTURA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nº</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="num_factura" type="text" name="num_factura" value="{{ old('num_factura') }}" aria-label=" name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-9 col-lg-6">
                                <label>IMPORTE FACTURA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="importe" type="double" name="importe" value="{{ old('importe') }}" aria-label=" name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-around" style="width:100%; padding-top:0px"></div>

                <div class="row justify-content-center">
                    <div class="col-8 col-sm-10 col-md-10">
                        <div class="row justify-content-center  text-center">
                            <div class="form-group col-sm-9 col-lg-6">
                                <label>RETENCION</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="retencion" type="double" name="retencion" value="{{ old('retencion') }}" aria-label=" name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-9 col-lg-6">
                                <label>MONTO COBRADO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="monto_cobrado" type="double" name="monto_cobrado" value="{{ old('monto_cobrado') }}" aria-label=" name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-around" style="width:100%; padding-top:0px"></div>

                <div class="row justify-content-center">
                    <div class="col-8  col-sm-10 col-md-10">
                        <div class="row justify-content-center  text-center">
                            <div class="form-group col-sm-9 col-lg-6">
                                <label>GASTO BANCARIO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="gasto_bancario" type="double" aria-label=" name" class="form-control " name="gasto_bancario" value="{{ old('gasto_bancario') }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-9 col-lg-6">
                                <label>PAGO COSECHA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="pago_personal" type="double" name="pago_personal" value="{{ old('pago_personal') }}" aria-label=" name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-around" style="width:100%; padding-top:0px"></div>

                <div class="row justify-content-center">
                    <div class="col-8  col-sm-10 col-md-10">
                        <div class="row justify-content-center text-center">
                            <div class="form-group col-sm-9 col-lg-6">
                                <label>PAGO TRANSPORTE</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="pago_transporte" type="double" aria-label="name" class="form-control" name="pago_transporte" value="{{ old('pago_transporte') }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-9 col-lg-6">
                                <label>TONELADAS</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Tn</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="toneladas" type="double" aria-label="name" class="form-control" name="toneladas" value="{{ old('toneladas') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="width:100%; padding-top:0px"></div>
                <div class="container-fluid col-10">
                    <div class="form-group row shadow-textarea green-border-focus">
                        <label for="observacion">OBSERVACIONES</label>
                        <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion">{{ old('observacion') }}</textarea>
                    </div>
                </div>

                <!--<div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>Grabar</button>
                        <a class="fas fa-undo" role="button" href={{ url('/control_quincenal') }} style='margin-left:5rem' style="cursor:pointer" ,name="Regresar">Regresar</a>
                    </div>
                </div>-->

                <div class="row justify-content-center mt-3">
                    <div class="form-group col-md-6 col-form-label text-center">
                        <button type="submit" class="btn btn-success">GRABAR</button>
                        <a class="btn btn-primary" href="{{ ('control_quincenal') }}"> Regresar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection