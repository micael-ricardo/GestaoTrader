<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TradeManager extends Component
{
    public $data;
    public $saldoInicial;
    public $meta;
    public $limitePerda;
    public $sessaoAtiva = false;

    public $trades = [];
    public $novoTrade = [
        'horario' => '',
        'tipo' => 'Compra',
        'ativo' => '',
        'resultado' => '',
        'observacao' => '',
    ];

    public function iniciarSessao()
    {
        $this->sessaoAtiva = true;
    }

    public function adicionarTrade()
    {
        $this->trades[] = $this->novoTrade;

        $this->novoTrade = [
            'horario' => '',
            'tipo' => 'Compra',
            'ativo' => '',
            'resultado' => '',
            'observacao' => '',
        ];
    }

    public function getTotalProperty()
    {
        return collect($this->trades)->sum('resultado');
    }

    public function render()
    {
        return view('livewire.trade-manager');
    }
}
