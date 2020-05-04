@extends('layouts.app1')

@section('content')
<div class="row container-fluid col-6 mx-auto" id="contenido">

    <div class="container-fluid mx-auto text-center">
        <h1 class="mx-auto mb-5 mt-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">LISTADO DE CAPATACES</h1>
        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nuevo_capataz') }}" role="button" style="margin-left:50%; color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVA</a>
    </div>
    <!--Table-->
    <div class="container-fluid mx-auto">
        <div class="table-responsive text-nowrap btn-table">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="65px" style="background-color:black; color:white">
                            <th class="text-center">NUMERO</th>
                            <th class="text-center">CUADRILLA</th>
                            <th COLSPAN=2 class="text-center">ACCIONES DISPONIBLES</th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                <tbody>
                    @foreach ($capataz as $capat)
                    <tr>
                        <td class="text-center"> {{$capat->id}}</td>
                        <td class="text-center"> {{$capat->nombre}}</td>
                        <td class="text-center">
                            <form method="POST" action="{{ url('/borrar_capataz/'.$capat->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('¿Desea eliminar el capataz?')" id="borrar" class="btn btn-danger btn-rounded mb-4 mx-auto"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR</button>
                            </form>
                        </td>
                        <td class="text-center">
                            <a id="modificar" class="btn btn-primary btn-rounded mb-4 mx-auto" href="/modif_capataz/{{$capat->id}}" role="button"><i class="far fa-edit mr-2"></i>Modificar </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
                <!--Table body-->
            </table>

            <!--Table-->
        </div>

    </div>
</div>
<!--Section: Content-->
@endsection