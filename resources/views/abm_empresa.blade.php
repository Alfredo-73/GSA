@extends('layouts.app1')

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="row container-fluid col-6 mx-auto" id="contenido">

    <div class="container-fluid mx-auto text-center">
        <h1 class="mx-auto mb-5 mt-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">LISTADO DE EMPRESAS</h1>

        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nueva_empresa') }}" role="button" style="margin-left:50%; color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVA</a>

    </div>

    <div class="container-fluid mx-auto">
        <!--Table-->
        <table class="table table-sm table-bordered table-responsive-sm table-hover tabla">
            <thead class="text-center">
                <tr height="65px" style="background-color:black; color:white">
                    <th class="th-lg text-center">RAZON SOCIAL</th>
                    <th class="th-lg text-center">CUIT</th>
                    <th class="th-lg text-center">DOMICILIO</th>
                    <th COLSPAN=2 class="text-center">ACCIONES DISPONIBLES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($empresa as $emp)
                <tr>
                    <td class="text-center"> {{$emp->razon_social}}</td>
                    <td class="text-center"> {{$emp->cuit}}</td>
                    <td class="text-center"> {{$emp->domicilio}}</td>
                    <td class="text-center">
                        <form method="POST" action="{{ url('/borrar_empresa/'.$emp->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('¿Desea eliminar la empresa?')" id="borrar" class="btn btn-danger btn-rounded mb-4"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR</button>
                        </form>
                    </td class="text-center">
                    <td>
                        <a id="modificar" class="btn btn-primary btn-rounded mb-4" href="/modif_empresa/{{$emp->id}}" role="button"><i class="far fa-edit mr-2"></i>Modificar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<!--Section: Content-->
@endsection