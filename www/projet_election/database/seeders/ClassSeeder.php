<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $B1Cergy = ClassModel::create([
            'name' => 'B1',
            'place' => 'Cergy',
        ]);

        $B1Paris = ClassModel::create([
            'name' => 'B1',
            'place' => 'Paris',
        ]);

        $B2Cergy = ClassModel::create([
            'name' => 'B2',
            'place' => 'Cergy',
        ]);

        $B2Paris = ClassModel::create([
            'name' => 'B2',
            'place' => 'Paris',
        ]);

        $B3Cergy = ClassModel::create([
            'name' => 'B3',
            'place' => 'Cergy',
        ]);

        $B3Paris = ClassModel::create([
            'name' => 'B3',
            'place' => 'Paris',
        ]);

        $M1LeadDev = ClassModel::create([
            'name' => 'M1 Lead Dev',
            'place' => 'Pontoise',
        ]);

        $M1GameDev = ClassModel::create([
            'name' => 'M1 Game Dev',
            'place' => 'Pontoise',
        ]);

        $M2LeadDev = ClassModel::create([
            'name' => 'M2 Lead Dev',
            'place' => 'Pontoise',
        ]);

        $M2GameDev = ClassModel::create([
            'name' => 'M2 Game Dev',
            'place' => 'Pontoise',
        ]);
    }
}
