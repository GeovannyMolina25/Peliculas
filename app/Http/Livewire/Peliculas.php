<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pelicula;

class Peliculas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $gen_id, $dir_id, $for_id, $pel_nombre, $pel_costo, $pel_fecha_estreno;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.peliculas.view', [
            'peliculas' => Pelicula::latest()
						->orWhere('gen_id', 'LIKE', $keyWord)
						->orWhere('dir_id', 'LIKE', $keyWord)
						->orWhere('for_id', 'LIKE', $keyWord)
						->orWhere('pel_nombre', 'LIKE', $keyWord)
						->orWhere('pel_costo', 'LIKE', $keyWord)
						->orWhere('pel_fecha_estreno', 'LIKE', $keyWord)
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
		$this->gen_id = null;
		$this->dir_id = null;
		$this->for_id = null;
		$this->pel_nombre = null;
		$this->pel_costo = null;
		$this->pel_fecha_estreno = null;
    }

    public function store()
    {
        $this->validate([
		'pel_nombre' => 'required',
		'pel_costo' => 'required',
        ]);

        Pelicula::create([ 
			'gen_id' => $this-> gen_id,
			'dir_id' => $this-> dir_id,
			'for_id' => $this-> for_id,
			'pel_nombre' => $this-> pel_nombre,
			'pel_costo' => $this-> pel_costo,
			'pel_fecha_estreno' => $this-> pel_fecha_estreno
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Pelicula Successfully created.');
    }

    public function edit($id)
    {
        $record = Pelicula::findOrFail($id);

        $this->selected_id = $id; 
		$this->gen_id = $record-> gen_id;
		$this->dir_id = $record-> dir_id;
		$this->for_id = $record-> for_id;
		$this->pel_nombre = $record-> pel_nombre;
		$this->pel_costo = $record-> pel_costo;
		$this->pel_fecha_estreno = $record-> pel_fecha_estreno;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'pel_nombre' => 'required',
		'pel_costo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pelicula::find($this->selected_id);
            $record->update([ 
			'gen_id' => $this-> gen_id,
			'dir_id' => $this-> dir_id,
			'for_id' => $this-> for_id,
			'pel_nombre' => $this-> pel_nombre,
			'pel_costo' => $this-> pel_costo,
			'pel_fecha_estreno' => $this-> pel_fecha_estreno
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Pelicula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Pelicula::where('id', $id);
            $record->delete();
        }
    }
}
