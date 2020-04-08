@extends('layouts.app1')

@section('content')

<div class="container mt-5" id="contenido">
    <section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue" >{{ __('MODIFICACION CONTROL DE FACTURACION Y PAGO') }}</div>
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
                    <form method="POST" action="/modif_control/{{$control->id}}" >
                        @csrf
                        {{method_field('PUT')}}
                        <!--
                        <div class="form-group row">
                            <label for="quincena" class="col-md-4 col-form-label text-md-right">{{ __('QUINCENA') }}</label>

                            <div class="col-md-6">
                                <input id="quincena" type="text" class="form-control @error('quincena') is-invalid @enderror" name="quincena" value="{{ $control->nombre_quincena }}" required autocomplete="quincena" autofocus>

                                @error('quincena')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->


                    <div class="form-group row">   

                     <label for="quincena_id" class="col-md-4 col-form-label text-md-right">{{ __('QUINCENA') }}</label>
                   
                    <div class="col-md-6">
                    <select class="selectpicker show-menu-arrow" name="quincena_id" data-style="btn-success" data-width="auto">
                            <option value="{{$control->quincena_id}}" selected>{{$control->quincena->nombre}}</option>
                            @foreach($quincenas as $quincena)
                            
                            <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                            
                           
                         @endforeach
                           
                            </select>                              
                        </div>
                    </div> 

                        <div class="form-group row">
                            <label for="num_factura" class="col-md-4 col-form-label text-md-right">{{ __('Nº DE FACTURA') }}</label>

                            <div class="col-md-6">
                                <input id="num_factura" type="text" class="form-control" name="num_factura" value="{{ $control->num_factura }}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="importe" class="col-md-4 col-form-label text-md-right">{{ __('IMPORTE FACTURA') }}</label>

                            <div class="col-md-6">
                                <input id="importe" type="text" class="form-control " name="importe"  value="{{ $control->importe }}" >

                            </div>
                        </div>

                        <div class="form-group row">   

                     <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE') }}</label>
                   

                    <select class="selectpicker show-menu-arrow" name="id_cliente" data-style="btn-success" data-width="auto">
                            <option value="{{$control->id_cliente}}" selected>{{$control->cliente->nombre}}</option>
                            @foreach($clientes as $cliente)
                            
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            
                           
                         @endforeach
                           
                            </select>                              
                        
                        </div>  
                        

<!--
                        <div class="form-group row">
                            <label for="id_cliente" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTE')  }} {{$control->cliente->nombre}} </label>

                            <div class="col-md-6">
                                <input id="id_cliente" type="number" class="form-control @error('id_cliente') is-invalid @enderror" name="id_cliente" value="{{ $control->id_cliente }}" required autocomplete="id_cliente">

                                @error('id_cliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="retencion" class="col-md-4 col-form-label text-md-right">{{ __('RETENCION') }}</label>

                            <div class="col-md-6">
                                <input id="retencion" type="text" class="form-control" name="retencion" value="{{ $control->retencion }}" >

                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto_cobrado" class="col-md-4 col-form-label text-md-right">{{ __('MONTO COBRADO') }}</label>

                            <div class="col-md-6">
                                <input id="monto_cobrado" type="text" class="form-control" name="monto_cobrado" value="{{ $control->monto_cobrado }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gasto_bancario" class="col-md-4 col-form-label text-md-right">{{ __('GASTO BANCARIO') }}</label>

                            <div class="col-md-6">
                                <input id="gasto_bancario" type="text" class="form-control " name="gasto_bancario" value="{{ $control->gasto_bancario }}" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pago_personal" class="col-md-4 col-form-label text-md-right">{{ __('PAGO COSECHEROS') }}</label>

                            <div class="col-md-6">
                                <input id="pago_personal" type="text" class="form-control" name="pago_personal" value="{{ $control->pago_personal }}">
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pago_transporte" class="col-md-4 col-form-label text-md-right">{{ __('PAGO TRANSPORTE') }}</label>

                            <div class="col-md-6">
                                <input id="pago_transporte" type="text" class="form-control " name="pago_transporte" value="{{ $control->pago_transporte }}" >

                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="toneladas" class="col-md-4 col-form-label text-md-right">{{ __('TONELADAS') }}</label>

                            <div class="col-md-6">
                                <input id="toneladas" type="text" class="form-control" name="toneladas" value="{{ $control->toneladas }}">

                            </div>
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