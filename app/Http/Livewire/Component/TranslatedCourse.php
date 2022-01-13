<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\CourseLanguage;
use Illuminate\Http\Request;
class TranslatedCourse extends Component
{
    public $new_courses = [];
    protected $listeners = [
        'agree_translate'  => 'agree_translate',
    ];

    public function mount()
    {
        //dd($this);
        $query = CourseLanguage::where('status', '0')->orderBy('created_at', 'DESC')->limit(10);
        //dd($query->toSql());
        $this->new_courses = $query->get();
        //dd($this->new_courses);
    }
    public function agree_translate($course_id)
    {
        CourseLanguage::find($course_id)->update(['status'=>1]);
        $this->mount();
    }
    // public function delete_course($course_id)
    // {
    //     CourseLanguage::find($course_id)->delete();
    //     $this->mount();
    // }

    public function render()
    {
        return view('livewire.component.translated-course');
    }        
}
