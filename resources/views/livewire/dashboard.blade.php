<div class="d-flex">
    {{-- Sidebar Desktop --}}
    <nav class="bg-dark text-white p-3 shadow-lg position-fixed top-0 start-0 vh-100 d-none d-lg-block" style="width: 250px; z-index: 1030;">
        <div class="text-center mb-4">
            <h5 class="fw-bold">TraderApp</h5>
        </div>
        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('trader') }}" class="btn btn-outline-light w-100 text-start">
                    <i class="bi bi-graph-up-arrow me-2"></i> Nova Sessão
                </a>
            </li>
        </ul>
    </nav>

    {{-- Sidebar Mobile (Offcanvas) --}}
    <div class="d-lg-none position-fixed top-0 start-0 z-1031 p-2">
        <button class="btn btn-dark" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">TraderApp</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('trader') }}" class="btn btn-outline-light w-100 text-start">
                        <i class="bi bi-graph-up-arrow me-2"></i> Nova Sessão
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{-- Conteúdo principal --}}
    <main class="flex-grow-1 p-4 bg-black text-white" style="margin-left: 250px; width: 100%;">
        <div class="card bg-dark text-white p-4 shadow">
            <h4 class="text-center mb-4">Dashboard de Trade</h4>

            <div class="row text-center mb-4">
                <div class="col">
                    <h6>Lucro Total</h6>
                    <p class="text-success fw-bold">R$ {{ number_format($lucroTotal, 2, ',', '.') }}</p>
                </div>
                <div class="col">
                    <h6>Trades Realizados</h6>
                    <p class="fw-bold">{{ $quantidadeTrades }}</p>
                </div>
                <div class="col">
                    <h6>Meta Atingida</h6>
                    <p class="fw-bold">{{ $progressoMeta }}%</p>
                </div>
            </div>

            <div id="graficoVelas" style="height: 400px;"></div>
        </div>
    </main>
</div>


<script>
document.addEventListener('livewire:load', function () {
    var options = {
        chart: {
            type: 'candlestick',
            height: 400,
            background: '#000',
            toolbar: { show: true }
        },
        theme: { mode: 'dark' },
        series: [{
            data: @json($dadosGrafico)
        }],
        xaxis: {
            type: 'category',
            labels: { style: { colors: '#ccc' } }
        },
        yaxis: {
            tooltip: { enabled: true },
            labels: { style: { colors: '#ccc' } }
        }
    };

    var chart = new ApexCharts(document.querySelector("#graficoVelas"), options);
    chart.render();
});
</script>
