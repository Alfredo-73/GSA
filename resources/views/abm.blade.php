@extends('layouts.app')

@section('content')
<div class="container">
    <div class="titulo text-center mt-3 mb-3">
        <h2>LISTADO DE FACTURAS Y PAGOS QUINCENALES</h2>

        <a button type="button" class="btn btn-success btn-rounded btn-sm m-0" href="/../agregar_control">Agregar</a>
    </div>
</div>
<table class="table table-striped table-responsive-md btn-table">

    <thead>
        <tr>
            <th>#</th>
            <th>Quincena</th>
            <th>Cliente</th>
            <th>Nº Factura</th>
            <th>Importe Factura</th>
            <th>Total Pago</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>
                <button type="button" class="btn btn-teal btn-rounded btn-sm m-0">Button</button>
            </td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>
                <button type="button" class="btn btn-teal btn-rounded btn-sm m-0">Button</button>
            </td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>
                <button type="button" class="btn btn-teal btn-rounded btn-sm m-0">Button</button>
            </td>
        </tr>
    </tbody>

</table>
@endsection