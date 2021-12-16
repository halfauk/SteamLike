<?php

namespace App\Http\Livewire;

use app\Models\Games;
use Livewire\Component;

class Search extends Component
{
    public String $query  = '';
    public $games = [];

    public function updateQuery()
    {
        $words = '%' . $this->query . '%';
        
        
        if (strlen($this->query)>2){
        $this ->games = Games::where('title', 'like', $words)
        ->orWhere('categorie', 'like', $words)
        ->get();
        }

        dd($this->games);

        

    }

    public function render()
    {
        return view('livewire.search');
    }
}
