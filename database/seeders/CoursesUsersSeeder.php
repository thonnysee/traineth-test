<?php

namespace Database\Seeders;

use App\Models\CoursesUsers;
use Illuminate\Database\Seeder;

class CoursesUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = \App\Models\Courses::all();
        foreach ($courses as $course){
            CoursesUsers::create(['user_id'=>1, 'course_id'=>$course->id]);
        }
    }
}
