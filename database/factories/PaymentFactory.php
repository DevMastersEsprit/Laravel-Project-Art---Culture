<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'payment_method' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
            'transaction_id' => $this->faker->uuid,
            'status' => $this->faker->randomElement(['Pending', 'Success', 'Failed']),
            'payment_date' => $this->faker->dateTimeThisMonth,
        ];
    }
}
