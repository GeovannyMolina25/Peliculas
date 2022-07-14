<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ActorPelicula;
use App\Models\Actor;
use App\Models\Pelicula;

class ActorPeliculas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $act_id, $pel_id, $apl_papel;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $actores = Actor::pluck('act_nombre','id');
        $peliculas=Pelicula::pluck('pel_nombre','id');
        return view('livewire.actor-peliculas.view',['peliculas' => $peliculas, 'actores' => $actores], [
            'ActorPeliculas' => ActorPelicula::latest()
						->orWhere('act_id', 'LIKE', $keyWord)
						->orWhere('pel_id', 'LIKE', $keyWord)
						->orWhere('apl_papel', 'LIKE', $keyWord)
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
		$this->act_id = null;
		$this->pel_id = null;
		$this->apl_papel = null;
    }

    public function store()
    {
        $this->validate([
		'apl_papel' => 'required',
        ]);

        ActorPelicula::create([ 
			'act_id' => $this-> act_id,
			'pel_id' => $this-> pel_id,
			'apl_papel' => $this-> apl_papel
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'ActorPelicula creado Correctamente.');
    }

    public function edit($id)
    {
        $record = ActorPelicula::findOrFail($id);

        $this->selected_id = $id; 
		$this->act_id = $record-> act_id;
		$this->pel_id = $record-> pel_id;
		$this->apl_papel = $record-> apl_papel;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'apl_papel' => 'required',
        ]);

        if ($this->selected_id) {
			$record = ActorPelicula::find($this->selected_id);
            $record->update([ 
			'act_id' => $this-> act_id,
			'pel_id' => $this-> pel_id,
			'apl_papel' => $this-> apl_papel
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'ActorPelicula actualizado Correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = ActorPelicula::where('id', $id);
            $record->delete();
        }
    }
}
