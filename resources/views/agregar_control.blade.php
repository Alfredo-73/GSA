@extends('layouts.app1')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header green text-white text-center">{{ __('CONTROL DE FACTURACION Y PAGO') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('agregar_control') }}">
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
                                <input id="num_factura" type="text" class="form-control @error('email') is-invalid @enderror" name="num_factura" value="{{ old('num_factura') }}" required autocomplete="num_factura">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="importe" class="col-md-4 col-form-label text-md-right">{{ __('IMPORTE FACTURA') }}</label>

                            <div class="col-md-6">
                                <input id="importe" type="text" class="form-control @error('password') is-invalid @enderror" name="importe" required autocomplete="importe">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE') }}</label>

                            <div class="col-md-6">
                                <input id="id_cliente" type="text" class="form-control @error('password') is-invalid @enderror" name="id_cliente" required autocomplete="id_cliente">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="retencion" class="col-md-4 col-form-label text-md-right">{{ __('RETENCION') }}</label>

                            <div class="col-md-6">
                                <input id="retencion" type="text" class="form-control @error('password') is-invalid @enderror" name="retencion" required autocomplete="retencion">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto_cobrado" class="col-md-4 col-form-label text-md-right">{{ __('MONTO COBRADO') }}</label>

                            <div class="col-md-6">
                                <input id="monto_cobrado" type="text" class="form-control @error('password') is-invalid @enderror" name="monto_cobrado" required autocomplete="monto_cobrado">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gasto_bancario" class="col-md-4 col-form-label text-md-right">{{ __('GASTO BANCARIO') }}</label>

                            <div class="col-md-6">
                                <input id="gasto_bancario" type="text" class="form-control @error('gasto_bancario') is-invalid @enderror" name="gasto_bancario" required autocomplete="gasto_bancario">

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
                                <input id="pago_personal" type="text" class="form-control @error('pago_personal') is-invalid @enderror" name="pago_personal" required autocomplete="pago_personal">
pago_personal                         @error('pago_personal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pago_transporte" class="col-md-4 col-form-label text-md-right">{{ __('PAGO TRNSPORTE') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="toneladas" class="col-md-4 col-form-label text-md-right">{{ __('TONELADAS') }}</label>

                            <div class="col-md-6">
                                <input id="toneladas" type="text" class="form-control @error('toneladas') is-invalid @enderror" name="toneladas" required autocomplete="toneladas">

                                @error('toneladas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observacion" class="col-md-4 col-form-label text-md-right">{{ __('OBSERVACION') }}</label>

                            <div class="col-md-6">
                                <input id="observacion" type="textarea" class="form-control @error('observacion') is-invalid @enderror" name="observacion" >

                                @error('observacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
</div>

@endsection