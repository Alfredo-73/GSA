@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue">{{ __('SANCIONES') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/nueva_sancion') }}">
                        @csrf

                                      
                        <div class="form-group row">
                            <label for="legajo" class="col-md-4 col-form-label text-md-right">{{ __('LEGAJO') }}</label>

                            <div class="col-md-6">
                                <input id="legajo" type="text" class="form-control @error('legajo') is-invalid @enderror" name="legajo" value="{{ old('legajo') }}" required autocomplete="legajo" autofocus>

                                @error('legajo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre">

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('APELLIDO') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"  value="{{ old('apellido') }}" required autocomplete="apellido">

                                @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>
                            
                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni">

                                @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="dias" class="col-md-4 col-form-label text-md-right">{{ __('DIAS') }}</label>
                            
                            <div class="col-md-6">
                                <input id="dias" type="number" class="form-control @error('dias') is-invalid @enderror" name="dias" value="{{ old('dias') }}" required autocomplete="dias">
                                
                                @error('dias')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('FECHA SANCION') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha">

                                @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

        <!--
                        <div class="form-group row">
                            <label for="reincorporacion" class="col-md-4 col-form-label text-md-right">{{ __('FECHA REINCORPORACION') }}  </label>

                            <div class="col-md-6">
                                <input id="reincorporacion" type="date" class="form-control @error('reincorporacion') is-invalid @enderror" name="reincorporacion" value= "{{ old('reincorporacion') }}"  required autocomplete="reincorporacion">
                                @error('reincorporacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('MOTIVO') }}</label>
                            
                            <div class="col-md-6">
                                <input id="motivo" type="text" class="form-control @error('motivo') is-invalid @enderror" name="motivo" value="{{ old('motivo') }}" required autocomplete="motivo">

                                @error('motivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
                        <div class="form-group row">   
    
                            <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE') }}</label>
                        
                                <select class="selectpicker show-menu-arrow" name="id_cliente" data-style="btn-success" data-width="auto">
                                <option selected>Elegir Cliente</option>
                                @foreach($clientes as $cliente)
                             
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                               
                                @endforeach
                               
                            </select>                              
                            
                        </div>  
                             
                        <div class="form-group row shadow-textarea green-border-focus">

                         <!--   <div class="form-group shadow-textarea"> -->
                            <label for="observacion">{{ __('OBSERVACION') }}</label>
                             <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion">{{ old('observacion') }}</textarea>
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
                                <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>
                                    {{ __('Grabar') }}
                                </button>
                                <a class="fas fa-undo" role="button" href=  {{ url('/control_quincenal') }} style='margin-left:5rem' style="cursor:pointer",name="Regresar" >  Regresar</a>
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