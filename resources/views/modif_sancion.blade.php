@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue" >{{ __('MODIFICACION SANCION DISCIPLINARIA') }}</div>

                <div class="card-body">
                    <form method="POST" action="/modif_sancion/{{$sancion->id}}" >
                        @csrf
                        {{method_field('PUT')}}
                        <!--
                        <div class="form-group row">
                            <label for="quincena" class="col-md-4 col-form-label text-md-right">{{ __('QUINCENA') }}</label>

                            <div class="col-md-6">
                                <input id="quincena" type="text" class="form-control @error('quincena') is-invalid @enderror" name="quincena" value="{{ $sancion->nombre_quincena }}" required autocomplete="quincena" autofocus>

                                @error('quincena')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->


                    <div class="form-group row">   

                     <label for="legajo" class="col-md-4 col-form-label text-md-right">{{ __('LEGAJO') }}</label>
                   
                    <div class="col-md-6">
                    <select class="selectpicker show-menu-arrow" name="legajo" data-style="btn-success" data-width="auto">
                            <option value="{{$sancion->legajo}}" selected>{{$sancion->quincena->nombre}}</option>
                            @foreach($quincenas as $quincena)
                            
                            <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                            
                           
                         @endforeach
                           
                            </select>                              
                        </div>
                    </div> 

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $sancion->nombre }}" required autocomplete="nombre">

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('IMPORTE FACTURA') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"  value="{{ $sancion->apellido }}" required autocomplete="apellido">

                                @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">   

                            
                            <!--
                                <div class="form-group row">
                                    <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE')  }} {{$control->cliente->nombre}} </label>
                                    
                                    <div class="col-md-6">
                                        <input id="id_cliente" type="number" class="form-control @error('id_cliente') is-invalid @enderror" name="id_cliente" value="{{ $sancion->id_cliente }}" required autocomplete="id_cliente">
                                        
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
                                        <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $sancion->dni }}" required autocomplete="dni">
                                        
                                        @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('FECHA SANCION') }}</label>
                                    
                                    <div class="col-md-6">
                                        <input id="fecha" type="text" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ $sancion->fecha }}" required autocomplete="fecha">
                                        
                                        @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="reincorporacion" class="col-md-4 col-form-label text-md-right">{{ __('FECHA REINCORPORACION') }}</label>
                                    
                                    <div class="col-md-6">
                                        <input id="reincorporacion" type="text" class="form-control @error('reincorporacion') is-invalid @enderror" name="reincorporacion" value="{{ $control->reincorporacion }}" required autocomplete="reincorporacion">
                                        
                                        @error('reincorporacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="dias" class="col-md-4 col-form-label text-md-right">{{ __('DIAS SUSPENDIDO') }}</label>
                                    
                                    <div class="col-md-6">
                                        <input id="dias" type="text" class="form-control @error('dias') is-invalid @enderror" name="dias" value="{{ $control->dias }}" required autocomplete="dias">
                                        @error('dias')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('MOTIVO') }}</label>
                                    
                                    <div class="col-md-6">
                                        <input id="motivo" type="text" class="form-control @error('motivo') is-invalid @enderror" name="motivo" value="{{ $control->motivo }}" required autocomplete="motivo">
                                        
                                        @error('motivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE') }}</label>
                              
           
                               <select class="selectpicker show-menu-arrow" name="id_cliente" data-style="btn-success" data-width="auto">
                                       <option value="{{$sancion->id_cliente}}" selected>{{$sancion->cliente->nombre}}</option>
                                       @foreach($clientes as $cliente)
                                       
                                       <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                       
                                      
                                    @endforeach
                                      
                                       </select>                              
                                   
                                   </div>  
                                    <label for="id_capataz" class="col-md-4 col-form-label text-md-right">{{ __('CAPATAZ') }}</label>
                              
           
                               <select class="selectpicker show-menu-arrow" name="id_capataz" data-style="btn-success" data-width="auto">
                                       <option value="{{$sancion->id_capataz}}" selected>{{$sancion->capataz->nombre}}</option>
                                       @foreach($clientes as $cliente)
                                       
                                       <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                       
                                      
                                    @endforeach
                                      
                                       </select>                              
                                   
                                   </div>  
                                   
                        <div class="form-group row shadow-textarea green-border-focus">

                         <!--   <div class="form-group shadow-textarea"> -->
                            <label for="observacion">{{ __('OBSERVACION') }}</label>
                             <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion"  >{{ $control->observacion }}</textarea>
                            </div>
<!--
                        <div class="form-group row">
                            <label for="observacion" class="col-md-4 col-form-label text-md-right">{{ __('OBSERVACION') }}</label>

                            <div class="col-md-6">
                                <input id="observacion" type="text" class="form-control @error('observacion') is-invalid @enderror" name="observacion"value="{{ $control->observacion }}"  >

                                @error('observacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-2x fa-save mr-2" style="color:white"></i>
                                    {{ __('Grabar') }}
                                </button>
                                 <a class="fas fa-undo" role="button" href=  {{ url('/sancion') }} style='margin-left:5rem' style="cursor:pointer",name="Regresar" >  Regresar</a>
           
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