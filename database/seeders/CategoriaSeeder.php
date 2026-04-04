<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Cafeterías',
                'descripcion' => 'Establecimientos que ofrecen café, bebidas y alimentos ligeros.',
                'icono' => 'fa-solid fa-mug-saucer',
            ],
            [
                'nombre' => 'Restaurantes',
                'descripcion' => 'Establecimientos que ofrecen comidas y bebidas.',
                'icono' => 'fa-solid fa-utensils',
            ],
            [
                'nombre' => 'Bares',
                'descripcion' => 'Establecimientos que ofrecen bebidas y comidas.',
                'icono' => 'fa-solid fa-glass-martini',
            ],
            [
                'nombre' => 'Gimnasios',
                'descripcion' => 'Establecimientos que ofrecen espacios para la educación.',
                'icono' => 'fa-solid fa-chalkboard',
            ],
            [
                'nombre' => 'Centros de entrenamiento',
                'descripcion' => 'Establecimientos que ofrecen espacios para entrenar.',
                'icono' => 'fa-solid fa-dumbbell',
            ],
            [
                'nombre' => 'Centros de salud',
                'descripcion' => 'Establecimientos que ofrecen espacios para la salud.',
                'icono' => 'fa-solid fa-stethoscope',
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
