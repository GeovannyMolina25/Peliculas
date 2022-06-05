<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Genero;

class Generos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $gen_nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.generos.view', [
            'generos' => Genero::latest()
						->orWhere('gen_nombre', 'LIKE', $keyWord)
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
		$this->gen_nombre = null;
    }

    public function store()
    {
        $this->validate([
		'gen_nombre' => 'required',
        ]);

        Genero::create([ 
			'gen_nombre' => $this-> gen_nombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Genero Successfully created.');
    }

    public function edit($id)
    {
        $record = Genero::findOrFail($id);

        $this->selected_id = $id; 
		$this->gen_nombre = $record-> gen_nombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'gen_nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Genero::find($this->selected_id);
            $record->update([ 
			'gen_nombre' => $this-> gen_nombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Genero Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Genero::where('id', $id);
            $record->delete();
        }
    }
}
