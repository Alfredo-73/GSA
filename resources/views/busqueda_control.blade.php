@extends('layouts.app')

@section('content')
<div class="panel panel-success">
		<div class="panel-heading">Buscar</div>
		<form action="/busqueda_control" method="get" onsubmit="return showLoad()">
		<div class="panel-body">
			<label class="label-control">Buscar</label>
			<input type="text" name="control_id" class="form-control" placeholder="Please input stock name/description" required="required">
			<br>

	</div>
	<div class="panel-footer">
		<button type="submit" class="btn btn-success">Buscar</button>
	</div>
	</form>
</div>
@if (isset($cliente))
			<div class="panel panel-success">
				<div class="panel-heading">Resultado de busqueda</div>
				<div class="panel-body">

					<div class='table-responsive'>
					  <table class='table table-bordered table-hover'>
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>Nombre</th>
					        <th>CUIT</th>

										<th>nombre_nota</th>
					      </tr>
					    </thead>
					    <tbody>

<!--foreach($noticias as $noti){
    echo $noti->noticiero_programa;
    foreach($noti->notas as $notas){
        echo $noti->nombre_nota;
    }
}-->

					@foreach($cliente as $buscar)
					<tr>
						<td>{{$buscar['quincena-id']}}</td>
						<td>{{$buscar['factura']}}</td>
						<td>{{$buscar['importe']}}</td>

                    </tr>






       @endforeach

				</tbody>




			</table>
{{ $cliente->appends(Request::only('contrrol_id'))->links() }}
		</div>
	</div>
		<div class="panel-footer">
		<a href="{{url('noticia/buscar')}}" class="btn btn-warning">Reiniciar busqueda</a>
		</div>
</div>
@endif

@stop



<!--
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-12 col-md-12 col-lg-12">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">CONTROL QUINCENAL DE FACTURACION Y PAGO</h1>
                        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nuevo_control') }}" role="button" style="margin-left:72rem;color:white">NUEVO </a>

                    </div>


 <nav class="navbar navbar-expand-lg navbar-dark indigo mb-4">

  <a class="navbar-brand" href="#">Buscador</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <form class="form-inline ml-auto">
      <div class="md-form my-0">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
      </div>
      <button href="#!" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">Buscar</button>
    </form>

  </div>

</nav>
<nav class="navbar navbar-light float-right">
    <form class="form-inline md-form mr-auto mb-4" action="">
 <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
      <option>Buscar por ...</option>
      <option>id_quincena</option>
      <option>id_cliente</option>
      <option>num_factura</option>
      <option>toneladas</option>
    </select>
    <input name="buscarpor" class="form-control mr-sm-2" type="text" placeholder="..." aria-label="Search">

  <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Buscar</button>

    </form>
   <a class="fas fa-undo" role="button" href=  {{ url('/abm_cliente') }} style='margin-left:5rem' style="cursor:pointer",name="Regresar" >  Refrescar</a>

</nav>



                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="th-lg text-center">
                                        <a>CLIENTE
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>QUINCENA
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>Num. FACTURA
                                        </a>
                                    </th>
                                    <th class="th-lg text-center" hidden="true">
                                        <a>IMPORTE
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>MONTO COBRADO
                                        </a>
                                    </th>
                                    <th class="th-lg text-center" hidden="true">
                                        <a>GASTOS BANCARIOS
                                        </a>
                                    </th>
                                    <th class="th-lg text-center" hidden="true">
                                        <a>DISPONIBLE
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>TOTAL PAGO
                                        </a>
                                    </th>
                                    <th class="th-lg text-center" hidden="true">
                                        <a>NETO QCNA
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>COSTO TN
                                        </a>
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($controles as $control)
                                <tr>


                                    <?php $disponible = $control->importe - ($control->retencion + $control->gasto_bancario); ?>
                                    <?php $totalPago = $control->pago_personal + $control->pago_transporte; ?>

                                    <td class="text-center"> {{$control->cliente->nombre}}</td>

                                    <td class="text-center"> {{$control->quincena->nombre}}</td>
                                    <td class="text-center"> {{$control->num_factura}}</td>
                                    <td class="text-center" hidden="true">$ {{$control->importe}}</td>
                                    <td class="text-center">$ {{$control->monto_cobrado}}</td>
                                    <td class="text-center" hidden="true">$ {{$control->gasto_bancario}}</td>
                                    <td class="text-center" hidden="true">$ {{$disponible}}</td>
                                    <td class="text-center">$ {{$totalPago}}</td>
                                    <td class="text-center" hidden="true">$ {{$disponible - $totalPago}}</td>
                                    <td class="text-center">$ {{($disponible - $totalPago)/$control->toneladas}}</td>

                                    <td>
                                        <form method="POST" action="{{ url('/borrar_control/'.$control->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('¿Desea eliminar el control quincenal?')" id="borrar" class="btn peach-gradient mb-1 btn-sm m-0 text-center"> BORRAR
                                            </button>

                                        </form>
                                    </td>
                               
                                    <td>
                                        <form method="PUT" action="/modal_control/{{ $control->id }}">
                                            @csrf
                                            {{method_field('PUT')}}
                                            <p href="/modal_control/{{ $control->id }}" class="btn blue-gradient mb-1 btn-sm m-0 text-center" data-toggle="modal" data-target="#modal_control{{ $control->id }}" form method="POST" action="/modal_control/{{$control->id}}">VER</p>
                                            @csrf
                                            {{method_field('PUT')}}
                                            @include('modal_control')
                                        </form>
                                    </td>


                                </tr>
                                @endforeach


                            </tbody>
                        </table>


                </div>

            </div>
        </div>
    </div>
</div>
-->
<!--Section: Content-->
{{ $controles->appends($_GET)->links() }}

@endsection