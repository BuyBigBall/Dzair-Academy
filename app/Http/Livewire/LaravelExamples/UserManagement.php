<?php

namespace App\Http\Livewire\LaravelExamples;

use Livewire\Component;

class UserManagement extends Component
{
    use WithPagination;

    //protected $listeners = ['open' => 'loadGalaxy'];
    public  $perPage = 10;
    public  $curPage = 1;
    private $search_result;
    public  $current_route = 'user-management';   //for pagination jump

    private $training;       
    private $faculty;        
    private $specialization; 
    private $course;         
    private $level;          
    public  $word;          //wire:model
    

    public function __construct()
    {
        parent::__construct();
        $this->current_route = Route::currentRouteName();
    }
    public function update($field, $newValue)
    {
    }
    public function index(Request $request)
    {
    }

    public function updatedPerPage($value)
    {
        $this->perPage = $value;
        Cookie::queue("perPage", $value, env('COOKIE_EXPIRE_SECONDS'));
    }

    public function mount(Request $request)
    {
        // $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
        // $this->level_options = \Config::get('constants.levels');;

        // if(Cookie::has("perPage"))
        // {
        //     $this->perPage = Cookie::get("perPage");
        // }
    }
    public function render()
    {
        $searchWord = [];

        if( ! empty($this->word))                  
        {
            $searchWord[] =  ['training.en' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['training.fr' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['training.ar' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['faculties.en' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['faculties.fr' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['faculties.ar' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['specializations.en' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['specializations.fr' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['specializations.ar' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['courses.en' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['courses.fr' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['courses.ar' , 'like' , '%'.$this->word.'%']; 

            $searchWord[] =  ['users.name' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['users.email' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['users.phone' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['users.location' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['users.about' , 'like' , '%'.$this->word.'%']; 
        } 

        $cols =  "   materials.id as idx" 
                ." , MIN(materials.title) as strkey"."" 
                ." , GROUP_CONCAT(IF(language='en', material_languages.title, '') SEPARATOR  '') as en "
                ." , GROUP_CONCAT(IF(language='fr', material_languages.title, '') SEPARATOR  '') as fr "
                ." , GROUP_CONCAT(IF(language='ar', material_languages.title, '') SEPARATOR  '') as ar ";

        $cols .= " , MIN(trainings." . lang() . ") as training";
        $cols .= " , MIN(faculties." . lang() . ") as faculty";
        $cols .= " , MIN(specializations." . lang() . ") as spacialization";
        $cols .= " , MIN(courses." . lang(). ") as course";
        $cols .= " , MIN(materials.level) as level";

        $query = \App\Models\User::selectRaw(
            DB::raw($cols))
                ->leftJoin('material_languages' , 'materials.id', '=', 'material_languages.material_id')
                ->leftJoin('trainings' , 'trainings.id', '=', 'materials.training_id')
                ->leftJoin('faculties' , 'faculties.id', '=', 'materials.faculty_id')
                ->leftJoin('specializations' , 'specializations.id', '=', 'materials.specialization_id')
                ->leftJoin('courses' , 'courses.id', '=', 'materials.course_id')
             ->where( function($query1) use ($searchWord) {
                if(count($searchWord)>0)
                    //$query1->orWhere([$searchWord[0]])->orWhere([$searchWord[1]])->orWhere([$searchWord[2]])->orWhere([$searchWord[3]]);
                    $query1->orWhere($searchWord);
                    
               })
             ->groupBy('users.id')->orderBy('users.role')->orderBy('users.id', 'ASC');
        
        $this->search_result = $query->paginate( $this->perPage );

        return view('livewire.laravel-examples.user-management');
    }
}
