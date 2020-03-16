<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()['cache']->forget('spatie.permission.cache');

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permiso-list',
            'permiso-create',
            'permiso-edit',
            'permiso-delete',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        Permission::create(['name' => 'home']);
        Permission::create(['name' => 'leer_control']);
        Permission::create(['name' => 'agregar_control']);
        Permission::create(['name' => 'update_control']);
        Permission::create(['name' => 'borrar_control']);
        Permission::create(['name' => 'leer_cosecha']);
        Permission::create(['name' => 'agregar_cosecha']);
        Permission::create(['name' => 'update_cosecha']);
        Permission::create(['name' => 'borrar_cosecha']);
        Permission::create(['name' => 'leer_sancion']);
        Permission::create(['name' => 'agregar_sancion']);
        Permission::create(['name' => 'update_sancion']);
        Permission::create(['name' => 'borrar_sancion']);
        Permission::create(['name' => 'leer_empleado']);
        Permission::create(['name' => 'agregar_empleado']);
        Permission::create(['name' => 'update_empleado']);
        Permission::create(['name' => 'borrar_empleado']);
        Permission::create(['name' => 'leer_empresa']);
        Permission::create(['name' => 'leer_capataz']);
    
        //Admin
      //  $admin = Role::create(['name' => 'Administrador']);

        //$admin->givePermissionTo(Permission::all());
        
        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());
        
        //User Admin
       // $user = User::find(1); //Administrador
        //$user->assignRole('Administrador');
        //Guest
        $capataz = Role::create(['name' => 'Capataz']);

        $capataz->givePermissionTo([
            'home',
            'leer_cosecha',
            'agregar_cosecha',
            'update_cosecha',
            'borrar_cosecha'
        ]);

        //$user = User::find(6); //Capataz
        //$user->assignRole('Capataz');

        $gerente = Role::create(['name' => 'Gerente']);
        $gerente->givePermissionTo([
            'home',
            'leer_cosecha',
            'leer_control',
            'leer_empleado',
            'leer_sancion',
            'leer_empresa',
            'leer_capataz'
        ]);
        $supervisor = Role::create(['name' => 'Supervisor']);
        $supervisor->givePermissionTo([
            'home',
            'leer_cosecha',
            'agregar_cosecha',
            'update_cosecha',
            'borrar_cosecha',
            'leer_empleado'
        ]);
        $administrativo = Role::create(['name' => 'Administrativo']);

        $administrativo->givePermissionTo([
            'home',
            'leer_cosecha',
            'leer_control',
            'agregar_control',
            'update_control',
            'leer_empleado',
            'leer_sancion',
            'leer_empresa',
            'leer_capataz'
        ]);
        //$user = User::find(7); //Anto
        //$user->assignRole('Administrativo');
        //$user = User::find(8); //Anto
       // $user->assignRole('Gerente');
       // $user = User::find(9); //Anto
       // $user->assignRole('Supervisor');
    }
}
