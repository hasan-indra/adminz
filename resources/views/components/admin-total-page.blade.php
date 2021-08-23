<div class="input-group input-group-sm">
    <select class="form-control" wire:model="totalPage">
        @foreach(config('admin.list.total') as $totalList)
            <option value="{{ $totalList }}">{{ $totalList }}</option>
        @endforeach
    </select>
</div>
