@extends('layouts.app1')

@section('content')

<div class="container mt-5" id="contenido">
    <section>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color:darkblue">{{ __('MODIFICACION DATOS PERSONALES') }}</div>
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
                        <form method="POST" action="/modif_empleado/{{$empleado->id}}">
                            @csrf
                            {{method_field('PUT')}}

                            <div class="form-group row">

                                <label for="legajo" class="col-md-4 col-form-label text-md-right">{{ __('LEGAJO') }}</label>

                                <div class="col-md-6">
                                    <input id="legajo" type="text" class="form-control" name="legajo" value="{{ $empleado->legajo }}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $empleado->nombre }}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('APELLIDO') }}</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ $empleado->apellido }}">

                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>
                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input id="dni" type="text" class="form-control" name="dni" value="{{ $empleado->dni }}">

                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="cuil" class="col-md-4 col-form-label text-md-right">{{ __('CUIL') }}</label>

                                <div class="col-md-6">
                                    <input id="cuil" type="text" class="form-control" name="cuil" value="{{  $empleado->cuil }}">


                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="fecha_ingreso" class="col-md-4 col-form-label text-md-right">{{ __('FECHA INGRESO') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_ingreso" type="date" class="form-control " name="fecha_ingreso" value="{{  $empleado->fecha_ingreso}}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha_egreso" class="col-md-4 col-form-label text-md-right">{{ __('FECHA EGRESO') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_egreso" type="date" class="form-control " name="fecha_egreso" value="{{  $empleado->fecha_egreso }}">
                                </div>
                            </div>



                            <div class="form-group row">

                                <label for="id_empresa" class="col-md-4 col-form-label text-md-right">{{ __('EMPRESA') }}</label>

                                <select class="selectpicker show-menu-arrow" name="id_empresa" data-style="btn-success" data-width="auto" value="{{$empleado->id_empresa}}">
                                    <option value="{{$empleado->id_empresa}}" selected></option>
                                    @foreach($empresas as $empresa)

                                    <option value="{{$empresa->id}}">{{$empresa->razon_social}}</option>

                                    @endforeach

                                </select>

                            </div>
                            <div class="form-group row">

                                <label for="id_capataz" class="col-md-4 col-form-label text-md-right">{{ __('CAPATAZ') }}</label>

                                <select class="selectpicker show-menu-arrow" name="id_capataz" data-style="btn-success" data-width="auto">
                                    <option value="{{$empleado->id_capataz}}" selected></option>
                                    @foreach($capataz as $capat)

                                    <option value="{{$capat->id}}">{{$capat->nombre}}</option>

                                    @endforeach

                                </select>

                            </div>



                            <div class="form-group row shadow-textarea green-border-focus">

                                <!--   <div class="form-group shadow-textarea"> -->
                                <label for="observaciones">{{ __('OBSERVACION') }}</label>
                                <textarea class="form-control z-depth-1" id="observaciones" rows="3" name="observaciones">{{ $empleado->observaciones }}</textarea>
                            </div>

                    


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>
                                    {{ __('Grabar') }}
                                </button>
                                <a class="fas fa-undo" role="button" href={{ url('/empleado') }} style='margin-left:5rem' style="cursor:pointer" ,name="Regresar"> Regresar</a>

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