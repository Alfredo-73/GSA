@extends('layouts.app')


@section('content')

<div class="container mt-5">
    <section>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white text-center " style=" background-color:darkblue">{{ __('MODIFICACION CLIENTE') }}</div>
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
                        <form method="POST" action="/modif_cliente/{{$cliente->id}}">
                            @csrf
                            {{method_field('PUT')}}

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $cliente->nombre }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cuit" class="col-md-4 col-form-label text-md-right">{{ __('CUIT') }}</label>

                                <div class="col-md-6">
                                    <input id="cuit" type="text" class="form-control" name="cuit" value="{{ $cliente->cuit }}">

                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>
                                        {{ __('Grabar') }}
                                    </button>
                                    <a class="fas fa-undo" role="button" href={{ url('/abm_cliente') }} style='margin-left:5rem' style="cursor:pointer" name="Regresar" title="Volver al listado">Regresar</a>

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


