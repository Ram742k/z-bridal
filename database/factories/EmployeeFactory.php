<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birthday' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'address_number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'emergency_contact_name' => $this->faker->name,
            'emergency_contact_number' => $this->faker->phoneNumber,
            'years_of_experience' => $this->faker->numberBetween(0, 20),
            'position' => $this->faker->jobTitle,
            'date_of_joining' => $this->faker->date(),
            'profile_image' => $this->faker->imageUrl(200, 200, 'people', true, 'Faker', true), // Example: Generate a random profile image URL
            'id_proof' => $this->faker->imageUrl(300, 200, 'documents', true, 'Faker', true), // Example: Generate a random ID proof image URL
            // Add more fields as needed
        ];
    }
}
