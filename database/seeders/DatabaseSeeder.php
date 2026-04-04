<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $roles = [
            ['nombre' => 'Administrador'],
            ['nombre' => 'Operador'],
            ['nombre' => 'Usuario'],
        ];
        foreach ($roles as $rol) {
            Rol::create($rol);
        }

        User::create([
            'name' => 'Ricardo Aliaga',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'rol_id' => 1,
        ]);

        $this->call(CategoriaSeeder::class);
    }
}
