<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Formato;

class Formatos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $for_nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.formatos.view', [
            'formatos' => Formato::latest()
						->orWhere('for_nombre', 'LIKE', $keyWord)
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
		$this->for_nombre = null;
    }

    public function store()
    {
        $this->validate([
		'for_nombre' => 'required',
        ]);

        Formato::create([ 
			'for_nombre' => $this-> for_nombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Formato Successfully created.');
    }

    public function edit($id)
    {
        $record = Formato::findOrFail($id);

        $this->selected_id = $id; 
		$this->for_nombre = $record-> for_nombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'for_nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Formato::find($this->selected_id);
            $record->update([ 
			'for_nombre' => $this-> for_nombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Formato Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Formato::where('id', $id);
            $record->delete();
        }
    }
}
