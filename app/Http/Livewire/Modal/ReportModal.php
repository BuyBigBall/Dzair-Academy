<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportModal extends Component
{
    public  $show;
    public  $course_id = 0;
    public  $user_id = 0;
    public  $report_content;
    public  $course_url;
    protected $listeners = [
        'reportModalview' => 'reportModalview'         
    ];
    protected $rules = [
        'report_content' => 'required|min:3'
    ];
    protected $messages = [
        'report_content.required'  => ('The report description cannot be empty.'),
        'report_content.min' => ('The report description must be over than 3 character.'),
    ];
    
    public function mount(Request $request) {
            //$this->user_id = Auth::id();
    }

    public function reportModalview($course_id, $course_url) {
        $this->course_id = $course_id;
        // $course = Course::find( $this->course_id);
        // $report = Report::where( "course_id" , $course_id )->first();
        $this->course_url = $course_url;
        $this->report_content = 'This content is illegal.';

        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function save() {
        $this->validate();
        // if ( !!empty(Auth::user() ))
        // {
        //     return Redirect('login');
        // }

        $user_id = Auth::id() ?? 0;
        if( !empty($this->course_id))
        {
            //$course = Course::find( $this->course_id);
            //Report::updateOrCreate( [ ],
            //(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            Report::create( 
                [
                    'course_id' => $this->course_id, 
                    'content'   => $this->report_content,
                    'user_id'   => $user_id,
                    'link'      => $this->course_url
                ]
            );
        }

        $this->doClose();
    } 
    public function render()
    {
        return view('livewire.modal.report-modal');
    }
}
