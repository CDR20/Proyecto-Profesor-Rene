<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Carolina Diaz Romero',
            'email' => 'al221811725@gmail.com',
            'role' => 'ADMIN'
        ]);

        User::factory()->create([
            'name' => 'Joel Gutierrez Nuñez',
            'email' => 'joelgut1998@outlook.es',
            'role' => 'EMPLEADO'
        ]);

        User::factory(15)->create();
    }
}