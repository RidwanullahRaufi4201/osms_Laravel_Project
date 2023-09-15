@props(['value'])

<strong {{ $attributes->merge(['class' => 'my-4']) }}>
    {{ $value ?? $slot }}
</strong>
