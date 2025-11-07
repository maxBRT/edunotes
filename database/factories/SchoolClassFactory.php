<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'Mathematics',
            'English Literature',
            'Computer Science',
            'Physics',
            'Chemistry',
            'Biology',
            'History',
            'Geography',
            'Spanish',
            'French',
            'Art',
            'Music',
            'Physical Education',
        ];

        $teacherName = fake()->name();
        $domain = fake()->randomElement(['school.edu', 'academy.edu', 'college.edu']);

        return [
            'name' => fake()->randomElement($subjects).' '.fake()->randomElement(['101', '201', '301', 'I', 'II', 'III', 'Advanced', 'Honors']),
            'teacher_name' => $teacherName,
            'teacher_email' => fake()->unique()->safeEmail(),
            'class_website' => 'https://'.fake()->slug(2).'.'.$domain,
        ];
    }
}
