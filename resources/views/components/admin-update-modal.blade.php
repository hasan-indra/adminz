@props([
    'primaryKey' => '',
    'menu' => '',
])
@if(Permission::checkPermission($menu, 'update'))
    <button
        type="button"
        class="btn btn-outline-success btn-sm"
        data-target="#{{ __('update').$primaryKey }}" data-toggle="modal"
        wire:click="edit('{{ $primaryKey }}')">
        <i class="fas fa-edit"></i>
        {{ __('Update') }}
    </button>

    <div wire:ignore.self class="modal fade  h-75" id="{{ __('update').$primaryKey }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            wire:click.prevent="cancelForm()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click.prevent="cancelForm()"
                            class="btn btn-default"
                            data-dismiss="modal">Cancel
                    </button>
                    <button type="button" wire:click.prevent="update()" class="btn btn-success"><i class="fas fa-edit"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
