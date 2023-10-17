<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $faker->word,
            'ref_ticket' => $faker->unique()->word,
            'description' => $faker->paragraph,
            'amount' => $faker->randomFloat(2, 10, 100), 
            'start_event_date' => $faker->dateTimeBetween('now', '+1 year'), 
            'end_event_date' => $faker->dateTimeBetween('now', '+1 year'), 
        ];
    }
}
