<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gerenciador de Ferramentas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <div class="d-flex justify-content-center w-100">
                <h1 class="navbar-brand">Ferramentas</h1>
            </div>
        </div>
    </nav>

    <div class="container">

        <div id="mensagem-livewire" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts

    <script>
        window.addEventListener('closeModal', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('ferramentaModal'));
            modal.hide();
        });
        window.addEventListener('abrirModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('ferramentaModal'));
            modal.show();
        });
        window.addEventListener('abrirDeleteModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('DeleteModal'));
            modal.show();
        });

        window.addEventListener('fecharDeleteModal', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('DeleteModal'));
            if (modal) modal.hide();
        });


        window.addEventListener('mensagem', event => {
            const tipo = event.detail.tipo || 'info';
            const texto = event.detail.texto || 'Mensagem';

            const alert = document.createElement('div');
            alert.className = `alert alert-${tipo} alert-dismissible fade show`;
            alert.role = 'alert';
            alert.innerHTML = `
            ${texto}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button> `;

            const container = document.getElementById('mensagem-livewire');
            container.innerHTML = '';
            container.appendChild(alert);

            setTimeout(() => {
                alert.classList.remove('show');
            }, 5000);
        });

    </script>

</body>
</html>
