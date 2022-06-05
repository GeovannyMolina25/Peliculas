<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actor;

class Actors extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $sex_id, $act_nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.actors.view', [
            'actors' => Actor::latest()
						->orWhere('sex_id', 'LIKE', $keyWord)
						->orWhere('act_nombre', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->sex_id = null;
		$this->act_nombre = null;
    }

    public function store()
    {
        $this->validate([
		'act_nombre' => 'required',
        ]);

        Actor::create([ 
			'sex_id' => $this-> sex_id,
			'act_nombre' => $this-> act_nombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Actor Successfully created.');
    }

    public function edit($id)
    {
        $record = Actor::findOrFail($id);

        $this->selected_id = $id; 
		$this->sex_id = $record-> sex_id;
		$this->act_nombre = $record-> act_nombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'act_nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Actor::find($this->selected_id);
            $record->update([ 
			'sex_id' => $this-> sex_id,
			'act_nombre' => $this-> act_nombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Actor Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Actor::where('id', $id);
            $record->delete();
        }
    }
}