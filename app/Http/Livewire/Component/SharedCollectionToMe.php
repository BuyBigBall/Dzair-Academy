<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\CollectionShare;
use Illuminate\Support\Facades\Auth;

class SharedCollectionToMe extends Component
{
    public function render()
    {
        $query = CollectionShare::where('to_user', Auth::id()?? 0)
                ->orderBy('created_at', 'ASC');


$this->search_result = $query->get(); //paginate( $this->perPage );

        return view('livewire.component.shared-collection-to-me')
             ->with('pagination', $this->search_result);
    }
}
