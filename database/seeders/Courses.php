<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courses as course;

class Courses extends Seeder
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
