<?php

namespace App\Imports;

use App\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;

class EmpleadosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empleado([

            'legajo'           => $row[0], //columna a en el archivo de excel
            'nombre'           => $row[1], //columna b en el archivo de excel
            'apellido'         => $row[2], //columna c en el archivo de excel
            'dni'              => $row[3], //columna d en el archivo de excel
            'cuil'             => $row[4], //columna e en el archivo de excel
            'fecha_ingreso'    => $row[5], //columna f en el archivo de excel
            'id_empresa'       => $row[6], //columna g en el archivo de excel
            'id_capataz'       => $row[7], //columna h en el archivo de excel
        ]);
    }
}
