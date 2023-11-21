@props(['active','href'])

@php
$classes = ($active ?? false)
            ? 'relative -ml-px inline-flex items-center bg-red-500 px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300 focus:z-10'
            : 'relative -ml-px inline-flex items-center bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 focus:z-10';
@endphp

<a href="{{$href}}">
    <button type="button" {{ $attributes->merge(['class' => $classes]) }}>
        {{$slot}}
    </button>
</a>
