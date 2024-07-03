@props(['class' => ''])
<button class="{{$class}} align-middle select-none font-medium text-center  transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-md">
    {{$slot}}
</button>