<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\CourseLanguage;
use Illuminate\Support\Facades\DB;

class UniversityeditModal extends Component
{

    public  $show;
    public  $err_msg;
    public  $edit_id;
    public  $en;
    public  $fr;
    public  $ar;
    public  $town;

    protected $listeners = [
        'ShowUniversity' => 'ShowUniversity'        ,
    ];
    protected $rules = [
        'town'     => 'max:40|min:3',
    ];
    public function mount(Request $request) {
        $this->show = false;
    }

    public function ShowUniversity($edit_id) {
        $this->edit_id = $edit_id;
        
        if(!empty(($univ = University::find($edit_id))))
        {
            $this->en = $univ->en;
            $this->fr = $univ->fr;
            $this->ar = $univ->ar;
            $this->town = $univ->town;
        }
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function save() {
        
        if ( !!empty(Auth::user() ) || Auth::user()->role!='admin')
        {
            return Redirect('login');
        }
        
        if( !!empty($this->en) && !!empty($this->fr) && !!empty($this->ar))
        {

            return;
        }
        
        $lang = env('DEFAULT_LANGUAGE', 'en');
        
        if($lang=='en' && !empty($this->en))    $mainname = $this->en;
        if($lang=='fr' && !empty($this->fr))    $mainname = $this->fr;
        if($lang=='ar' && !empty($this->ar))    $mainname = $this->ar;
        if( !!empty($mainname)){
            if(!empty($this->en))           $mainname = $this->en;
            else if(!empty($this->fr))      $mainname = $this->fr;
            else if(!empty($this->ar))      $mainname = $this->ar;
        }
        
        University::updateOrCreate(['id'=>$this->edit_id],
            [
                'mainname' => trim($mainname),
                'en'    => trim($this->en),
                'fr'    => trim($this->fr),
                'ar'    => trim($this->ar),
                'town'  => trim($this->town),
            ]);
        $this->en = '';
        $this->fr = '';
        $this->ar = '';
        $this->town = '';
        $this->edit_id = 0;
        $this->emit('refresh_list', '');
        $this->doClose();
    } 

    public function render()
    {
        return view('livewire.modal.universityedit-modal');
    }
}
