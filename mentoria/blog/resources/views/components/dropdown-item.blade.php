@props([activate=>false])

@php
$classes= 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white'

if ($activate){
    $$classes.=' bg-blue-500 text-white'
}

@endphp
<a {{ $attributes (['class' =>$classes])}}
    {{$solt}}
</a>