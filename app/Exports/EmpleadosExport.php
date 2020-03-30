<?php

namespace App\Exports;

use App\Empleado;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmpleadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Empleado::all();
    }
}
