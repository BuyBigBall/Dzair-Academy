<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Material;
use Illuminate\Http\Request;


class UploadedCourse extends Component
{

    public $new_courses = [];
    protected $listeners = [
        'agree_course'  => 'agree_course',
        'delete_course' => 'delete_course',
        'download'      => 'download' , 
    ];

    public function mount()
    {
        $query = Material::where('status', '0')->orderBy('created_at', 'DESC');
        $this->new_courses = $query->get();
    }
    public function agree_course($course_id)
    {
        Material::find($course_id)->update(['status'=>1]);
        $this->mount();
    }
    public function delete_course($course_id)
    {
        Material::find($course_id)->delete();
        $this->mount();
    }

    public function download($course_id)
    {
        $mat = Material::find($course_id);
        $myFile = storage_path('app/'. $mat->filepath);
    	$headers = []; //['Content-Type: application/pdf'];
    	$newName = $mat->filename;
        
        // if( !empty($this->password) && $this->password!=md5($this->encryptPassword))
        // {
        //     return null;;
        // }

    	return response()->download($myFile, $newName, $headers);
    }

    public function render()
    {
        return view('livewire.component.uploaded-course');
    }
}
