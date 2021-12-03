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
use Livewire\WithPagination;

class SearchResult extends Component
{
    use WithPagination;

    public  $perPage = 20;
    public  $curPage = 1;
    public  $search_view;
    private $search_result;

    public function __construct()
    {
        parent::__construct();
        

    }
    
    public function index(Request $request)
    {
    }
    public function mount(Request $request)
    {
        //$request=Request::capture();
        $searchCond = [];        $searchWord = [];        $searchOr = []; $searchOr1 = [];

        //print_r($request->input('faculty')); die;
        if( ! empty($request->input('training')))               $searchCond[] = ['training_id' , $request->input('training')];
        if( ! empty($request->input('faculty')))                $searchCond[] = ['faculty_id' , $request->input('faculty')];
        if( ! empty($request->input('specialization')))         $searchCond[] = ['specialization_id' , $request->input('specialization')];
        if( ! empty($request->input('level')))                  $searchCond[] = ['level' , $request->input('level')];
        if( ! empty($request->input('course')))                 $searchCond[] = ['course' , $request->input('course')];


        if( ! empty($request->input('cate_course')))            $searchOr1[] = ['cate_course' , $request->input('cate_course')];
        if( ! empty($request->input('cate_exercise')))          $searchOr1[] = ['cate_exercise' , $request->input('cate_exercise')];
        if( ! empty($request->input('cate_exam')))              $searchOr1[] = ['cate_exam' , $request->input('cate_exam')];

        if( ! empty($request->input('word')))                  
        {
            $searchWord[] =  ['title' , 'like' , '%'.$request->input('word').'%']; 
            $searchWord[] =  ['description' , 'like' , '%'.$request->input('word').'%'];
        } 
        if( ! empty($request->input('filetype_docs')))          $searchOr[] = ['filetype' , 1];
        if( ! empty($request->input('filetype_archives')))      $searchOr[] = ['filetype' , 2];
        if( ! empty($request->input('filetype_images')))        $searchOr[] = ['filetype' , 3];

        //print_r($searchCond); die;
        $query = Material::where($searchCond)
                         ->where( function($query1) use ($searchWord) {
                             if(count($searchWord)>0)
                             $query1->orWhere([$searchWord[0]])->orWhere([$searchWord[1]]);
                         })->where( function ($query2) use ($searchOr){
                             if(count($searchOr)==3)
                                $query2->orWhere([$searchOr[0]])->orWhere([$searchOr[1]])->orWhere([$searchOr[2]]);
                            if(count($searchOr)==2)
                                $query2->orWhere([$searchOr[0]])->orWhere([$searchOr[1]]);
                            if(count($searchOr)==1)
                                $query2->orWhere([$searchOr[0]]);
                            })->where( function ($query3) use ($searchOr1){
                                if(count($searchOr1)==3)
                                   $query3->orWhere([$searchOr1[0]])->orWhere([$searchOr1[1]])->orWhere([$searchOr1[2]]);
                               if(count($searchOr1)==2)
                                   $query3->orWhere([$searchOr1[0]])->orWhere([$searchOr1[1]]);
                               if(count($searchOr1)==1)
                                   $query3->orWhere([$searchOr1[0]]);
                            })
                            ->with(['lang'=>function($query4){
                                $query4->where('language', lang() );
                            }])->orderBy('created_at','desc');
                           
        // if($request->input('page')==2){
        //     print($query->toSql()); die;
        //     dd($query);
        // }
            
        // $rows->total(), $rows->lastPage(), $rows->perPage(), $rows->currentPage(), $rows->path()
        $this->search_result = $query->paginate( $this->perPage ); // dd($rows);

        $this->search_view = [];
        foreach($this->search_result as $row)
        {
            $this->search_view[] = $row;
        }

        $this->curPage = $this->search_result->currentPage();
    }
    public function nextPage($page)
    {
        //$this->search_result->setPage($this->curPage + 1);

        //dd($page);
        // $this->emit('pageChanged');
        // $this->setPage($this->curPage + 1);
        
        //dd($this->curPage );
        //$this->post->addLikeBy(auth()->user());
    }
    public function render()
    {
        return view('livewire.search-result', ['pagination'=>$this->search_result] );
    }
}
