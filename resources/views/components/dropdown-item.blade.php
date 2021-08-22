@props(['active'=> false])


@php
    $classes = "block px-3 text-left text-small mb-1 leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white";
    if ($active) $classes .= "  text-white bg-blue-500";
@endphp

<a  {{$attributes(['class' => $classes]) }}> {{ $slot }} </a>
