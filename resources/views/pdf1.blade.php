<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<style>
	h1{
		text-align: center;
		text-transform: uppercase;
	}
    h2{
		text-align: center;
		text-transform: uppercase;
	}
	.contenido{
		font-size: 20px;
	}
	#primero{
		background-color: #ccc;
	}
	#segundo{
		color:#44a359;
	}
	#tercero{
		text-decoration:line-through;
	}
</style>
</head>
<body>
    <div alighn="center"> <img src="../public/img/gsa.png" alt="" style="width: 120px"></div>
  
    <h1></h1>
    <h2>INFORME control quincenal  {{$control->quincena->nombre}}</h2>
	<hr>
	<div class="contenido">
         <?php $disponible = $control->importe-($control->retencion + $control->gasto_bancario); ?>
         <?php $totalPago = $control->pago_personal + $control->pago_transporte; ?>
		<p id="primero">Nombre cliente:{{$control->cliente->nombre}}</p>
        <p id="segundo">Numero Factura:{{$control->num_factura}}   </p>
        <p id="primero">Importe: {{$control->importe}}         </p>
        <p id="segundo">Retencion:{{$control->retencion}}      </p>
        <p id="primero">Monto cobrado:{{$control->monto_cobrado}}  </p>
        <p id="segundo">Gasto Bancario:{{$control->gasto_bancario}} </p>
        <p id="primero">Libre Disponibilidad:{{$control->libre_dispon}} </p>
        <p id="segundo">Pago Personal:{{$control->pago_personal}}   </p>
        <p id="primero">Pago Transporte:{{$control->pago_transporte}}</p>
        <p id="segundo">Neto Quincena: $ {{$disponible - $totalPago}}      </p> 
        <p id="primero">Costo Tonelada: {{($disponible - $totalPago)/$control->toneladas}}</p>
		<p id="segundo">Toneladas: {{$control->toneladas}}       </p> 
		<p id="segundo">Observacion: {{$control->observacion}}</p>
		
    </div>
    
	
</body>
</html>