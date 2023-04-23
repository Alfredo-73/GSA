@extends('layouts.app1')

@section('content')

<head>
    <title>Resumen Control Facturacion</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nova.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/formCss.css')}}">
    <!--<link type="text/css" rel="stylesheet" href="{{ asset('css/54be8f18700cc4e0368b4568.css')}}">-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="../js/borrar_control_quincenal.js"></script>
</head>
<style>
    /*
        Poner bordes a las tablas. Tomado de:
        https://parzibyte.me/blog/2018/10/16/tabla-html-bordes-css/
    */
    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 0.8px;
    }
</style>

<style>
    table {
        font-family: "Helvetica Neue", Helvetica, sans-serif
    }

    thead {
        background: SteelBlue;
        color: white;
        text-align: center;
    }

    th,
    td {
        padding: 1px 2px;
        text-align: center;
    }

    tbody tr:nth-child(even) {
        background: WhiteSmoke;
    }

    tbody tr td:nth-child(2) {
        text-align: center;
    }

    /*tbody tr td:nth-child(3),
    tbody tr td:nth-child(4) {
        text-align: center;
        font-family: monospace;
    }*/
</style>
@section('content')

<div class="row col-md-10 col-lg-10 mt-1" id="contenido">
    @foreach ($controles as $id_factura => $grupo)
    @endforeach
    <div role="main" class="form-all">
        <ul class="form-section page-section">
            <li id="cid_1" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-defecto" style="margin-left:5rem">
                    <div class="header-text httal htvam">
                        <h2 id="" class="form-header text-center" data-component="header">
                            RESUMEN FACTURACION - COSTO Tn COSECHADAS
                        </h2>
                    </div>
                </div>
            </li>
            @can('agregar_control')
            <a id="agregar" class="btn blue-gradient btn-rounded btn-sm" href="{{ url('/nuevo_control_factura') }}" role="button" style="color:white"><i class="fas fa-2x fa-plus mr-1" style="color:white"></i>NUEVO</a>
            @endcan
            <div>
                <table class="table-bordered table-responsive{-sm|-md|-lg|-xl} table-hover">
                    <thead class="text-center">
                        <tr>
                            <th class="col">FECHA</th>
                            <th class="col">QUINCENA</th>
                            <th class="col">FACTURA</th>
                            <th class="col">TOTAL COBRADO</th>
                            <th class="col">TOTAL PAGADO</th>
                            <th class="col">TOTAL COLECTIVO</th>
                            <th class="col">GASTO BANCARIO</th>
                            <th class="col">TOTAL</th>
                            <th class="col">Tn FACTURADAS</th>
                            <th class="col">COSTO Tn</th>
                            <th colspan="2" class="col">ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($totalPorFactura as $item)
                        <tr>
                            <td class="text-center text-truncate">{{ date('d-m-Y', strtotime($item->fecha)) }}</td>
                            <td class="text-center text-truncate">{{$item->nombre}}</td>
                            <td class="text-center text-truncate">{{$item->razon_social}}</td>
                            <td class="text-center text-truncate">$ {{ number_format($item->total,2,',','.') }}</td>
                            <td class="text-center text-truncate">$ {{ number_format($item->totalordenpago,2,',','.') }}</td>
                            <td class="text-center text-truncate">$ {{ number_format($item->totalcolectivo,2,',','.') }}</td>
                            <td class="text-center text-truncate">$ {{ number_format($item->gastobancario,2,',','.') }}</td>
                            <td class="text-center text-truncate">$ {{ number_format($item->totalfactura,2,',','.') }}</td>
                            <td class="text-center text-truncate">{{ number_format($item->totaltn,2,',','.') }}</td>
                            <td class="text-center text-truncate">$ {{ number_format($item->promedioPorTonelada,2,',','.') }}</td>
                            <td class="text-center">
                                <a id="detalle" class="far fa-file-alt" style="color:darkgreen" href="/../detalle_control/{{ $item->id_factura }}"></a>
                                <a id="modificar" class="fas fa-edit" href="/../modif_control/{{ $item->id_factura }}"></a>
                                @can('borrar_control')
                                @csrf
                                <a id="borrar" style="color:red" onclick="return borra(this)" value="{{$item->id_factura}}" role="button" aria-pressed="true" class="fas fa-trash-alt" onclick="return borra(this)"></a>
                                @endcan
                            </td>
                            <!--
                            @can('borrar_control')
                            @csrf
                            <td class="text-center">
                                <button type="button" onclick="return borra(this)" value="{{$item->id_factura}}" id="borrar" title="Borra Factura" name="borrar" class="btn-xs btn-danger" role="button" aria-pressed="true"><i class="fas fa-trash-alt" style="color:white"></i></button>
                                @endcan-->
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            </li>
        </ul>
    </div>
</div>

<!--<div>
    <div class="row justify-content-center mt-1">
        <a class="btn btn-primary" class="row justify-content-center mt-1" href="{{ url('/resumen_control') }}"> Regresar</a>
    </div>
</div>-->

@endsection