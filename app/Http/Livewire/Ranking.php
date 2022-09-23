<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class Ranking extends Component {

    public $filter = NULL;
    public $teams;

    public function mount() {
        $this->teams=Team::all()->sortByDesc('punctuation');
    }

    public function order($filter)
    {
        $this->filter = $filter;

            $this->teams = Team::all()->sortByDesc($this->filter);

    }

    public function render()
    {
        return view('livewire.rankings.ranking')->layout('layouts.main');
    }

}
