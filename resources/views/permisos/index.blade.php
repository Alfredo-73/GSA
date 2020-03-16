@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manteniemiento de Permisos</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('permisos.create') }}"> Alta Nuevo Permiso</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Nombre</th>
     <th width="280px">Accion</th>
  </tr>
    @foreach ($permisos as $key => $permiso)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $permiso->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('permisos.show',$permiso->id) }}">Ver</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('permisos.edit',$permiso->id) }}">Editar</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['permisos.destroy', $permiso->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $permisos->render() !!}


@endsection