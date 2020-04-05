@extends('layouts.app1')
@section('content')

<div class="row container-fluid col-10" id="contenido">
  <h1 class="mx-auto mt-5 mb-3" style="font-family:Verdana, Geneva, Tahoma, sans-serif">MANTENIMIENTO DE USUARIOS</h1>
</div>
<div class="pull-right col-lg-12 col-md-12 col-sm-12">
  <a class="btn primary-color-dark mb-5 rounded" href="{{ route('users.create') }}" style="margin-left:65rem;color:white"><i class="fas fa-2x fa-user-plus mr-2" style="color:white"></i>NUEVO</a>
</div>
</div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="container-fluid">
  <div class="table table-lg">
    <div class="table-wrapper">
      <table class="table-bordered table-hover mx-auto">
        <thead class="thead-dark">
          <thead class="text-center">
            <tr height="60px" style="background-color:black; color:white">
              <th style="font-size:15px">#</th>
              <th style="font-size:15px">NOMBRE USUARIO</th>
              <th style="font-size:15px">CORREO ELECTRONICO</th>
              <th style="font-size:15px">ROL ASIGNADO</th>
              <th style="font-size:15px" width="250px">ACCIONES</th>
            </tr>
            @foreach ($data as $key => $user)
            <tr>
              <td>{{ ++$i }}</td>
              <td class="text-uppercase">{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td class="text-center">
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success text-uppercase" style="font-size:15px">{{ $v }}</label>
                @endforeach
                @endif
              </td>
              <td>
                <!--<a class="btn-sm btn-info" href="{{ route('users.show',$user->id) }}">VER</a>-->
                <button class="btn-sm btn-primary" onclick="location.href='{{ route('users.edit',$user->id) }}'">EDITAR</button>
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('BORRAR', ['class' => 'btn-sm btn-danger']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </thead>
        </thead>
      </table>
    </div>

    {!! $data->render() !!}


    @endsection