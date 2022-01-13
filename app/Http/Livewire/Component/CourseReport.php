<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Course;
use App\Models\Report;
use Illuminate\Http\Request;

class CourseReport extends Component
{
    public $reports = [];
    protected $listeners = [
        'agree_report'  => 'agree_report',
        'view_report'   => 'view_report',
        'delete_report' => 'delete_report',
    ];

    public function mount()
    {
        $query = Report::whereNull('verified_at')->orderBy('created_at', 'DESC');
        $this->reports = $query->get();
    }
    public function agree_report($report_id)
    {
        Report::find($report_id)->update(['verified_at'=>date('Y-n-d H:i:s', time()) ]);
        $this->mount();
    }
    public function delete_report($report_id)
    {
        Report::find($report_id)->delete();
        $this->mount();
    }
    public function view_report($report_id)
    {
        //Report::find($report_id)->delete();
        //$this->mount();
    }

    public function render()
    {
        return view('livewire.component.course-report');
    }
}
