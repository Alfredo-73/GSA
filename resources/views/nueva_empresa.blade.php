@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <section>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color:darkblue">{{ __('ALTA DE EMPRESA') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/nueva_empresa') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="razon_social" class="col-md-4 col-form-label text-md-right">{{ __('RAZON SOCIAL') }}</label>

                                <div class="col-md-6">
                                    <input id="razon_social" type="text" class="form-control @error('razon_social') is-invalid @enderror" name="razon_social" value="{{ old('razon_social') }}" required autocomplete="razon_social" autofocus>

                                    @error('razon_social')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cuit" class="col-md-4 col-form-label text-md-right">{{ __('CUIT') }}</label>

                                <div class="col-md-6">
                                    <input id="cuit" type="text" class="form-control @error('cuit') is-invalid @enderror" name="cuit" value="{{ old('cuit') }}" required autocomplete="cuit" autofocus>

                                    @error('cuit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="domicilio" class="col-md-4 col-form-label text-md-right">{{ __('DOMICILIO') }}</label>

                                <div class="col-md-6">
                                    <input id="domicilio" type="text" class="form-control @error('domicilio') is-invalid @enderror" name="domicilio" value="{{ old('domicilio') }}" required autocomplete="domicilio" autofocus>

                                    @error('domicilio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>
                                        {{ __('Grabar') }}
                                    </button>
                                    <a class="fas fa-undo" role="button" href={{ url('/abm_empresa') }} style='margin-left:5rem' style="cursor:text">Regresar</a>

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