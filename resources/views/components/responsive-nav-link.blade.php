@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-primary text-start text-lg font-medium text-primary bg-highlight focus:outline-none focus:text-primary_dark focus:bg-gray_light focus:border-primary_dark transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-lg font-medium text-gray_dark hover:text-primary hover:bg-background hover:border-secondary_light focus:outline-none focus:text-primary focus:bg-highlight focus:border-primary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
