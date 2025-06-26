<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ferramenta;
use Livewire\WithPagination;

class Lista extends Component
{
    use WithPagination;
    public $search = '';
    public $status = 'todos';
    public $ferramentaSelecionada = null;
    public $perPage = 10;
    protected $listeners = ['abrirModalCriar' => 'criar', 'abrirModalEditar' => 'editar',  'render' => 'render',];
    protected $paginationTheme = 'bootstrap';
    public $ferramentaParaDeletarNome = '';
    public $ferramentaParaDeletarId = null;

    



    public function render()
    {

        $query = Ferramenta::query();

        if ($this->search) {
            $query->where('nome', 'like', '%' . $this->search . '%');
        }

        if ($this->status !== 'todos') {
            $query->where('status', $this->status);
        }

        return view('livewire.lista', [
            'ferramentas' => $query->orderBy('nome')->paginate($this->perPage),
        ]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function criar()
    {
        $this->ferramentaSelecionada = null;
        $this->dispatchBrowserEvent('abrirModal');
    }

    public function editar($id)
    {
        $this->ferramentaSelecionada = Ferramenta::findOrFail($id);
        $this->dispatchBrowserEvent('abrirModal');
    }


    public function deleteModal($id)
    {
        $ferramenta = Ferramenta::find($id);
        $this->ferramentaParaDeletarId = $id;
        $this->ferramentaParaDeletarNome = $ferramenta?->nome ?? '';

        //dd($this->ferramentaParaDeletarNome);
        $this->dispatchBrowserEvent('abrirDeleteModal');
    }

    public function deletarConfirmado()
    {
        $ferramenta = Ferramenta::find($this->ferramentaParaDeletarId);

        if ($ferramenta) {
            $ferramenta->delete();

            $this->dispatchBrowserEvent('mensagem', [
                'tipo' => 'success',
                'texto' => 'Ferramenta deletada com sucesso.'
            ]);

        }

        $this->ferramentaParaDeletarId = null;
        $this->dispatchBrowserEvent('fecharDeleteModal');
    }

}

