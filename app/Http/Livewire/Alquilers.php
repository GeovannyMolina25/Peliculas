<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alquiler;

class Alquilers extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $soc_id, $pel_id, $alq_fecha_desde, $alq_fecha_hasta, $alq_valor, $alq_fecha_entrega;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.alquilers.view', [
            'alquilers' => Alquiler::latest()
						->orWhere('soc_id', 'LIKE', $keyWord)
						->orWhere('pel_id', 'LIKE', $keyWord)
						->orWhere('alq_fecha_desde', 'LIKE', $keyWord)
						->orWhere('alq_fecha_hasta', 'LIKE', $keyWord)
						->orWhere('alq_valor', 'LIKE', $keyWord)
						->orWhere('alq_fecha_entrega', 'LIKE', $keyWord)
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
		$this->soc_id = null;
		$this->pel_id = null;
		$this->alq_fecha_desde = null;
		$this->alq_fecha_hasta = null;
		$this->alq_valor = null;
		$this->alq_fecha_entrega = null;
    }

    public function store()
    {
        $this->validate([
		'alq_fecha_desde' => 'required',
		'alq_fecha_hasta' => 'required',
		'alq_valor' => 'required',
        ]);

        Alquiler::create([ 
			'soc_id' => $this-> soc_id,
			'pel_id' => $this-> pel_id,
			'alq_fecha_desde' => $this-> alq_fecha_desde,
			'alq_fecha_hasta' => $this-> alq_fecha_hasta,
			'alq_valor' => $this-> alq_valor,
			'alq_fecha_entrega' => $this-> alq_fecha_entrega
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Alquiler Successfully created.');
    }

    public function edit($id)
    {
        $record = Alquiler::findOrFail($id);

        $this->selected_id = $id; 
		$this->soc_id = $record-> soc_id;
		$this->pel_id = $record-> pel_id;
		$this->alq_fecha_desde = $record-> alq_fecha_desde;
		$this->alq_fecha_hasta = $record-> alq_fecha_hasta;
		$this->alq_valor = $record-> alq_valor;
		$this->alq_fecha_entrega = $record-> alq_fecha_entrega;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'alq_fecha_desde' => 'required',
		'alq_fecha_hasta' => 'required',
		'alq_valor' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Alquiler::find($this->selected_id);
            $record->update([ 
			'soc_id' => $this-> soc_id,
			'pel_id' => $this-> pel_id,
			'alq_fecha_desde' => $this-> alq_fecha_desde,
			'alq_fecha_hasta' => $this-> alq_fecha_hasta,
			'alq_valor' => $this-> alq_valor,
			'alq_fecha_entrega' => $this-> alq_fecha_entrega
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Alquiler Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Alquiler::where('id', $id);
            $record->delete();
        }
    }
}
