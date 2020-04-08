@extends('layouts.app1')

@section('content')


<div class="container mt-5" id="contenido">
    <section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue">{{ __('CARGA DE NUEVA SANCION DISCIPLINARIA') }}</div>
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
                    <form method="POST" action="/../nueva_sancion/{{$empleado->id}}">
                        @csrf

                                      
                        <div class="form-group row">
                            <label for="legajo" class="col-md-4 col-form-label text-md-right">{{ __('LEGAJO') }}</label>

                            <div class="col-md-6">

                                <input id="orangeForm-pass" type="text" class="form-control"  value="@if(!empty($empleado)){{$empleado->legajo}} @endif" >

                                
                            </div>

                           
                        </div> 

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control"  value="@if(!empty($empleado)){{$empleado->nombre}} @endif" >

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('APELLIDO') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control "   value="@if(!empty($empleado)){{$empleado->apellido}} @endif" >

                                
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>
                            
                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control" name="dni" value="@if(!empty($empleado)){{$empleado->dni}} @endif" >

                               
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="dias" class="col-md-4 col-form-label text-md-right">{{ __('DIAS') }}</label>
                            
                            <div class="col-md-6">
                                <input id="dias" type="number" class="form-control" name="dias" value="{{ old('dias') }}" required autocomplete="dias">
                                
                               
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('FECHA SANCION') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control " name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha">

                                
                            </div>
                        </div>

                        <?php
                        if($_GET) 
                        {
                             $fecha = $_GET['fecha'];
                             $var_fecha = $_GET['dias'] +1;
                            $nueva_fecha = strtotime('+'. $var_fecha .'day', strtotime($fecha));
                            $nueva_fecha = date('Y-m-j', $nueva_fecha);
                        }
                        ?>
                       <!-- <div class="form-group row">
                            <label for="reincorporacion" class="col-md-4 col-form-label text-md-right">{{ __('FECHA REINCORPORACION') }}  </label>

                            <div class="col-md-6">
                                <input id="reincorporacion" type="date" class="form-control"  value="@if(!empty($nueva_fecha)) {{$nueva_fecha}} @endif"  >
                                
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('MOTIVO') }}</label>
                            
                            <div class="col-md-6">
                                <input id="motivo" type="text" class="form-control" name="motivo" value="{{ old('motivo') }}" required autocomplete="motivo">

                               
                            </div>
                        </div>
                        
                        <div class="form-group row">   
    
                            <label for="id_capataz" class="col-md-4 col-form-label text-md-right">{{ __('CAPATAZ') }}</label>
                        
                                <div class="col-md-6">
                                <input id="fecha" type="text" class="form-control "  value="@if(!empty($empleado)){{$empleado->capataz->nombre}} @endif">

                                
                            </div>                       
                            
                        </div>  
                        <div class="form-group row">   
    
                            <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('EMPRESA') }}</label>
                        
                                <div class="col-md-6">
                                <input id="fecha" type="text" class="form-control "  value="@if(!empty($empleado)){{$empleado->empresa->razon_social}} @endif">

                                
                            </div>   
                        </div>  
                             
                        <div class="form-group row shadow-textarea green-border-focus">

                           <label for="observacion">{{ __('OBSERVACION') }}</label>
                             <textarea class="form-control z-depth-1" id="observacion" rows="3" name="observacion">{{ old('observacion') }}</textarea>
                            </div>
                        </div>

                        

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