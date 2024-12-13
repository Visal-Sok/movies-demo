<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Actor;

class ViewActor extends Component
{
    protected $listeners = ['viewActor' => 'render'];

    public $actor;

    public function mount($actor) {
        $this->actor = $actor;
    }
    public function render()
    {
        return view('livewire.view-actor');
    }

}
