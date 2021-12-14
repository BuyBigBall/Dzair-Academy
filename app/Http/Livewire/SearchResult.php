<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;
use App\Models\Material;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class SearchResult extends Component
{
    use WithPagination;

    //  **** page main fields  ****** /
    public  $perPage = 10;
    public  $curPage = 1;
    public  $search_input;
    private $search_result;
    public  $current_route = 'search-result';  //for pagination jump

    //  **** search field value  ****** /
    public  $training;
    public  $faculty;
    public  $specialization;
    public  $level;
    public  $doc;
    public  $img;
    public  $zip;
    public  $word;
    public  $filter;
    
    public  $collection_id;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(Request $request)
    {
        // dd(($request = Request::capture()));
    }

    public function updated($field, $newValue)
    {
        // $this->validateOnly($field);
    }

    public function updatedPerPage($value)
    {
        $this->perPage = $value;
        Cookie::queue("perPage", $value, env('COOKIE_EXPIRE_SECONDS'));
        // $this->emit('renderPerPage');
    }

    public function mount(Request $request, $flag=null)
    {
        //if($flag==null)

        if(Cookie::has("perPage"))
        {
            $this->perPage = Cookie::get("perPage");
        }
        $this->search_input = $request->input();
        if( !empty($this->search_input['training']))        $this->training = Training::find($this->search_input['training'])->name;
        if( !empty($this->search_input['faculty']))         $this->faculty = Faculty::find($this->search_input['faculty'])->name;
        if( !empty($this->search_input['specialization']))  $this->specialization = Specialization::find($this->search_input['specialization'])->name;
        if( !empty($this->search_input['level']))           $this->level = $this->search_input['level'];
        if( !empty($this->search_input['doc']))             $this->doc = filetypename(1);
        if( !empty($this->search_input['img']))             $this->img = filetypename(2);
        if( !empty($this->search_input['zip']))             $this->zip = filetypename(3);
        if( !empty($this->search_input['word']))            $this->word = $this->search_input['word'];
    
        $this->filter = $this->training;
        if(!empty($this->filter) && !empty($this->faculty) )  
        $this->filter .= ',';
        $this->filter .= $this->faculty;
        if(!empty($this->filter) && !empty($this->specialization) ) 
        $this->filter .= ',';
        $this->filter .= $this->specialization;
        if(!empty($this->filter) && !empty($this->level) ) 
        $this->filter .= ',';
        $this->filter .= $this->level;
        if(!empty($this->filter) && !empty($this->doc) ) 
        $this->filter .= ',';
        $this->filter .= $this->doc;
        if(!empty($this->filter) && !empty($this->img) ) 
        $this->filter .= ',';
        $this->filter .= $this->img;
        if(!empty($this->filter) && !empty($this->zip) ) 
        $this->filter .= ',';
        $this->filter .= $this->zip;
        if(!empty($this->filter) && !empty($this->word) ) 
        $this->filter .= ',';
        if(!empty($this->word))
        $this->filter .= ("search:'".$this->word."'");

        //dd($this->search_input);
    }
    public function nextPage($page)
    {
    }
    public function render()
    {
        $searchCond = [];        $searchWord = [];        $searchOr = []; $searchOr1 = [];

        if( ! empty($this->search_input['training']))               $searchCond[] = ['training_id' , $this->search_input['training']];
        if( ! empty($this->search_input['faculty']))                $searchCond[] = ['faculty_id' , $this->search_input['faculty']];
        if( ! empty($this->search_input['specialization']))         $searchCond[] = ['specialization_id' , $this->search_input['specialization']];
        if( ! empty($this->search_input['level']))                  $searchCond[] = ['level' , $this->search_input['level']];
        if( ! empty($this->search_input['course']))                 $searchCond[] = ['course_id' , $this->search_input['course']];

        if( ! empty($this->search_input['cate_course']))            $searchOr1[] = ['cate_course' , $this->search_input['cate_course']];
        if( ! empty($this->search_input['cate_exercise']))          $searchOr1[] = ['cate_exercise' , $this->search_input['cate_exercise']];
        if( ! empty($this->search_input['cate_exam']))              $searchOr1[] = ['cate_exam' , $this->search_input['cate_exam']];

        if( ! empty($this->search_input['word']))                  
        {
            $searchWord[] =  ['title' , 'like' , '%'.$this->search_input['word'].'%']; 
            $searchWord[] =  ['description' , 'like' , '%'.$this->search_input['word'].'%'];
        } 
        $searchOr[] = ['filetype' , 0];
        if( ! empty($this->search_input['filetype_docs']))          $searchOr[] = ['filetype' , 1];
        if( ! empty($this->search_input['filetype_archives']))      $searchOr[] = ['filetype' , 2];
        if( ! empty($this->search_input['filetype_images']))        $searchOr[] = ['filetype' , 3];

        //print_r($searchCond); die;
        $query = Material::where($searchCond)
                         ->where( function($query1) use ($searchWord) {
                             if(count($searchWord)>0)
                             $query1->orWhere([$searchWord[0]])->orWhere([$searchWord[1]]);
                            })
                         ->where( function ($query2) use ($searchOr){
                             if(count($searchOr)==3)
                                $query2->orWhere([$searchOr[0]])->orWhere([$searchOr[1]])->orWhere([$searchOr[2]]);
                            if(count($searchOr)==2)
                                $query2->orWhere([$searchOr[0]])->orWhere([$searchOr[1]]);
                            if(count($searchOr)==1)
                                $query2->orWhere([$searchOr[0]]);
                            })
                         ->where( function ($query3) use ($searchOr1){
                                if(count($searchOr1)==3)
                                   $query3->orWhere([$searchOr1[0]])->orWhere([$searchOr1[1]])->orWhere([$searchOr1[2]]);
                               if(count($searchOr1)==2)
                                   $query3->orWhere([$searchOr1[0]])->orWhere([$searchOr1[1]]);
                               if(count($searchOr1)==1)
                                   $query3->orWhere([$searchOr1[0]]);
                            })
                         ->with(['lang'=>function($query4){
                                $query4->where('language', lang() );
                            }])
                            ->orderBy('created_at','desc');
                           
        // print($query->toSql()); die;
        $this->search_result = $query->paginate( $this->perPage );
        $this->curPage = $this->search_result->currentPage();
       // dd($this->search_result );
        return view('livewire.search-result', ['pagination'=>$this->search_result] );
    }
}
