<?php

namespace App\Http\Livewire;

use App\Models\Courses;
use App\Models\CoursesUsers;
use Livewire\Component;

class CoursesView extends Component
{
    protected $listeners = ['enrollment' => 'render', 'sectionDeleted' => 'certification'];
    public function render()
    {
        $courses = CoursesUsers::with('course')->orderBy('id')->paginate(10)->all();
        return view('livewire.courses-view',compact('courses'));
    }
    public function enroll($course_id)
    {
        if($course_user = CoursesUsers::where('course_id', $course_id)->where('user_id', 1)->where('is_active',false)->first()){
            $course_user->is_active=true;
            $course_user->save();
        }

        $this->emitSelf('enrollment');
    }
    public function certificate(CoursesUsers $course_user_id)
    {
        if (!$course_user_id->certified){
            $course_user_id->certified = true;
            $course_user_id->save();
        }
        $courses = Courses::paginate(10)->all();
        $this->emitSelf('certification');
    }
}
