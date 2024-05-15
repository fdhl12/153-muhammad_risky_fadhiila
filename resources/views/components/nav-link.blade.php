@props([
    'active' => false
])

<a {{$attributes}}
class="{{ $active ? 'border-b border-b-orange-500 text-black' : 'text-black hover:text-orange-500'}}  px-3 py-2 text-base font-medium" aria-current={{ $active ? 'page' : false}}>
{{$slot}}</a>