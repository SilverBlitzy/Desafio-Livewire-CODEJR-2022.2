<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Models\Player;
use Livewire\Component;

class Players extends Component
{
    public $player;
    public $edit;
    public $view;
    public $player_id;
    public $name;
    public $age;
    public $nationality;
    public $victories;
    public $defeats;
    public $teamSelected;

    protected $rules =  [
        'name' => 'required|string',
        'age' => 'required|integer',
        'nationality' => 'required|string',
        'victories' => 'sometimes|integer|min:0',
        'defeats' => 'sometimes|integer|min:0',
    ];

    public function create() {
        $this->validate();
        Player::create([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'victories' => $this->victories,
            'defeats' => $this->defeats,
            'team_id' => $this->teamSelected,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->reset();
    }

    public function resetInputs() {
        $this->reset();
        $this->teamSelected = NULL;
        $this->resetValidation();
    }

    public function edit($id)
    {
        $this->player=Player::findOrFail($id);
        $this->player_id = $id;
        $this->name = $this->player->name;
        $this->age = $this->player->age;
        $this->nationality = $this->player->nationality;
        $this->teamSelected = $this->player->team_id ?? null;
        $this->victories = $this->player->victories;
        $this->defeats = $this->player->defeats;
        $this->edit=true;
    }

    public function update()
    {
        $this->validate();

        $player=Player::findOrFail($this->player_id);

            $player->update([
                'name' => $this->name,
                'age' => $this->age,
                'nationality' => $this->nationality,
                'victories' => $this->victories,
                'defeats' => $this->defeats,
                'team_id' => $this->teamSelected,
            ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->reset();
    }

    public function delete($id)
    {
        $player=Player::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.players.players', [
            'players' => Player::all(),
            'teams' => Team::all(),
        ]
        )->layout('layouts.main');
    }
}
