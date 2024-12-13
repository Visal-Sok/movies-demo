<?php

namespace App\Livewire;

use Livewire\Component;

class GenreButton extends Component
{
    public $buttonid;
    public $genrename;
    public $selectedcss;
    public $css = "";
    
    public function mount() {
        if ($this->selectedcss == 1) {
            $this->css = ' bg-red-500 b-1 ';
        }
        else {
            $this->css = ' bg-red-300 ';
        }
    }
    public function render()
    {
        return view('livewire.genre-button');
    }
}
