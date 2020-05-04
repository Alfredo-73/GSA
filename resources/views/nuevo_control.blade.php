@extends('layouts.app1')

@section('content')
<script src="../js/validacion_nuevo_control.js"></script>

<div class="row container-fluid col-10 mt-3" id="contenido">
    <div class="col-6 mx-auto mt-5">
        <div class="card">
            <div class="card-header text-white text-center" style="background-color:darkblue; font-size:25px">NUEVO CONTROL DE FACTURACION Y PAGO</div>

            <form method="POST" action="{{ url('/nuevo_control') }}" onsubmit="return validar_control(this)" name="formulario" id="formulario">
                @csrf

                <!-- <div class="row col-8  mt-4 mx-auto">
                    <label for="quincena_id" class="col-form-label text-md-right">QUINCENA</label>
                    <select id="id_quincena" class="selectpicker show-menu-arrow" name="quincena_id" data-style="btn-success" data-width="auto">
                        <option id="id_quincena" selected>Elegir Quincena</option>
                        @foreach($quincenas as $quincena)
                        <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                        @endforeach
                    </select>


                    <label for="id_cliente" class="col-form-label text-md-right ml-3">CLIENTE</label>
                    <select id="id_cliente" class="selectpicker show-menu-arrow" name="id_cliente" data-style="btn-success" data-width="auto">
                        <option id="id_cliente" selected>Elegir Cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row col-10 mx-auto">
                    <div class="input-group col-6 mt-4 d-flex justify-content-center align-items-center container">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>Nº DE FACTURA&nbsp;&nbsp;&nbsp;</strong></span>
                        </div>
                        <input id="num_factura" type="text" name="num_factura" value="{{ old('num_factura') }}" aria-label=" name" class="form-control">
                    </div>


                    <div class="input-group col-6 mt-4 d-flex justify-content-center align-items-center container">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>IMPORTE FACTURA&nbsp;&nbsp;&nbsp;</strong></span>
                        </div>
                        <input id="importe" type="double" name="importe" value="{{ old('importe') }}" aria-label=" name" class="form-control">
                    </div>
                </div>

                <div class="row col-10 mx-auto">
                    <div class="input-group col-6 mt-4 d-flex justify-content-center align-items-center container">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>RETENCION&nbsp;&nbsp;&nbsp;</strong></span>
                        </div>
                        <input id="retencion" type="double" name="retencion" value="{{ old('retencion') }}" aria-label=" name" class="form-control">
                    </div>


                    <div class="input-group col-6 mt-4 d-flex justify-content-center align-items-center container">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>MONTO COBRADO&nbsp;&nbsp;&nbsp;</strong></span>
                        </div>
                        <input id="monto_cobrado" type="double" name="monto_cobrado" value="{{ old('monto_cobrado') }}" aria-label=" name" class="form-control">
                    </div>
                </div>

                <div class="row col-10 mx-auto">
                    <div class="input-group col-6 mt-4 d-flex justify-content-center align-items-center container">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>GASTO BANCARIO&nbsp;&nbsp;&nbsp;</strong></span>
                        </div>
                        <input id="gasto_bancario" type="double" aria-label=" name" class="form-control " name="gasto_bancario" value="{{ old('gasto_bancario') }}">
                    </div>


                    <div class="input-group col-6 mt-4 d-flex justify-content-center align-items-center container">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>PAGO COSECHEROS&nbsp;&nbsp;&nbsp;</strong></span>
                        </div>
                        <input id="pago_personal" type="double" name="pago_personal" value="{{ old('pago_personal') }}" aria-label=" name" class="form-control">
                    </div>
                </div>

                <div class="row col-10 mx-auto">
                    <div class="input-group col-6 mt-4 d-flex justify-content-center align-items-center container">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>PAGO TRANSPORTE&nbsp;&nbsp;&nbsp;</strong></span>
                        </div>
                        <input id="pago_transporte" type="double" aria-label="name" class="form-control" name="pago_transporte" value="{{ old('pago_transporte') }}">
                    </div>


                    <div class="input-group col-6 mt-4 d-flex justify-content-center align-items-center container">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>TONELADAS&nbsp;&nbsp;&nbsp;</strong></span>
                        </div>
                        <input id="toneladas" type="double" aria-label="name" class="form-control" name="toneladas" value="{{ old('toneladas') }}">
                    </div>
                </div>

                <div class="container-fluid col-10 mt-2">
                    <div class="form-group row shadow-textarea green-border-focus">
                        <label for="observacion">OBSERVACIONES</label>
                        <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion">{{ old('observacion') }}</textarea>
                    </div>
                </div>-->


                <div class="row col-4 mx-auto mt-3 mb-3 justify-content-around">
                    <!--<label for="quincena_id" class="col-form-label text-md-right">QUINCENA</label>-->
                    <label class="input-group-text" for="gender3">QUINCENA</label>
                    <select class="custom-select" id="gender3" id="id_quincena">
                        <option selected>Elegir Quincena</option>
                        @foreach($quincenas as $quincena)
                        <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <!--<select id="id_quincena" name="quincena_id" data-style="btn-success" data-width="auto">
                        <option id="id_quincena" selected>Elegir Quincena</option>
                        @foreach($quincenas as $quincena)
                        <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                        @endforeach
                    </select>-->

                <div class="row col-4 mx-auto mt-3 mb-3 justify-content-around">
                    <label for="id_cliente" class="col-form-label text-md-right ml-3">CLIENTE</label>
                    <select id="id_cliente" class="selectpicker show-menu-arrow" name="id_cliente" data-style="btn-success" data-width="auto">
                        <option id="id_cliente" selected>Elegir Cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer justify-content-around" style="width:100%"></div>

                <div class="row justify-content-center mb-4">
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
                                <label class="">IMPORTE FACTURA</label>
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

                <div class="modal-footer justify-content-around" style="width:100%"></div>

                <div class="row justify-content-center mb-4">
                    <div class="col-8 col-sm-10 col-md-10">
                        <div class="row justify-content-center  text-center">
                            <div class="form-group col-sm-9 col-lg-6">
                                <label class="pt-2">RETENCION</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="retencion" type="double" name="retencion" value="{{ old('retencion') }}" aria-label=" name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-9 col-lg-6">
                                <label class="pt-2">MONTO COBRADO</label>
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

                <div class="modal-footer justify-content-around" style="width:100%"></div>

                <div class="row justify-content-center mb-4">
                    <div class="col-8  col-sm-10 col-md-10">
                        <div class="row justify-content-center  text-center">
                            <div class="form-group col-sm-9 col-lg-6">
                                <label class="pt-2">GASTO BANCARIO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="gasto_bancario" type="double" aria-label=" name" class="form-control " name="gasto_bancario" value="{{ old('gasto_bancario') }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-9 col-lg-6">
                                <label class="pt-2">PAGO COSECHA</label>
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

                <div class="modal-footer justify-content-around" style="width:100%"></div>

                <div class="row justify-content-center mb-4">
                    <div class="col-8  col-sm-10 col-md-10">
                        <div class="row justify-content-center text-center">
                            <div class="form-group col-sm-9 col-lg-6">
                                <label class="pt-2" for="price">PAGO TRANSPORTE</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&nbsp;$&nbsp;</div>
                                    </div>
                                    <!-- <input type="number" name="price" id="price" class="form-control">-->
                                    <input id="pago_transporte" type="double" aria-label="name" class="form-control" name="pago_transporte" value="{{ old('pago_transporte') }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-9 col-lg-6">
                                <label class="pt-2" for="price">TONELADAS</label>
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
                <div class="modal-footer" style="width:100%"></div>
                <div class="container-fluid col-10 mt-2">
                    <div class="form-group row shadow-textarea green-border-focus">
                        <label for="observacion">OBSERVACIONES</label>
                        <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion">{{ old('observacion') }}</textarea>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-8 col-md-4">
                            <label class="text-muted">With Prepend</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="gender3">QUINCENA</label>
                                </div>
                                <select class="custom-select" id="gender3" id="id_quincena">
                                    <option selected>Elegir Quincena</option>
                                    @foreach($quincenas as $quincena)
                                    <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!--<div class="form-group row">
                            <label for="num_factura" class="col-md-4 col-form-label text-md-right">Nº DE FACTURA</label>
                            <div class="col-md-6">
                                <input id="num_factura" type="text" class="form-control" name="num_factura" value="{{ old('num_factura') }}">
                            </div>
                        </div>-->

                            <!--<div class="form-group row">
                                <label for="importe" class="col-md-4 col-form-label text-md-right">IMPORTE FACTURA</label>
                                <div class="col-md-6">
                                    <input id="importe" type="double" class="form-control" name="importe" value="{{ old('importe') }}">
                                </div>
                            </div>-->


                            <!--<div class="form-group row">
                                <label for="id_cliente" class="col-md-4 col-form-label text-md-right">CLIENTE</label>
                                <select id="id_cliente" class="selectpicker show-menu-arrow" name="id_cliente" data-style="btn-success" data-width="auto">
                                    <option id="id_cliente" selected>Elegir Cliente</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>-->

                            <!--<div class="form-group row">
                                <label for="retencion" class="col-md-4 col-form-label text-md-right">RETENCION</label>
                                <div class="col-md-6">
                                    <input id="retencion" type="double" class="form-control" name="retencion" value="{{ old('retencion') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="monto_cobrado" class="col-md-4 col-form-label text-md-right">MONTO COBRADO</label>
                                <div class="col-md-6">
                                    <input id="monto_cobrado" type="double" class="form-control" name="monto_cobrado" value="{{ old('monto_cobrado') }}">
                                </div>
                            </div>-->


                            <!--<div class="form-group row">
                                <label for="gasto_bancario" class="col-md-4 col-form-label text-md-right">GASTO BANCARIO</label>
                                <div class="col-md-6">
                                    <input id="gasto_bancario" type="double" class="form-control " name="gasto_bancario" value="{{ old('gasto_bancario') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pago_personal" class="col-md-4 col-form-label text-md-right">PAGO COSECHEROS</label>
                                <div class="col-md-6">
                                    <input id="pago_personal" type="double" name="pago_personal" value="{{ old('pago_personal') }}">
                                </div>
                            </div>-->

                            <!--<div class="form-group row">
                    <label for="pago_transporte" class="col-md-4 col-form-label text-md-right">PAGO TRANSPORTE</label>
                    <div class="col-md-6">
                        <input id="pago_transporte" type="double" class="form-control" name="pago_transporte" value="{{ old('pago_transporte') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="toneladas" class="col-md-4 col-form-label text-md-right">TONELADAS</label>
                    <div class="col-md-6">
                        <input id="toneladas" type="double" class="form-control" name="toneladas" value="{{ old('toneladas') }}">
                    </div>
                </div>-->

                            <!--<div class="form-group row shadow-textarea green-border-focus">
                    <label for="observacion">OBSERVACIONES</label>
                    <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion">{{ old('observacion') }}</textarea>
                </div>-->


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>Grabar</button>
                                    <a class="fas fa-undo" role="button" href={{ url('/control_quincenal') }} style='margin-left:5rem' style="cursor:pointer" ,name="Regresar">Regresar</a>
                                </div>
                            </div>
            </form>
        </div>
    </div>
</div>
@endsection