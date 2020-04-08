@extends('layouts.app1')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Permisos</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('permisos.index') }}"> Regresar</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $permiso->name }}
        </div>
    </div>
   <!-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permisos:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>-->
</div>
@endsection