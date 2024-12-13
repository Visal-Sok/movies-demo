<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Actor;

class SearchActor extends Component
{

    public $search = '';



    public function render()
    {
        $actors = Actor::where('name', 'LIKE', "%$this->search%")
                        ->orderBy('name', 'ASC')
                        ->paginate(6);
        return view('livewire.search-actor')->with([
            'actors' => $actors,
        ]);
    }
}
