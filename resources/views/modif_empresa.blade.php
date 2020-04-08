@extends('layouts.app1')


@section('content')

<div class="container mt-5" id="contenido">
    <section>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white text-center " style=" background-color:darkblue">{{ __('MODIFICACION EMPRESA') }}</div>
                   <div class="mt-3">
                        <ul style='color:red' class="text-center">
                            @foreach ($errors->all() as $error)
                            <li style='list-style:none'>
                                {{$error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
 
                    <div class="card-body">
                        <form method="POST" action="/modif_empresa/{{$empresa->id}}">
                            @csrf
                            {{method_field('PUT')}}

                            <div class="form-group row">
                                <label for="razon_social" class="col-md-4 col-form-label text-md-right">{{ __('RAZON SOCIAL') }}</label>

                                <div class="col-md-6">
                                    <input id="razon_social" type="text" class="form-control" name="razon_social" value="{{ $empresa->razon_social }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cuit" class="col-md-4 col-form-label text-md-right">{{ __('CUIT') }}</label>

                                <div class="col-md-6">
                                    <input id="cuit" type="text" class="form-control" name="cuit" value="{{ $empresa->cuit }}">

                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="domicilio" class="col-md-4 col-form-label text-md-right">{{ __('DOMICILIO') }}</label>

                                <div class="col-md-6">
                                    <input id="domicilio" type="text" class="form-control" name="domicilio" value="{{ $empresa->domicilio }}">

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>
                                        {{ __('Grabar') }}
                                    </button>
                                    <a class="fas fa-undo" role="button" href={{ url('/abm_empresa') }} style='margin-left:5rem' style="cursor:pointer" name="Regresar" title="Volver al listado">Regresar</a>

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


