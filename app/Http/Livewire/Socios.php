<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Socio;

class Socios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $soc_cedula, $soc_nombre, $soc_direccion, $soc_telefono, $soc_correo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.socios.view', [
            'socios' => Socio::latest()
						->orWhere('soc_cedula', 'LIKE', $keyWord)
						->orWhere('soc_nombre', 'LIKE', $keyWord)
						->orWhere('soc_direccion', 'LIKE', $keyWord)
						->orWhere('soc_telefono', 'LIKE', $keyWord)
						->orWhere('soc_correo', 'LIKE', $keyWord)
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
		$this->soc_cedula = null;
		$this->soc_nombre = null;
		$this->soc_direccion = null;
		$this->soc_telefono = null;
		$this->soc_correo = null;
    }

    public function store()
    {
        $this->validate([
		'soc_cedula' => 'required',
		'soc_nombre' => 'required',
		'soc_direccion' => 'required',
		'soc_telefono' => 'required',
		'soc_correo' => 'required',
        ]);

        Socio::create([ 
			'soc_cedula' => $this-> soc_cedula,
			'soc_nombre' => $this-> soc_nombre,
			'soc_direccion' => $this-> soc_direccion,
			'soc_telefono' => $this-> soc_telefono,
			'soc_correo' => $this-> soc_correo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Socio creado Correctamente.');
    }

    public function edit($id)
    {
        $record = Socio::findOrFail($id);

        $this->selected_id = $id; 
		$this->soc_cedula = $record-> soc_cedula;
		$this->soc_nombre = $record-> soc_nombre;
		$this->soc_direccion = $record-> soc_direccion;
		$this->soc_telefono = $record-> soc_telefono;
		$this->soc_correo = $record-> soc_correo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'soc_cedula' => 'required',
		'soc_nombre' => 'required',
		'soc_direccion' => 'required',
		'soc_telefono' => 'required',
		'soc_correo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Socio::find($this->selected_id);
            $record->update([ 
			'soc_cedula' => $this-> soc_cedula,
			'soc_nombre' => $this-> soc_nombre,
			'soc_direccion' => $this-> soc_direccion,
			'soc_telefono' => $this-> soc_telefono,
			'soc_correo' => $this-> soc_correo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Socio actualizado Correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Socio::where('id', $id);
            $record->delete();
        }
    }
}
