@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header green text-white text-center">{{ __('ABM CLIENTES') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/nuevo_cliente') }}" name="tuformulario">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cuit" class="col-md-4 col-form-label text-md-right">{{ __('CUIT') }}</label>

                            <div class="col-md-6">
                                <input id="cuit" type="text" class="form-control @error('cuit') is-invalid @enderror" name="cuit" value="{{ old('cuit') }}" required autocomplete="cuit">

                                @error('cuit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <!--   <input type="button" onclick="pregunta()" value="Enviar"> -->
                               
                                <button type="submit"  class="btn btn-success">
                                    {{ __('Grabar') }}
                                </button> 
                                <a class="fas fa-undo" role="button" href=  {{ url('/abm_cliente') }} style='margin-left:5rem' style="cursor:pointer",name="Regresar" >  Regresar</a>


                                
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