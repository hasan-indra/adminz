<x-admin-listing :title="$namePage ?? 'Add Name Page'">
    <div class="col-7">
        <x-admin-create-modal :menu="$namePage ?? ''">
           <x-admin.form :formPage="$formPage ?? []" />
        </x-admin-create-modal>
    </div>
    <div class="col-2">
        <x-admin-sort :listSort="$listSort ?? []" />
    </div>
    <div class="col-1">
        <x-admin-sort-type />
    </div>
    <div class="col-2">
        <x-admin-listing-search />
    </div>
    <br />
    <br />
    <div class="col-12">
        <x-admin-table :menu="$namePage ?? ''" :headers="$tableHeader  ?? []" :data="$data ?? []" :formPage="$formPage ?? []" :listPermission="$listPermission ?? []"/>
    </div>
</x-admin-listing>
