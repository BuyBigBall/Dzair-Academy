<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseLanguage;
use Illuminate\Support\Facades\DB;

class TranslatematerialModal extends Component
{
    public  $show;
    private $modal;

    public  $course_id;
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
        'course_id' => 'required',
    ];

    public function mount(Request $request) {
        if( !empty($request->course_id) ) {
            $this->course_id = $request->course_id;
        }

        $this->show = false;
    }

    public function doShow($course_id) {
        $this->course_id = $course_id;
        $cols =  "   courses.id as idx" 
            ." , MIN(courses.title) as mat_title"."" 
            ." , MIN(courses.description) as mat_description "
            ." , GROUP_CONCAT(IF(language='en', course_languages.id, '') SEPARATOR  '') as lang_id_en "
            ." , GROUP_CONCAT(IF(language='en', course_languages.title, '') SEPARATOR  '') as lang_title_en "
            ." , GROUP_CONCAT(IF(language='en', course_languages.description, '') SEPARATOR  '') as lang_desc_en "
            ." , GROUP_CONCAT(IF(language='fr', course_languages.id, '') SEPARATOR  '') as lang_id_fr "
            ." , GROUP_CONCAT(IF(language='fr', course_languages.title, '') SEPARATOR  '') as lang_title_fr "
            ." , GROUP_CONCAT(IF(language='fr', course_languages.description, '') SEPARATOR  '') as lang_desc_fr "
            ." , GROUP_CONCAT(IF(language='ar', course_languages.id, '') SEPARATOR  '') as lang_id_ar "
            ." , GROUP_CONCAT(IF(language='ar', course_languages.title, '') SEPARATOR  '') as lang_title_ar "
            ." , GROUP_CONCAT(IF(language='ar', course_languages.description, '') SEPARATOR  '') as lang_desc_ar ";
        $query = \App\Models\Course::selectRaw(DB::raw($cols))
                ->leftJoin('course_languages' , 'courses.id', '=', 'course_languages.course_id')
                ->where([ 
                    'courses.id'=>$this->course_id
                ])
                ->groupBy('courses.id');
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

        $coll = Course::where([ 
                'id'=>$this->course_id
            ])->first();
        //dd($coll);
        if($coll!=null)
        {
            if( !empty($this->lang_title_en) || !empty($this->lang_desc_en) )
            CourseLanguage::updateOrCreate(
                ['course_id'=>$this->course_id, 'language'=>'en'],
                [
                    'created_by'       => Auth::id(),
                    'updated_by'       => Auth::id(),
                    'title'            => $this->lang_title_en,
                    'description'      => $this->lang_desc_en,
                    'status'           => 0
                ]
            );
            if( !empty($this->lang_title_fr) || !empty($this->lang_desc_fr) )
            CourseLanguage::updateOrCreate(
                ['course_id'=>$this->course_id, 'language'=>'fr'],
                [
                    'created_by'       => Auth::id(),
                    'updated_by'       => Auth::id(),
                    'title'            => $this->lang_title_fr,
                    'description'      => $this->lang_desc_fr,
                    'status'           => 0
                ]
            );
            if( !empty($this->lang_title_ar) || !empty($this->lang_desc_ar) )
            CourseLanguage::updateOrCreate(
                ['course_id'=>$this->course_id, 'language'=>'ar'],
                [
                    'created_by'       => Auth::id(),
                    'updated_by'       => Auth::id(),
                    'title'            => $this->lang_title_ar,
                    'description'      => $this->lang_desc_ar,
                    'status'           => 0
                ]
            );
            
            
            $this->emit('refreshList', 'param');
        }

        $this->doClose();
    } 


    public function render()
    {
        return view('livewire.modal.translatematerial-modal');
    }
}
