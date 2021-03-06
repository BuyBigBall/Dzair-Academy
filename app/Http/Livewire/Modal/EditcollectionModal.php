<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Collection;
use App\Models\CollectionItem;
use Illuminate\Http\Request;

class EditcollectionModal extends Component
{
    public  $show;
    public  $collection_id = 0;
    public  $mat_id = 0;
    public  $coll_name;
    public  $coll_disp;
    
    private $modal;
    protected $listeners = [
        'editCollection' => 'editCollection' ,
        'doShow' => 'doShow'
        
    ];
    protected $rules = [
        'coll_name' => 'required',
        'coll_disp' => 'required|min:3'
    ];
    protected $messages = [
        'coll_name.required'  => ('The collection name cannot be empty.'),
        'coll_disp.required'  => ('The collection description cannot be empty.'),
        'coll_disp.min' => ('The collection description must be over than 3 character.'),
    ];
    
    public function mount(Request $request) {
        if( !empty($request->collection_id) )
        {
            $this->collection_id = $request->collection_id;
        }
        // $this->show = false;
    }

    public function editCollection($coll_id) {
        $this->collection_id = $coll_id;
        $coll = Collection::find( $this->collection_id);
        if(!empty($coll))
        {
            $this->coll_name = $coll->collection_name;
            $this->coll_disp = $coll->description;
        }        
        $this->show = true;
    }

    public function doShow($mat_id = null) {
        $this->mat_id = $mat_id;
        $this->show = true;
        $this->collection_id = 0;
        $this->coll_name = '';
        $this->coll_disp = '';
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
        if($this->collection_id != 0){
            $coll = Collection::find( $this->collection_id);
            Collection::updateOrCreate(
                ['id' => $this->collection_id ],
                [
                    'collection_name'   => $this->coll_name,
                    'description'       => $this->coll_disp,
                ]
            );
        }
        else{
            $request = Request::capture();
            if(stripos($request->headers->get('referer'), 'course-material')!==false)
            { # this come from course file uploading.
                //dd($this->collection_id);
                $this->emit('ShouldAddCollection', $this->coll_name, $this->coll_disp);
                $this->doClose();
                return;
            }
            else
            {
                $coll = Collection::create([
                    'user_id' => Auth::user()->id,
                    'collection_name' => $this->coll_name,
                    'description' => $this->coll_disp
                ]);
                // if(!empty($this->mat_id))
                // {
                //     CollectionItem::updateOrCreate(
                //         ['collection_id' => $coll->id,
                //          'course_id'=>$this->mat_id],
                //         []
                //     );
                //     return Redirect(route('collection-files', $coll->id));
                // }
            }            
        }

        $this->emit('refresh_list', '');
        $this->doClose();
    } 
    public function render()
    {
        return view('livewire.modal.editcollection-modal');
    }
}
