<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Movie;
use App\Models\Director;
use Illuminate\Support\Facades\DB;


class SearchMovie extends Component
{

    public $search = '';


    public function render()
    {
        
        $movies = DB::table('movies')
                        ->join('directors', 'movies.directed_by', '=', 'directors.id')
                        ->select('movies.*', 'directors.name')
                        ->where('movies.title', 'LIKE', "%$this->search%")
                        ->orderBy('movies.title', 'ASC')
                        ->paginate(6);
        return view('livewire.search-movie')->with([
            'movies' => $movies,
        ]);
    }
}
