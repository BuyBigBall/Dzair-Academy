<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;

class SearchResult extends Component
{
    public $training;       
    public $faculty;        
    public $specialization; 
    public $course;       
    public $level;          
    public $word;          

    public $search_result;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(Request $request)
    {
        // if( ! empty($request->input('training'))
        // {
        //     $request->input('training')
        // }

        // $request->input('faculty')
        // $request->input('specialization')
        // $request->input('level')
        // $request->input('course')

        // $request->input('word')
        // $request->input('cate_course')
        // $request->input('cate_exercise')
        // $request->input('cate_exam')

        // $request->input('filetype_docs')
        // $request->input('filetype_archives')
        // $request->input('filetype_images')
        
    }
    public function mount()
    {

        
    }

    public function render()
    {
        $search_result = [1, 3];
        $this->search_result = $search_result;
        return view('livewire.search-result');
               // ->with('search_result', [3, 2 , 1]);
    }
}
