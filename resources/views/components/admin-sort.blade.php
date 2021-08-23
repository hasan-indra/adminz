@props([
    'listSort' => [],
])
<div class="input-group input-group-sm">
    <select class="form-control" wire:model="sortBy">
        @foreach($listSort as $valSort => $titleSort)
            <option value="{{ $valSort }}">{{ $titleSort }}</option>
        @endforeach
    </select>
</div>
