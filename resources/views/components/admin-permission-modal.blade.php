@props([
'primaryKey' => '',
'listPermission' => [],
'menu' => '',
])
@if(Permission::checkPermission($menu, 'permission'))
    <button
        type="button"
        class="btn btn-outline-info btn-sm"
        wire:click.prevent="permission('{{$primaryKey}}')"
        data-target="#{{ __('permission') }}" data-toggle="modal">
        <i class="fas fa-user-lock"></i>
        {{ __('Permission') }}
    </button>

    <div wire:ignore.self class="modal fade h-75" id="{{ __('permission') }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Permission</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            wire:click.prevent="resetFormPermission()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @foreach($listPermission as $key => $detail)
                            <h4><i class="far {{ $detail['icon'] }}"></i> {{ $detail['title'] }}</h4>
                            @foreach($detail['routes'] as $route )
                                <hr/>
                                @foreach($route as $keyIndex => $valueIndex)
                                    <div class="icheck-primary d-inline" style="margin-right: 20px;">
                                        <input type="checkbox" id="{{ $key.'.'.$keyIndex }}"
                                               name="{{ $key.'.'.$keyIndex }}"
                                               wire:model="formPermission.{{ $key.'.'.$keyIndex }}">
                                        <label for="{{ $key.'.'.$keyIndex }}">
                                            {{ $keyIndex }}
                                        </label>
                                    </div>
                                @endforeach
                            @endforeach
                            {{-- Child menu --}}
                            @foreach($detail['children'] as $childKey => $childDetail)
                                <hr/>
                                <h4><i class="far {{ $childDetail['icon'] }}"></i> {{ $childDetail['title'] }}
                                </h4>
                                @foreach($childDetail['routes'] as $childRoute)
                                    @foreach($childRoute as $k => $v)
                                        <div class="icheck-primary d-inline" style="margin-right: 20px;">
                                            <input type="checkbox" id="{{ $childKey.'.'.$k }}"
                                                   name="{{ $childKey.'.'.$k }}"
                                                   wire:model="formPermission.{{ $childKey.'.'.$k }}">
                                            <label for="{{ $childKey.'.'.$k }}">
                                                {{ $k }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click.prevent="resetFormPermission()"
                            class="btn btn-default"
                            data-dismiss="modal">Cancel
                    </button>
                    <button type="button" wire:click.prevent="savePermission()" class="btn btn-info"><i class="fas fa-user-lock"></i> Permission
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

