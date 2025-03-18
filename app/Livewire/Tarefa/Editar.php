<?php

namespace App\Livewire\Tarefa;

use App\Models\Tarefa;
use Livewire\Component;

class Editar extends Component
{

    public $tarefaId;
    public $nome;
    public $data_hora;
    public $descricao;

    public function mount($id){ //vai buscar a tarefa por id, e ira fazer uma busca dos dados no banco 
        $tarefaId = Tarefa::find($id);
        //serve para os campos virem preenchidos na tela
        $this->tarefaId = $tarefaId->id;
        $this->nome = $tarefaId->nome;
        $this->data_hora = $tarefaId->data_hora;
        $this->descricao = $tarefaId->descricao;
         
    }

    public function salvar(){
        $tarefa = Tarefa::find($this->tarefaId);
        $tarefa->nome = $this->nome;
        $tarefa->data_hora = $this->data_hora;
        $tarefa->descricao = $this->descricao;

        $tarefa->save();
        session()->flash('sucess', 'Tarefa Atualizada');

    }
    public function render()
    {
        return view('livewire.tarefa.editar');
    }
}
