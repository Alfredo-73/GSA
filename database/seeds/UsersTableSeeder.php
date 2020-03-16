<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' =>  bcrypt('1234')
        ]);

        $role = Role::create(['name' => 'Administrador']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

      //  $admin = Role::create(['name' => 'Administrador']);

        //$admin->givePermissionTo(Permission::all());
       
        //$administrador->assignRole('Administrador');
    }
}
