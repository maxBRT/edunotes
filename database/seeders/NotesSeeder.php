<?php

namespace Database\Seeders;

use App\Models\Notes;
use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolClass::query()->each(function (SchoolClass $schoolClass) {
            Notes::factory()
                ->count(rand(3, 8))
                ->create([
                    'school_class_id' => $schoolClass->id,
                ]);
        });
    }
}
