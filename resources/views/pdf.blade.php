<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">



    <title></title>

  <style>
    body{
      font-family: sans-serif;
      width: 100%;
        margin: 0px auto;
    }

    table
    {
      width: 100%; 
      border: 1px solid #333;
    }  

    th
    {
        text-align: center;
        
        border: 1px solid #006ac1;
        background-color: #00AEEF;
        color: #ffffff;
    }  

    td
    {
      padding: 5px;
      text-align: center;
      border: 1px solid #333;

    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
      margin-top: 10px;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
  </style>
  </head>
  
  <body>
      <header>
    <div align="center"> <img src="../public/img/gsa.png" alt="" style="width: 120px"></div>

    <h2>Informe de Control y facturacion </h2>
  
  </header>

  
            <div class="col-lg-12">
               <div style="background-color: #688a7e; height: 16px"></div>
                    <table  class="display">
                        <thead >
                          @foreach($controles as $control)
                          <tr>
                            <th>Quincena: </th>     
                            <th>Cliente: </th>
                            <th>Factura:</th>
                            <th>Importe:  </th>
                            <th>Retencion:</th>
                            <th>Monto cobrado: </th>
                                                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td >{{$control->quincena->nombre}}</td>
                            <td >{{$control->cliente->nombre}}</td>
                            <td > {{$control->num_factura}}   </td>
                            <td >{{$control->importe}}         </td>
                            <td > {{$control->retencion}}           </td>
                            <td >{{$control->monto_cobrado}}    </td>
                          </tr>  
                          
                        </tbody>
                        <thead >
                          <tr>
                            <th>Gasto Bancario</th>
                            <th>Libre Disponibilidad</th>
                            <th>Pago Personal</th>
                            <th>Pago Transporte</th>
                            <th>Toneladas</th>
                            <th>Observacion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$control->gasto_bancario}} </td>
                            <td> {{$control->libre_dispon}} </td>
                            <td> {{$control->pago_personal}}  </td>
                            <td> {{$control->pago_transporte}} </td>
                            <td>{{$control->toneladas}}           </td>
                            <td>{{$control->observacion}}           </td>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                          </tr>
                          
                          @endforeach
                        </tbody>
                    </table>
                   
                </div>

    <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              ....
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>

  </body>
</html>



