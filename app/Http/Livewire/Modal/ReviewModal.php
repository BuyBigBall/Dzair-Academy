<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewModal extends Component
{
    public  $show;
    public  $course_id = 0;
    public  $user_id = 0;
    public  $review_disp;

    protected $listeners = [
        'reviewModal' => 'reviewModal'         
    ];
    protected $rules = [
        'review_disp' => 'required|min:3'
    ];
    protected $messages = [
        'review_disp.required'  => ('The review description cannot be empty.'),
        'review_disp.min' => ('The review description must be over than 3 character.'),
    ];
    
    public function mount(Request $request) {
            $this->user_id = Auth::id();
    }

    public function reviewModal($course_id) {
        $this->course_id = $course_id;
        $course = Course::find( $this->course_id);
        $review = Review::where( "course_id" , $course_id )->first();
        
        if(!empty($course))
        {
            if( !empty($review))
                $this->review_disp = $review->content;
        }        
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function save() {
        $this->validate();
        if ( !!empty(Auth::user() ))
        {
            return Redirect('login');
        }
        if( !empty($this->course_id))
        {
            $course = Course::find( $this->course_id);
            Review::updateOrCreate(
                ['course_id' => $this->course_id, 'user_id' => $this->user_id ],
                [
                    'content'       => $this->review_disp,
                ]
            );
        }

        $this->doClose();
    } 
    public function render()
    {
        return view('livewire.modal.review-modal');
    }
}
