<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Actor;

class AdminActor extends Component
{

    public boolean $show;

    public function render()
    {
        return view('livewire.admin-actor');
    }
    public function viewActor(Actor $actor)
    {
        return view('livewire.view-actor')->with([
            'actor' => $actor,
        ]);
    }
}
