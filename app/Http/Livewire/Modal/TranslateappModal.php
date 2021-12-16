<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Translate;
use Illuminate\Http\Request;
use App\Models\MaterialLanguage;
use Illuminate\Support\Facades\DB;

class TranslateappModal extends Component
{
    public  $show;
    private $modal;

    public  $pid;
    public  $en_words;
    public  $fr_words;
    public  $ar_words;

    protected $listeners = [
        'ShowTranslateModal' => 'doShow'        ,
    ];
    protected $rules = [
        'pid' => 'required',
    ];

    public function mount(Request $request) {
        if( !empty($request->pid) ) {
            $this->pid = $request->id;
        }

        $this->show = false;
    }

    public function doShow($_id) {
        $this->pid = $_id;
        $cols =  "   translates.id as idx" 
            ." , GROUP_CONCAT(IF(lang='en', `value`, '') SEPARATOR  '') as en "
            ." , GROUP_CONCAT(IF(lang='fr', `value`, '') SEPARATOR  '') as fr "
            ." , GROUP_CONCAT(IF(lang='ar', `value`, '') SEPARATOR  '') as ar ";
        $query = \App\Models\Material::selectRaw(DB::raw($cols))
                ->where([ 
                    'translates.id'=>$this->pid
                ])
                ->groupBy('translates.id');
        $app_words = $query->first();
        $this->en_words = $app_words->en;
        $this->fr_words = $app_words->fr;
        $this->ar_words = $app_words->ar;
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

        {
            if(!empty($this->pid)){
                Translate::find($this->pid)->update([
                    'en' => $this->en_words,
                    'fr' => $this->fr_words,
                    'ar' => $this->ar_words,
                ]);
            }
            return Redirect(route('translate-app'));
        }

        $this->doClose();
    } 


    public function render()
    {
        return view('livewire.modal.translateapp-modal');
    }
}
