<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $lucroTotal = 120.50;
    public $quantidadeTrades = 8;
    public $progressoMeta = 75;

    public $dadosGrafico = [];

    public function mount()
    {
        // Gerar dados fictícios para o gráfico (OHLC)
        $this->dadosGrafico = [
            ['x' => '2025-06-25 10:00', 'y' => [50, 55, 48, 53]],
            ['x' => '2025-06-25 10:30', 'y' => [53, 58, 52, 56]],
            ['x' => '2025-06-25 11:00', 'y' => [56, 59, 54, 55]],
            ['x' => '2025-06-25 11:30', 'y' => [55, 60, 53, 58]],
            ['x' => '2025-06-25 12:00', 'y' => [58, 62, 57, 60]],
        ];
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}

