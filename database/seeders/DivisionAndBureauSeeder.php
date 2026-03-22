<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\Bureau;

class DivisionAndBureauSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Division Administrative' => [
                'Contentieux', 
                'Gestion du personnel', 
                'Logistique'
            ],
            'Appui' => [
                'Gestion de stock', 
                'Gestion des fermes'
            ],
            'Financière' => [
                'Budget', 
                'Commercialisation', 
                'Comptabilité'
            ],
            'Normalisation' => [
                'Secrétariat de direction'
            ],
            'Suivi-Évaluation' => [
                'Évaluation', 
                'Suivi'
            ],
        ];

        foreach ($data as $divisionName => $bureaux) {
            $division = Division::create([
                'nom' => $divisionName,
            ]);

            foreach ($bureaux as $bureauName) {
                Bureau::create([
                    'nom' => $bureauName,
                    'division_id' => $division->id,
                ]);
            }
        }
    }
}