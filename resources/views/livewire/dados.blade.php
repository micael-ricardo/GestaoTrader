<div wire:ignore.self class="modal fade" id="ferramentaModal" tabindex="-1" aria-labelledby="ferramentaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form wire:submit.prevent="salvar" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ferramentaModalLabel">
                    {{ $ferramenta ? 'Editar Ferramenta' : 'Nova Ferramenta' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" class="form-control" wire:model.defer="nome">
                    @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Versão</label>
                    <input type="text" class="form-control" wire:model.defer="versao">
                    @error('versao') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select" wire:model.defer="status">
                        <option value="Ativa">Ativa</option>
                        <option value="Inativa">Inativa</option>
                    </select>
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Path</label>
                    <input type="text" class="form-control" wire:model.defer="path">
                    @error('path') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Salvar</span>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Salvando...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

