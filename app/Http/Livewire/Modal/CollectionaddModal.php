<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\CollectionItem;

class CollectionaddModal extends Component
{
    public  $show;
    public  $collection_id;
    public  $material_id;
    
    private $modal;
    protected $listeners = [
        'ShowModal' => 'doShow'        ,
    ];
    protected $rules = [
        'collection_id' => 'required',
    ];

    public function mount(Request $request) {
        if( !empty($request->collection_id) )
        {
            $this->collection_id = $request->collection_id;
        }
        $this->show = false;
    }

    public function doShow($mat_id) {
        $this->material_id = $mat_id;
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }


    public function doAdd() {
        $this->validate();
        if ( !!empty(Auth::user() ))
        {
            return Redirect('login');
        }

        # into his own collection
        $coll = Collection::where([ 
                'user_id'=>Auth::id(), 
                'id'=>$this->collection_id
            ])->first();
        if($coll!=null)
        {
            CollectionItem::updateOrCreate(
                ['collection_id' => $this->collection_id,
                 'material_id'=>$this->material_id],
                []
            );
            
            return Redirect(route('collection-files', $this->collection_id));
        }
        #<---

        $this->doClose();
    } 

    public function render()
    {
        $collection_options = [];

        if ( Auth::user() )
        {
            if( !empty($request->collection_id) ) $this->collection_id = 1;//$request->collection_id;
            $query = Collection::where('user_id', Auth::id() );
            $collection_options = $query->get();
        }

        return view('livewire.modal.collectionadd-modal')->with(['collection_options' => $collection_options]);
    }
}
