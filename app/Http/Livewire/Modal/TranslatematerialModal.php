<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\MaterialLanguage;
use Illuminate\Support\Facades\DB;

class TranslatematerialModal extends Component
{
    public  $show;
    private $modal;

    public  $material_id;
    public  $mat_title;
    public  $mat_description;
    public  $lang_id_en;
    public  $lang_title_en;
    public  $lang_desc_en;
    public  $lang_id_fr;
    public  $lang_title_fr;
    public  $lang_desc_fr;
    public  $lang_id_ar;
    public  $lang_title_ar;
    public  $lang_desc_ar;

    protected $listeners = [
        'ShowMaterialModal' => 'doShow'        ,
    ];
    protected $rules = [
        'material_id' => 'required',
    ];

    public function mount(Request $request) {
        if( !empty($request->material_id) ) {
            $this->material_id = $request->material_id;
        }

        $this->show = false;
    }

    public function doShow($mat_id) {
        $this->material_id = $mat_id;
        $cols =  "   materials.id as idx" 
            ." , MIN(materials.title) as mat_title"."" 
            ." , MIN(materials.description) as mat_description "
            ." , GROUP_CONCAT(IF(language='en', material_languages.id, '') SEPARATOR  '') as lang_id_en "
            ." , GROUP_CONCAT(IF(language='en', material_languages.title, '') SEPARATOR  '') as lang_title_en "
            ." , GROUP_CONCAT(IF(language='en', material_languages.description, '') SEPARATOR  '') as lang_desc_en "
            ." , GROUP_CONCAT(IF(language='fr', material_languages.id, '') SEPARATOR  '') as lang_id_fr "
            ." , GROUP_CONCAT(IF(language='fr', material_languages.title, '') SEPARATOR  '') as lang_title_fr "
            ." , GROUP_CONCAT(IF(language='fr', material_languages.description, '') SEPARATOR  '') as lang_desc_fr "
            ." , GROUP_CONCAT(IF(language='ar', material_languages.id, '') SEPARATOR  '') as lang_id_ar "
            ." , GROUP_CONCAT(IF(language='ar', material_languages.title, '') SEPARATOR  '') as lang_title_ar "
            ." , GROUP_CONCAT(IF(language='ar', material_languages.description, '') SEPARATOR  '') as lang_desc_ar ";
        $query = \App\Models\Material::selectRaw(DB::raw($cols))
                ->leftJoin('material_languages' , 'materials.id', '=', 'material_languages.material_id')
                ->where([ 
                    'materials.id'=>$this->material_id
                ])
                ->groupBy('materials.id');
        $mat_data = $query->first();
        $this->mat_title = $mat_data->mat_title;
        $this->mat_description = $mat_data->mat_description;
        $this->lang_id_en = $mat_data->lang_id_en;
        $this->lang_title_en = $mat_data->lang_title_en;
        $this->lang_desc_en = $mat_data->lang_desc_en;
        $this->lang_id_fr = $mat_data->lang_id_fr;
        $this->lang_title_fr = $mat_data->lang_title_fr;
        $this->lang_desc_fr = $mat_data->lang_desc_fr;
        $this->lang_id_ar = $mat_data->lang_id_ar;
        $this->lang_title_ar = $mat_data->lang_title_ar;
        $this->lang_desc_ar = $mat_data->lang_desc_ar;
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

        $coll = Material::where([ 
                'id'=>$this->material_id
            ])->first();
        if($coll!=null)
        {
            if(!empty($this->lang_id_en)){
                DB::table('material_languages')
                    ->where('id', $this->lang_id_en)
                    ->update(['title' => $this->lang_title_en]);
            }else if(empty($this->lang_id_en)){
                if(!empty($this->lang_title_en) && !empty($this->lang_desc_en)){
                    $materal_language = MaterialLanguage::create([
                        'material_id'      => $this->material_id,
                        'language'         => 'en',
                        'created_by'       => Auth::id(),
                        'updated_by'       => Auth::id(),
                        'title'            => $this->lang_title_en,
                        'description'      => $this->lang_desc_en,
                    ]);
                }
            }

            if(!empty($this->lang_id_fr)){
                DB::table('material_languages')
                    ->where('id', $this->lang_id_fr)
                    ->update(['title' => $this->lang_title_fr]);
            }else if(empty($this->lang_id_fr)){
                if(!empty($this->lang_title_fr) && !empty($this->lang_desc_fr)){
                    $materal_language = MaterialLanguage::create([
                        'material_id'      => $this->material_id,
                        'language'         => 'fr',
                        'created_by'       => Auth::id(),
                        'updated_by'       => Auth::id(),
                        'title'            => $this->lang_title_fr,
                        'description'      => $this->lang_desc_fr,
                    ]);
                }
            }

            if(!empty($this->lang_id_ar)){
                DB::table('material_languages')
                    ->where('id', $this->lang_id_ar)
                    ->update(['title' => $this->lang_title_ar]);
            }else if(empty($this->lang_id_ar)){
                if(!empty($this->lang_title_ar) && !empty($this->lang_desc_ar)){
                    $materal_language = MaterialLanguage::create([
                        'material_id'      => $this->material_id,
                        'language'         => 'ar',
                        'created_by'       => Auth::id(),
                        'updated_by'       => Auth::id(),
                        'title'            => $this->lang_title_ar,
                        'description'      => $this->lang_desc_ar,
                    ]);
                }
            }
            
            return Redirect(route('translate-course'));
        }

        $this->doClose();
    } 


    public function render()
    {
        return view('livewire.modal.translatematerial-modal');
    }
}
