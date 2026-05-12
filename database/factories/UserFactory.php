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
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $gender = $this->faker->randomElement(['Female', 'Male']);

        $firstName = $gender === 'Male'
            ? $this->faker->firstNameMale()
            : $this->faker->firstNameFemale();

        $birthdate = $this->faker->dateTimeBetween('1976-01-01', '2006-01-01');

        $document = $this->faker->numerify('75#######');

        $genderApi = $gender === 'Male' ? 'men' : 'women';
        $imageUrl = "https://randomuser.me/api/portraits/{$genderApi}/" . rand(1, 99) . ".jpg";
        $imagePath = public_path("images/{$document}.png");


        copy($imageUrl, $imagePath);

        return [
            'document' => $document,
            'fullname' => $firstName . ' ' . $this->faker->lastName(),
            'gender' => $gender,
            'birthdate' => $birthdate,
            'phone' => fake()->numerify('320######'),
            'photo' => "{$document}.png",
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('12345'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
