@props(['formPage' => []])
<form>
    @foreach($formPage as $key => $detail)
        @if ($detail['type'] === 'primary')
            <x-input wire:model="{{$key}}" type="hidden" name="{{$key}}"/>
        @else
            <div class="form-group">
                <x-label for="{{$key}}" :value="$detail['title']"/>
                @if ($detail['type'] === 'text')
                    <x-input wire:model="{{$key}}" class="form-control" type="text" name="{{$key}}"
                             :value="old('{{$key}}')"
                             placeholder="{{$detail['title']}}"/>
                @elseif($detail['type'] === 'email')
                    <x-input wire:model="{{$key}}" class="form-control" type="email" name="{{$key}}"
                             :value="old('{{$key}}')"
                             placeholder="{{$detail['title']}}"/>
                @elseif($detail['type'] === 'password')
                    <x-input wire:model="{{$key}}" class="form-control" type="password" name="{{$key}}"
                             placeholder="{{$detail['title']}}" autocomplete="off" />
                @elseif($detail['type'] === 'select')
                    <x-select class="form-control" wire:model="{{$key}}" name="{{$key}}">
                        <option value="">select data</option>
                        @foreach($detail['options'] as $value => $title)
                            <option value="{{$value}}">{{$title}}</option>
                        @endforeach
                    </x-select>
                @endif
            </div>
        @endif
    @endforeach
</form>
