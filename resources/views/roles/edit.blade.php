@extends('layouts.app1')


@section('content')
<div class="row container-fluid col-10 mt-5" id="contenido">

    <div class="col-8 mx-auto mt-5">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue; font-size:25px">MODIFICACION DE ROL</div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Tenemos un problema con su entrada.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <!--<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>NOMBRE:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>-->

                <div class="input-group col-10 mt-4 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>NOMBRE DEL ROL</strong></span>
                    </div>
                    <input type="text" name="name" aria-label="name" class="form-control" value="{{ $role->name }}">
                </div>

                <!--<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>PERMISOS ASIGNADOS:</strong>
                        <br />
                        @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br />
                        @endforeach
                    </div>
                </div>-->

                <div class="card ml-3" style="width:95%">
                    <div class="row justify-content-center mb-3" style="font-size:18px">
                        <strong>PERMISOS DISPONIBLES</strong>
                    </div>

                    <div class="row justify">
                        @foreach($permission as $value)
                        <div class="col-3 mr-1 justify-content-center align-items-center container">
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
                    <button type="submit" class="btn btn-success">GRABAR</button>
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> REGRESAR</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

            @endsection