@props(['menu' => ''])
@if(Permission::checkPermission($menu, 'create'))
    <button
        type="button"
        class="btn btn-outline-primary btn-sm"
        data-target="#{{ __('create') }}" data-toggle="modal">
        <i class="fas fa-plus"></i>
        {{ __('Create') }}
    </button>

    <div wire:ignore.self class="modal fade h-75" id="{{ __('create') }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create</h4>
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
                    <button type="button" wire:click.prevent="create()" class="btn btn-primary"><i class="fas fa-plus"></i> Create
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
