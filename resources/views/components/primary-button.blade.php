<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-sm btn-danger my-1']) }}>
    {{ $slot }}
</button>
