@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue">{{ __('CONTROL DE FACTURACION Y PAGO') }}</div>
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
                    <form method="POST" action="{{ url('/nuevo_control') }}">
                        @csrf

                                
                        <div class="form-group row">   

                            <label for="quincena_id" class="col-md-4 col-form-label text-md-right">{{ __('QUINCENA') }}</label>
                    
                            <select class="selectpicker show-menu-arrow" name="quincena_id" data-style="btn-success" data-width="auto">
                                <option selected>Elegir Quincena</option>
                                 @foreach($quincenas as $quincena)
                                
                                 <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                           
                                @endforeach
                           
                             </select>                              
                        
                        </div> 
         

                        <div class="form-group row">
                            <label for="num_factura" class="col-md-4 col-form-label text-md-right">{{ __('Nº DE FACTURA') }}</label>

                            <div class="col-md-6">
                                <input id="num_factura" type="text" class="form-control" name="num_factura" value="{{ old('num_factura') }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="importe" class="col-md-4 col-form-label text-md-right">{{ __('IMPORTE FACTURA') }}</label>

                            <div class="col-md-6">
                                <input id="importe" type="number" class="form-control" name="importe"  value="{{ old('importe') }}" >

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
                            <label for="retencion" class="col-md-4 col-form-label text-md-right">{{ __('RETENCION') }}</label>

                            <div class="col-md-6">
                                <input id="retencion" type="number" class="form-control" name="retencion" value="{{ old('retencion') }}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto_cobrado" class="col-md-4 col-form-label text-md-right">{{ __('MONTO COBRADO') }}</label>

                            <div class="col-md-6">
                                <input id="monto_cobrado" type="number" class="form-control" name="monto_cobrado" value="{{ old('monto_cobrado') }}" >

                         
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gasto_bancario" class="col-md-4 col-form-label text-md-right">{{ __('GASTO BANCARIO') }}</label>

                            <div class="col-md-6">
                                <input id="gasto_bancario" type="number" class="form-control " name="gasto_bancario" value="{{ old('gasto_bancario') }}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pago_personal" class="col-md-4 col-form-label text-md-right">{{ __('PAGO COSECHEROS') }}</label>

                            <div class="col-md-6">
                                <input id="pago_personal" type="number" class="form-control @error('pago_personal') is-invalid @enderror" name="pago_personal" value="{{ old('pago_personal') }}" >
                           
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pago_transporte" class="col-md-4 col-form-label text-md-right">{{ __('PAGO TRANSPORTE') }}</label>

                            <div class="col-md-6">
                                <input id="pago_transporte" type="number" class="form-control" name="pago_transporte" value="{{ old('pago_transporte') }}" >

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="toneladas" class="col-md-4 col-form-label text-md-right">{{ __('TONELADAS') }}</label>

                            <div class="col-md-6">
                                <input id="toneladas" type="number" class="form-control" name="toneladas" value="{{ old('toneladas') }}" >

                            </div>
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