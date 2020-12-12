<?php

namespace Database\Seeders;

use App\Models\Courses as course;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        course::factory()
            ->times(50)
            ->create();
    }
}
