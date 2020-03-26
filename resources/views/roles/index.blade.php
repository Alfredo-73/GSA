@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="pull-left">
            <h1 class="text-center mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">MANTENIMIENTO DE ROLES</h1>
        </div>
        <div class="pull-right col-lg-12 col-md-12 col-sm-12">
            @can('role-create')
            <a class="btn primary-color-dark mb-5 rounded" href="{{ route('roles.create') }}" style="margin-left:72rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO</a>
            @endcan
        </div>
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
                    <th width="280px">ACCIONES DISPONIBILES</th>
                </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td class="text-uppercase">{{ $role->name }}</td>
                    <td>
                        <!--<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">VER</a>-->
                        @can('role-edit')
                        <a class="btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">EDITAR</a>
                        @endcan
                        @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('BORRAR', ['class' => 'btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
    </table>


    {!! $roles->render() !!}


    @endsection