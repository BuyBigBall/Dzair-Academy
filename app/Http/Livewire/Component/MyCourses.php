<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Course;
use App\Models\CourseLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCourses extends Component
{
    public $listeners = [
        'delete_course' => 'delete_course'
    ];
    public $myUpload_courses;
    public $user_self;
    public $current_route = 'my-courses';   //for pagination jump
    
    public function mount()
    {
        # dd(url()->current());   //user-profile or //my-courses
        if($this->user_self==null && Auth::user()!=null)
            $this->user_self = Auth::user();
    }
    public function delete_course($course_id)
    {
        CourseLanguage::where('course_id', $course_id)->delete();
        Course::find($course_id)->delete();
        $this->mount(  );
    }
    public function render()
    {
        if(!empty(Auth::id()) && Auth::id()==$this->user_self->id)
            $this->myUpload_courses = Course::where('created_by', $this->user_self->id)->orderBy('created_at', 'DESC')->get();
        else
            $this->myUpload_courses = Course::where('created_by', $this->user_self->id)->where('status', '1')->orderBy('created_at', 'DESC')->get();
        
        return view('livewire.component.my-courses');
    }
}
