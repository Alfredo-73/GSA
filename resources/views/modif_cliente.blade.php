@extends('layouts.app')


@section('content')

<div class="container mt-5">
    <section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header green text-white text-center">{{ __('MODIFICACION CLIENTE') }}</div>

                <div class="card-body">
                    <form method="POST" action="/modif_cliente/{{$cliente->id}}" >
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID')}} {{$cliente->id}}</label>

                            
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $cliente->nombre }}" required autocomplete="nombre">

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
                                <input id="cuit" type="text" class="form-control @error('cuit') is-invalid @enderror" name="cuit"  value="{{ $cliente->cuit }}" required autocomplete="cuit">

                                @error('cuit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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