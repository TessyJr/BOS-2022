<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullName' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('TestPass123'),
            'whatsapp' => '08' . rand(1000, 9999) . rand(1000, 9999),
            'line_id' => Str::random(4) . rand(100, 999),
            'nim' => '26' . rand(1000, 9999) . rand(1000, 9999),
            'campus_region' => ['Kemanggisan', 'Alam Sutera', 'Bandung', 'Malang'][rand(0, 3)],
            'faculty' => 'School of Information Systems',
            'major' => 'Information Systems',
            'lnt_course' => 'None',
            'launching_schedule' => 'Kamis, 15 September 2022 (10.00 - 12.00)',
            'batch' => ['ABN', 'BBN', 'CBN', 'DBN', 'EBN'][rand(0, 4)],
            'gender' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
            'birthDate' => now(),
            'placeBirth' => 'None',
            'domicile' => 'None',
            'address' => 'None',
            'payment_status' => 0,
            'bnccID' => 'BNCC' . rand(1000, 9999) . rand(1000, 9999),
            'status' => 1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
