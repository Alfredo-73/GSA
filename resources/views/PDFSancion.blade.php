<!DOCTYPE html>

<html>

<head>

<title>Sancion</title>

</head>

<body>
<h4>Legajo: {{$sancion->legajo}}</h4>
<h4>Cuadrilla:</h4>
<h2>NOTIFICACION DE SUSPENSION </h2>

<p>Atento a su {{$sancion->motivo}} en su puesto de trabajo, registrada el día {{$sancion->fecha}}, y resultando 
su conducta violatoria de los deberes impuestos por los art. 84, 85 y 86 de la L.C.T., la empresa ha decidido 
aplicarle una sanción disciplinaria de {{$sancion->dias}} días de suspensión sin goce de haberes.

Consecuentemente, queda Ud. suspendido desde el día {{$sancion->fecha}}  hasta el {{$sancion->reincorporacion}} inclusive,
debiendo retomar tareas el día {{$sancion->reincorporacion}} en forma habitual.
En fecha  {{$sancion->fecha}} se notifica al empleado,

APELLIDO Y NOMBRE: {{$sancion->apellido}} {{$sancion->nombre}}

TIPO Y Nº de DNI: {{$sancion->dni}}




      ……………………………………                                                                              ……………………………………
           Firma                                                                                    Aclaración
</p>
<p>________________________________________________________________________________</p>
<p>Atento a su {{$sancion->motivo}} en su puesto de trabajo, registrada el día {{$sancion->fecha}}, y resultando 
su conducta violatoria de los deberes impuestos por los art. 84, 85 y 86 de la L.C.T., la empresa ha decidido 
aplicarle una sanción disciplinaria de {{$sancion->dias}} días de suspensión sin goce de haberes.

Consecuentemente, queda Ud. suspendido desde el día {{$sancion->fecha}}  hasta el {{$sancion->reincorporacion}} inclusive,
debiendo retomar tareas el día {{$sancion->reincorporacion}} en forma habitual.
En fecha  {{$sancion->fecha}} se notifica al empleado,

APELLIDO Y NOMBRE: {{$sancion->apellido}} {{$sancion->nombre}}

TIPO Y Nº de DNI: {{$sancion->dni}}




      ……………………………………                                                                              ……………………………………
           Firma                                                                                    Aclaración
</p>
</body>

</html>


