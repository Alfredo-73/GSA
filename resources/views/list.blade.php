@extends('layout')
@section('content')
<table class="table table-striped">
  <thead>
    
    <th>Nombre quincena</th>
    <th>Cliente</th>
    <th>Monto Cobrado</th>
    <th>Libre Disponibilidad</th>
  </thead>
  <tbody>
    @foreach($controles as $control)
    <tr>
      
      <td>{{$control->quincena->nombre}}</td>
      <td>{{$control->cliente->nombre}}</td>
      <td>{{$control->monto_cobrado}}</td>
      <td>{{$control->libre_dispon}}</td>
      <td><a href="{{action('controlController@downloadPDF', $control->id)}}">Download PDF</a></td>
      <td><a href="{{action('controlController@verPDF', $control->id)}}">Ver PDF</a></td>
      <td><a href="{{action('controlController@imprimir')}}"> PDF</a></td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection