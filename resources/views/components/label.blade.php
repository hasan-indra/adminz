@props(['value'])

<label>
    {{ $value ?? $slot }}
</label>
