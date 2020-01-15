<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  <style>
    body{
      font-family: sans-serif;
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
    <h1>GSA</h1>
    <h2>Facturacion y pagos</h2>
  </header>

    <h2>Informe quincena </h2>
 <!--<img src="{{ asset('img/gsa.png')}}" alt="" style="width: 30px"> -->


 <br><br>
            <div class="col-lg-12">
                <table class="col-lg-12">
              <thead>
                <tr>
                    <th class="col-lg-4" style="text-align: left">Proyecto:</th>
                    <th style="text-align: center">Nro de Contrato:</th>
                    <th style="text-align: center">Empresa Cliente:</th>
                    <th style="text-align: center">Empresa Proveedor:</th>
                    <th style="text-align: center">Periodo:</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"></td>
                </tr>
              </tbody>
            </table>
            <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
            <h4 class="">Valuaciones</h4>
            <div style="background-color: #688a7e; height: 16px"></div>
                  <br>
                  <div class="presupuestos">
                    <table  class="display">
                        <thead >
                          <tr>
                              <th>Nro de quincena</th>
                              <th>Nro de cliente</th>
                              <th>Periodo de Valuación</th>
                              <th>Avance Físico</th>
                              <th>Avance Financiero</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach($controles as $control)
                          <tr>
                            <td>{{$control->quincena_id}}</td>
                            <td> {{$control->id_cliente}}</td>
                            <td> {{$control->id_cliente}}</td>
                            <td> {{$control->monto_cobrado}}</td>
                            <td>{{$control->libre_dispon}}</td>
                          </tr>
                      @endforeach
                        </tbody>
                    </table>
                    <br><br>
                    <a href="" class="boton" style="width:100%">boton</a>
                </div>

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
<div id="content">
    <p>
      Lorem ipsum dolor sit...
    </p><p>
    Vestibulum pharetra fermentum fringilla...
    </p>
    <p style="page-break-before: always;">
    Podemos romper la página en cualquier momento...</p>
    </p><p>
    Praesent pharetra enim sit amet...
    </p>
  </div>

    <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              Desarrolloweb.com
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



