<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class Teams extends Component
{
    public $edit;
    public $view;
    public $team;
    public $team_id;
    public $name;
    public $country;
    public $punctuation;
    public $victories;
    public $defeats;

    protected $rules =  [
        'name' => 'required|string',
        'country' => 'required|string',
        'punctuation' => 'required|integer',
        'victories' => 'sometimes|integer|min:0',
        'defeats' => 'sometimes|integer|min:0',
    ];

    public function create() {
        $this->validate();
        Team::create([
            'name' => $this->name,
            'country' => $this->country,
            'punctuation' => $this->punctuation,
            'victories' => $this->victories,
            'defeats' => $this->defeats,
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
        $this->team=Team::findOrFail($id);
        $this->team_id = $id;
        $this->name = $this->team->name;
        $this->country = $this->team->country;
        $this->victories = $this->team->victories;
        $this->defeats = $this->team->defeats;
        $this->edit=true;
    }

    public function update()
    {
        $this->validate();

        $team=Team::findOrFail($this->team_id);

            $team->update([
                'name' => $this->name,
                'country' => $this->country,
                'victories' => $this->victories,
                'defeats' => $this->defeats,
            ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->reset();
    }

    public function delete($id)
    {
        $team=Team::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.teams.teams', [
            'teams' => Team::all(),
        ]
        )->layout('layouts.main');
    }
}
