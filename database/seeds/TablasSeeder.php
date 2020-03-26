<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TablasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'cliente_listar',
            'cliente_alta',
            'cliente_editar',
            'cliente_borrar',
            'capataz_listar',
            'capataz_alta',
            'capataz_editar',
            'capataz_borrar',
            'quincena_listar',
            'quincena_alta',
            'quincena_editar',
            'quincena_borrar',

            
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
