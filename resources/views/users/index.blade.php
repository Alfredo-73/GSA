@extends('layouts.app1')
@section('content')

<div class="row container-fluid col-10 mx-auto" id="contenido">
  <h1 class="mx-auto mt-5 mb-3" style="font-family:Verdana, Geneva, Tahoma, sans-serif">MANTENIMIENTO DE USUARIOS</h1>

  <div class="pull-right col-lg-12 col-md-12 col-sm-12">
    @can('user-create')
    <a class="btn primary-color-dark mb-5 rounded" href="{{ route('users.create') }}" style="margin-left:60%; color:white"><i class="fas fa-2x fa-user-plus mr-2" style="color:white"></i>NUEVO</a>
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
              <th class="text-center">#</th>
              <th class="text-center">NOMBRE USUARIO</th>
              <th class="text-center">CORREO ELECTRONICO</th>
              <th class="text-center">ROL ASIGNADO</th>
              <th class="text-center" width="250px">ACCIONES</th>
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
                @can('user-edit')
                <button class="btn-sm btn-primary" onclick="location.href='{{ route('users.edit',$user->id) }}'">EDITAR</button>
                @endcan
                @can('user-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
  </div>
</div>

{!! $data->render() !!}


@endsection