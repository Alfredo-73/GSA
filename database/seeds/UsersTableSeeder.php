<?php

use Illuminate\Database\Seeder;
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
        $administrativa = User::create([
            'name' => 'Maria',
            'email' => 'maria@gmail.com',
            'password' =>  bcrypt('1234')
        ]);
        $administrativa->assignRole('Administrativo');
    }
}
