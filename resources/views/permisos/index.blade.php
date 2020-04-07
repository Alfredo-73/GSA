@extends('layouts.app')


@section('content')
<div class="container mt-6">

<div class="row">
    <div class="row container-fluid col-10" id="contenido">
            <h1 class="mx-auto mt-5 mb-3" style="font-family:Verdana, Geneva, Tahoma, sans-serif">MANTENIMIENTO DE PERMISOS</h1>
    </div>
    <div class="pull-right col-lg-12 col-md-12 col-sm-12">
        @can('permiso-create')
        <a class="btn primary-color-dark mb-5 rounded" href="{{ route('permisos.create') }}" style="margin-left:60rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO</a>
        @endcan
    </div>
    
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<div class="container-fluid">
    <table class="table table-bordered table-hover">
        <!--Table head-->
        <thead class="thead-dark">
            <thead class="text-center">
                <tr height="20px" style="background-color:black; color:white">
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th width="280px">ACCIONES DISPONIBLES</th>
                </tr>
                @foreach ($permisos as $key => $permiso)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $permiso->name }}</td>
                    <td>
                        <!--<a class="btn btn-info" href="{{ route('permisos.show',$permiso->id) }}">Ver</a>-->
                        @can('permiso-edit')
                        <button class="btn-sm btn-primary" onclick="location.href='{{ route('permisos.edit',$permiso->id) }}'">EDITAR</button>
                        @endcan
                        @can('permiso-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['permisos.destroy', $permiso->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('BORRAR', ['class' => 'btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
    </table>

</div>

    {!! $permisos->render() !!}
</div>



    @endsection