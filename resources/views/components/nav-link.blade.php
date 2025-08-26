@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary text-xl font-medium leading-5 text-primary_dark focus:outline-none focus:border-primary_dark transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xl font-medium leading-5 text-gray_dark hover:text-primary hover:border-accent2 focus:outline-none focus:text-primary focus:border-accent2 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
