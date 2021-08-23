@props(['headers' => [], 'data' => [], 'formPage' => [], 'listPermission' => [], 'menu' => '' ])
<table class="table table-hover table-bordered text-nowrap">
    <thead>
    <tr>
        <th>No</th>
        @foreach($headers as $key => $title)
            @if($key !== 'is_active')
            <th>{{ $title }}</th>
            @endif
        @endforeach
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($data) > 0)
        @foreach($data as $index => $value)
            <tr>
                <td>{{ $index + 1 }}</td>
                @foreach($headers as $key => $title)
                    @if($key !== 'is_active')
                        <td>{{ $value->{$key} }}</td>
                    @endif
                @endforeach
                <td>
                    <x-admin-activated :primaryKey="$value->id" :menu="$menu ?? ''" :isActive="$value->is_active" />
                    <x-admin-update-modal :primaryKey="$value->id" :menu="$menu ?? ''">
                        <x-admin.form :formPage="$formPage"/>
                    </x-admin-update-modal>
                    <x-admin-delete :primaryKey="$value->id" :menu="$menu ?? ''" />
                    <x-admin-permission-modal :primaryKey="$value->id" :listPermission="$listPermission" :menu="$menu ?? ''" />
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="{{count($headers) + 2}}"><p align="center" style="margin: 0;">No data to display</p></td>
        </tr>
    @endif
    </tbody>
</table>
{{ $data->links('components.admin-pagination') }}
