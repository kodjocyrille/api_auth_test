<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_prenom' => $this->faker->name(),
            'age' => $this->faker->numberBetween(6, 18),
            'sexe' => $this->faker->randomElement(['M', 'F']),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_naissance' => $this->faker->date(),
            'lieu_naissance' => $this->faker->city(),
            'matricule' => strtoupper($this->faker->bothify('ELEVE###??')),
            'photo' => $this->faker->imageUrl(200, 200, ''),
            'classe_id' => \App\Models\Classe::factory(),
        ];
    }
}
