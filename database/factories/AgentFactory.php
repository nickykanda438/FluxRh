<?php

namespace Database\Factories;

use App\Models\Bureau;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'matricule' => 'AG' . $this->faker->unique()->numberBetween(1000, 9999),
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'postnom' => $this->faker->lastName(),
            'genre' => $this->faker->randomElement(['M', 'F']),
            'date_naissance' => $this->faker->date('Y-m-d', '-20 years'), // Agents de plus de 20 ans
            'lieu_naissance' => $this->faker->city(),
            'etat_civil' => $this->faker->randomElement(['Célibataire', 'Marié', 'Veuf', 'Divorcé']),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'nbre_enfant' => $this->faker->numberBetween(0, 8),
            'bureau_id' => Bureau::inRandomOrder()->first()->id ?? Bureau::factory(),
            'status' => $this->faker->randomElement(['actif', 'deserteur', 'decede', 'retraite']),
        ];
    }
}