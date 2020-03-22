@extends('layouts.app')
@section('scripts')
@endsection
@section('content')
<script src="../js/validacion.js"></script>
<div class="container mt-5">
    <section>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color:darkblue">{{ __('ALTA DE EMPLEADO NUEVO') }}</div>
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
                        <form method="POST" action="{{ url('/nuevo_empleado') }}" onsubmit="return validar(this)" name="formulario" id="formulario">
                            @csrf
                            <div class="form-group row">
                                <label for="legajo" class="col-md-4 col-form-label text-md-right">{{ __('LEGAJO') }}</label>

                                <div class="col-md-6">
                                    <input id="legajo" type="text" class="form-control" name="legajo" value="{{ old('legajo') }}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('APELLIDO') }}</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}">


                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                                <div class="col-md-6">
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}">


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cuil" class="col-md-4 col-form-label text-md-right">{{ __('CUIL') }}</label>

                                <div class="col-md-6">
                                    <input id="cuil" type="text" class="form-control" name="cuil" value="{{ old('cuil') }}">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha_ingreso" class="col-md-4 col-form-label text-md-right">{{ __('FECHA INGRESO') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_ingreso" type="date" class="form-control " name="fecha_ingreso" value="{{ old('fecha_ingreso') }}">
                                </div>
                            </div>
                            <div class="form-group row" id="id_empresa">
                                <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('EMPRESA') }}</label>

                         <!--   <div class="form-group shadow-textarea"> -->
                            <label for="observacion">{{ __('OBSERVACION') }}</label>
                             <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion">{{ old('observacion') }}</textarea>
                            </div>

                                    <option id="empresa" value="{{$empresa->id}}">{{$empresa->razon_social}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row" id="id_capataz">
                                <label for="id_capataz" class="col-md-4 col-form-label text-md-right">{{ __('CAPATAZ') }}</label>
                                <select id="capat" class="selectpicker show-menu-arrow" name="id_capataz" data-style="btn-success" data-width="auto">
                                    <option id="capat">Elegir Capataz</option>
                                    @foreach($capataz as $capat)

                                    <option id="capat" value="{{$capat->id}}">{{$capat->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group row shadow-textarea green-border-focus">

                                <!--   <div class="form-group shadow-textarea"> -->
                                <label for="observaciones">{{ __('OBSERVACION') }}</label>
                                <textarea class="form-control z-depth-1" id="observaciones" rows="3" name="observaciones">{{ old('observaciones') }}</textarea>
                            </div>

                    </div>
                    <div class="form-group row mb-0">

                        <div class="col-md-6 offset-md-4">
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