<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            [
                'name' => 'Activo'
            ],
            [
                'name' => 'Inactivo'
            ]
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
