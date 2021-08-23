@props([
    'isActive' => false,
    'primaryKey' => '',
    'menu' => '',
])
@if(Permission::checkPermission($menu, 'activated'))
    <button
        type="button"
        class="btn btn-outline-{{ $isActive ? 'info' : 'danger' }} btn-sm"
        onclick="confirm('{{ $isActive ? 'Deactivated' : 'Activated' }} this data?') || event.stopImmediatePropagation()"
        wire:click.prevent="activatedData('{{ $primaryKey }}','{{!$isActive}}')">
        <i class="fas fa-toggle-{{ $isActive ? 'on' : 'off' }}"></i>
        {{ $isActive ? __('Deactivated') : __('Activated') }}
    </button>
@endif
