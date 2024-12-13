<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Director;

class SearchDirector extends Component
{

    public $search = '';


    public function render()
    {
        $directors = Director::where('name', 'LIKE', "%$this->search%")
                            ->orderBy('id', 'ASC')
                            ->paginate(6);
        return view('livewire.search-director', compact('directors'));
    }
}
