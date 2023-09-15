<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-sm btn-danger']) }}>
    {{ $slot }}
</button>
