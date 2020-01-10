@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header green text-white text-center">{{ __('CONTROL DE FACTURACION Y PAGO') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/nuevo_control') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="quincena" class="col-md-4 col-form-label text-md-right">{{ __('QUINCENA') }}</label>

                            <div class="col-md-6">
                                <input id="quincena" type="text" class="form-control @error('quincena') is-invalid @enderror" name="quincena" value="{{ old('quincena') }}" required autocomplete="quincena" autofocus>

                                @error('quincena')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_factura" class="col-md-4 col-form-label text-md-right">{{ __('Nº DE FACTURA') }}</label>

                            <div class="col-md-6">
                                <input id="num_factura" type="text" class="form-control @error('num_factura') is-invalid @enderror" name="num_factura" value="{{ old('num_factura') }}" required autocomplete="num_factura">

                                @error('num_factura')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="importe" class="col-md-4 col-form-label text-md-right">{{ __('IMPORTE FACTURA') }}</label>

                            <div class="col-md-6">
                                <input id="importe" type="number" class="form-control @error('importe') is-invalid @enderror" name="importe"  value="{{ old('importe') }}" required autocomplete="importe">

                                @error('importe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    
         
               
                         
                    <div class="form-group row">   

                        <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE') }}</label>
                    
                        <select class="mdb-select md-form colorful-select dropdown-primary" name="id_cliente">
                            <option selected>Elegir Cliente</option>
                            @foreach($clientes as $cliente)
                         
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                           
                            @endforeach
                           
                        </select>                              
                        
                    </div>  
                         
                        
<!--
                        <div class="form-group row">
                            <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE') }}</label>

                            <div class="col-md-6">
                                <input id="id_cliente" type="text" class="form-control @error('id_cliente') is-invalid @enderror" name="id_cliente" value="{{ old('id_cliente') }}" required autocomplete="id_cliente">

                                @error('id_cliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="retencion" class="col-md-4 col-form-label text-md-right">{{ __('RETENCION') }}</label>

                            <div class="col-md-6">
                                <input id="retencion" type="number" class="form-control @error('retencion') is-invalid @enderror" name="retencion" value="{{ old('retencion') }}" required autocomplete="retencion">

                                @error('retencion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto_cobrado" class="col-md-4 col-form-label text-md-right">{{ __('MONTO COBRADO') }}</label>

                            <div class="col-md-6">
                                <input id="monto_cobrado" type="number" class="form-control @error('monto_cobrado') is-invalid @enderror" name="monto_cobrado" value="{{ old('monto_cobrado') }}" required autocomplete="monto_cobrado">

                                @error('monto_cobrado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gasto_bancario" class="col-md-4 col-form-label text-md-right">{{ __('GASTO BANCARIO') }}</label>

                            <div class="col-md-6">
                                <input id="gasto_bancario" type="number" class="form-control @error('gasto_bancario') is-invalid @enderror" name="gasto_bancario" value="{{ old('gasto_bancario') }}" required autocomplete="gasto_bancario">

                                @error('gasto_bancario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pago_personal" class="col-md-4 col-form-label text-md-right">{{ __('PAGO COSECHEROS') }}</label>

                            <div class="col-md-6">
                                <input id="pago_personal" type="number" class="form-control @error('pago_personal') is-invalid @enderror" name="pago_personal" value="{{ old('pago_personal') }}" required autocomplete="pago_personal">
                                @error('pago_personal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pago_transporte" class="col-md-4 col-form-label text-md-right">{{ __('PAGO TRANSPORTE') }}</label>

                            <div class="col-md-6">
                                <input id="pago_transporte" type="number" class="form-control @error('pago_transporte') is-invalid @enderror" name="pago_transporte" value="{{ old('pago_transporte') }}" required autocomplete="pago_transporte">

                                @error('pago_transporte')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="toneladas" class="col-md-4 col-form-label text-md-right">{{ __('TONELADAS') }}</label>

                            <div class="col-md-6">
                                <input id="toneladas" type="number" class="form-control @error('toneladas') is-invalid @enderror" name="toneladas" value="{{ old('toneladas') }}" required autocomplete="toneladas">

                                @error('toneladas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row shadow-textarea green-border-focus">

                         <!--   <div class="form-group shadow-textarea"> -->
                            <label for="observacion">{{ __('OBSERVACION') }}</label>
                             <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion"value="{{ old('observacion') }} placeholder="Observaciones..."></textarea>
                            </div>

<!--
                            <label for="observacion" class="col-md-4 col-form-label text-md-right">{{ __('OBSERVACION') }}</label>

                            <div class="col-md-6">
                                <input id="observacion" type="text" class="form-control @error('observacion') is-invalid @enderror" name="observacion"value="{{ old('observacion') }}"  >

                                @error('observacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> -->
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Grabar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>

@endsection