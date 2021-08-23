@props(['disabled' => false])
@error($attributes->get('name'))
    <select {!! $attributes->merge(['class' => 'form-control is-invalid']) !!}>
        {{ $slot }}
    </select>
    <x-alert type="error" :message="$message"/>
@else
    <select {!! $attributes->merge(['class' => 'form-control']) !!}>
        {{ $slot }}
    </select>
@enderror
