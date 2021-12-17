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

    public  $err_msg;
    public  $main_key;
    public  $default_words;
    public  $en_words;
    public  $fr_words;
    public  $ar_words;

    protected $listeners = [
        'ShowTranslateModal' => 'doShow'        ,
    ];
    protected $rules = [
        'main_key' => 'required',
    ];

    public function mount(Request $request) {
        // if( !empty($request->main_key) ) {
        //     $this->main_key = $request->id;
        // }

        $this->show = false;
    }

    public function doShow($main_key) {
        #dd($_id);
        $this->main_key = $main_key;
        $cols =  "   translates.key as strkey" 
            ." , GROUP_CONCAT(IF(lang='en', `value`, '') SEPARATOR  '') as en "
            ." , GROUP_CONCAT(IF(lang='fr', `value`, '') SEPARATOR  '') as fr "
            ." , GROUP_CONCAT(IF(lang='ar', `value`, '') SEPARATOR  '') as ar ";
        $query = \App\Models\Translate::selectRaw(DB::raw($cols))
                ->where([ 
                    'translates.key'=>$this->main_key
                ])
                ->groupBy('translates.key');
        $app_words = $query->first();
        if($app_words)
        {
            $this->default_words = $app_words->strkey;
            $this->en_words = $app_words->en;
            $this->fr_words = $app_words->fr;
            $this->ar_words = $app_words->ar;
            $this->err_msg = "";
        }
        else
        {
            $this->err_msg = "could not found maik key";
            $this->default_words = "";
            $this->en_words = "";
            $this->fr_words = "";
            $this->ar_words = "";
        }
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function save() {
        //$this->validate();
        if ( !!empty(Auth::user() ))
        {
            return Redirect('login');
        }
        //dd($this->main_key);
        {
            if(!empty($this->main_key)){
                Translate::updateOrCreate(['key'=>$this->main_key,'lang'=>'en'],['value' => $this->en_words]);
                Translate::updateOrCreate(['key'=>$this->main_key,'lang'=>'fr'],['value' => $this->fr_words]);
                Translate::updateOrCreate(['key'=>$this->main_key,'lang'=>'ar'],['value' => $this->ar_words]);
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
