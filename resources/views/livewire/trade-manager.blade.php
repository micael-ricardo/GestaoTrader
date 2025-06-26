<div class="container py-4">
    @if(!$sessaoAtiva)
        <div class="card p-3">
            <h5>Nova Sessão de Trade</h5>
            <div class="row mb-2">
                <div class="col">
                    <input type="date" class="form-control" wire:model="data" placeholder="Data">
                </div>
                <div class="col">
                    <input type="number" class="form-control" wire:model="saldoInicial" placeholder="Saldo Inicial">
                </div>
                <div class="col">
                    <input type="number" class="form-control" wire:model="meta" placeholder="Meta Diária">
                </div>
                <div class="col">
                    <input type="number" class="form-control" wire:model="limitePerda" placeholder="Limite de Perda">
                </div>
                <div class="col">
                    <button class="btn btn-primary" wire:click="iniciarSessao">Iniciar Sessão</button>
                </div>
            </div>
        </div>
    @else
        <div class="card p-3 mb-3">
            <h5>Sessão de {{ $data }} - Saldo Inicial: R$ {{ $saldoInicial }}</h5>

            {{-- Resumo --}}
            <div class="mb-3">
                <strong>Lucro/Prejuízo Atual:</strong> R$ {{ $this->total }}
                <br>
                <strong>Progresso:</strong> {{ number_format(($this->total / $meta) * 100, 2) }}%
                @if($this->total >= $meta)
                    <div class="alert alert-success mt-2">🎯 Meta atingida!</div>
                @elseif($this->total <= -$limitePerda)
                    <div class="alert alert-danger mt-2">🚫 Stop de perda atingido!</div>
                @endif
            </div>

            {{-- Adicionar trade --}}
            <div class="row g-2">
                <div class="col">
                    <input type="time" class="form-control" wire:model="novoTrade.horario">
                </div>
                <div class="col">
                    <select class="form-control" wire:model="novoTrade.tipo">
                        <option>Compra</option>
                        <option>Venda</option>
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" wire:model="novoTrade.ativo" placeholder="Ativo">
                </div>
                <div class="col">
                    <input type="number" class="form-control" wire:model="novoTrade.resultado" placeholder="Resultado">
                </div>
                <div class="col">
                    <input type="text" class="form-control" wire:model="novoTrade.observacao" placeholder="Observação">
                </div>
                <div class="col">
                    <button class="btn btn-success" wire:click="adicionarTrade">Adicionar</button>
                </div>
            </div>

            {{-- Lista de trades --}}
            <table class="table table-sm mt-3">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Tipo</th>
                        <th>Ativo</th>
                        <th>Resultado</th>
                        <th>Observação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trades as $trade)
                        <tr>
                            <td>{{ $trade['horario'] }}</td>
                            <td>{{ $trade['tipo'] }}</td>
                            <td>{{ $trade['ativo'] }}</td>
                            <td>R$ {{ $trade['resultado'] }}</td>
                            <td>{{ $trade['observacao'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
