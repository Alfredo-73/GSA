<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>

        <th><b>Nombre quincena</b></th>
    
        <td><b>Cliente</b></td>
        <td><b>Monto Cobrado</b></td>
        <td><b>Libre Disponibilidad</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          {{$control->quincena_id}}
        </td>
        <td>
          {{$control->id_cliente}}
        </td>
        <td>
          {{$control->monto_cobrado}}
        </td>
        <td>
          {{$control->libre_dispon}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>
