@props([
    'primaryKey' => '',
    'menu' => '',
])
@if(Permission::checkPermission($menu, 'delete'))
    <button
        type="button"
        class="btn btn-outline-danger btn-sm"
        onclick="confirm('Delete this data?') || event.stopImmediatePropagation()"
        wire:click.prevent="delete('{{ $primaryKey }}')">
        <i class="fas fa-trash"></i>
        {{ __('Delete') }}
    </button>
@endif
