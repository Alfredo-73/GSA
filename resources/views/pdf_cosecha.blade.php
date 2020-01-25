<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <div alighn="center"> <img src="../public/img/gsa.png" alt="" style="width: 120px"></div>
    <h1></h1>
    <h2>PARTE DE COSECHA DE EL: {{$cosecha->fecha}}</h2>
    <hr>
    <div class="contenido">
        <p id="primero">Cliente: {{$cosecha->cliente->nombre}} </p>
        <p id="segundo">Capataz: {{$cosecha->capataz->nombre}} </p>
        <p id="primero">Jornales: {{$cosecha->jornales}} </p>
        <p id="segundo">Cosecheros: {{$cosecha->cosecheros}} </p>
        <p id="primero">Bines: {{$cosecha->bines}} </p>
        <p id="segundo">Maletas: {{$cosecha->maletas}} </p>
        <p id="primero">Toneladas: {{$cosecha->toneladas}} </p>
        <p id="segundo">Promedio Kilos Bins: {{$cosecha->prom_kg_bin}}</p>
        <p id="primero">Supervisor: {{$cosecha->supervisor}} </p>
    </div>
</body>
</html>