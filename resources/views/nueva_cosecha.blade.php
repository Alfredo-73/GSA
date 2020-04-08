@extends('layouts.app1')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue">{{ __('PARTE DIARIO COSECHA') }}</div>
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
                    <form method="POST" action="{{ url('/nueva_cosecha') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('FECHA') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE') }}</label>

                            <select class="selectpicker show-menu-arrow" name="id_cliente" data-style="btn-success" data-width="auto">
                                <option selected>Elegir Cliente</option>
                                @foreach($clientes as $cliente)

                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>

                                @endforeach

                            </select>

                        </div>
                        <div class="form-group row">
                            <label for="id_capataz" class="col-md-4 col-form-label text-md-right">{{ __('CAPATAZ') }}</label>

                            <select class="selectpicker show-menu-arrow" name="id_capataz" data-style="btn-success" data-width="auto">
                                <option selected>Elegir Capataz</option>
                                @foreach($capataz as $capat)

                                <option value="{{$capat->id}}">{{$capat->nombre}}</option>

                                @endforeach

                            </select>

                        </div>
                        <!--
                        <div class="form-group row">
                            <label for="capataz" class="col-md-4 col-form-label text-md-right">{{ __('CAPATAZ') }}</label>

                            <div class="col-md-6">
                                <input id="capataz" type="text" class="form-control @error('capataz') is-invalid @enderror" name="capataz"  value="{{ old('capataz') }}" required autocomplete="capataz">

                                @error('capataz')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="jornales" class="col-md-4 col-form-label text-md-right">{{ __('JORNALES') }}</label>

                            <div class="col-md-6">
                                <input id="jornales" type="text" class="form-control" name="jornales" value="{{ old('jornales') }}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cosecheros" class="col-md-4 col-form-label text-md-right">{{ __('COSECHEROS') }}</label>

                            <div class="col-md-6">
                                <input id="cosecheros" type="text" class="form-control @error('cosecheros') is-invalid @enderror" name="cosecheros" value="{{ old('cosecheros') }}" >

                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bines" class="col-md-4 col-form-label text-md-right">{{ __('BINES') }}</label>

                            <div class="col-md-6">
                                <input id="bines" type="text" class="form-control @error('bines') is-invalid @enderror" name="bines" value="{{ old('bines') }}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maletas" class="col-md-4 col-form-label text-md-right">{{ __('MALETAS') }}</label>

                            <div class="col-md-6">
                                <input id="maletas" type="text" class="form-control " name="maletas" value="{{ old('maletas') }}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="toneladas" class="col-md-4 col-form-label text-md-right">{{ __('TONELADAS') }}</label>

                            <div class="col-md-6">
                                <input id="toneladas" type="text" class="form-control" name="toneladas" value="{{ old('toneladas') }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prom_kg_bin" class="col-md-4 col-form-label text-md-right">{{ __('PROMEDIO KG/BIN') }}</label>

                            <div class="col-md-6">
                                <input id="prom_kg_bin" type="text" class="form-control" name="prom_kg_bin" value="{{ old('prom_kg_bin') }}" >
                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="supervisor" class="col-md-4 col-form-label text-md-right">{{ __('SUPERVISOR') }}</label>

                            <div class="col-md-6">
                                <input id="supervisor" type="text" class="form-control " name="supervisor" value="{{ old('supervisor') }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="transportista" class="col-md-4 col-form-label text-md-right">{{ __('TRANSPORTISTA') }}</label>

                            <div class="col-md-6">
                                <input id="transportista" type="text" class="form-control " name="transportista" value="{{ old('transportista') }}">

                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>
                                    {{ __('Grabar') }}
                                </button>
                                <a class="fas fa-undo" role="button" href={{ url('/cosecha') }} style='margin-left:5rem' style="cursor:pointer" ,name="Regresar"> Regresar</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection