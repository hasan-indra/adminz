@props(['disabled' => false])
@error($attributes->get('name'))
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control is-invalid']) !!}>
    <x-alert type="error" :message="$message"/>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
@enderror

