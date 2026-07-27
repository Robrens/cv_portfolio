<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileStatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory(),
            'value' => '1',
            'label' => 'Indicateur',
            'sort_order' => 0,
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn() => ['is_active' => false]);
    }
}
