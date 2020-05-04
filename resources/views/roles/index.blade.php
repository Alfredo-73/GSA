@extends('layouts.app1')


@section('content')
<div class="row container-fluid col-10 mx-auto" id="contenido">
    <h1 class="mx-auto mt-5 mb-3" style="font-family:Verdana, Geneva, Tahoma, sans-serif">MANTENIMIENTO DE ROLES</h1>
    <div class="pull-right col-lg-12 col-md-12 col-sm-12">
        @can('role-create')
        <a class="btn primary-color-dark mb-5 rounded" href="{{ route('roles.create') }}" style="margin-left:60%;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO</a>
        @endcan
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div class="container mx-auto">
        <div class="table-responsive text-nowrap btn-table">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="65px" style="background-color:black; color:white">
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th width="280px">ACCIONES DISPONIBILES</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td class="text-uppercase">{{ $role->name }}</td>
                            <td>
                                <!-- <a class="btn-sm btn-info" href="{{ route('roles.show',$role->id) }}">VER</a>-->
                                @can('role-edit')
                                <button class="btn-sm btn-primary" onclick="location.href='{{ route('roles.edit',$role->id) }}'">EDITAR</button>
                                @endcan
                                @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('BORRAR', ['class' => 'btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </thead>
                </thead>
            </table>
        </div>
        {!! $roles->render() !!}


    </div>
</div>




@endsection