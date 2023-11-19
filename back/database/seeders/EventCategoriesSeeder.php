<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //categorias de eventos
        $categories = [
            [
                'name' => 'Concierto',
                'description' => 'Evento musical',
            ],
            [
                'name' => 'Festival',
                'description' => 'Evento musical',
            ],
            [
                'name' => 'Teatro',
                'description' => 'Evento teatral',
            ],
            [
                'name' => 'Cine',
                'description' => 'Evento cinematográfico',
            ],
            [
                'name' => 'Exposición',
                'description' => 'Evento expositivo',
            ],
            [
                'name' => 'Feria',
                'description' => 'Evento ferial',
            ],
            [
                'name' => 'Congreso',
                'description' => 'Evento congresual',
            ],
            [
                'name' => 'Fiesta',
                'description' => 'Evento festivo',
            ],
            [
                'name' => 'Deporte',
                'description' => 'Evento deportivo',
            ],
            [
                'name' => 'Otros',
                'description' => 'Otros eventos',
            ],
        ];
    }
}
