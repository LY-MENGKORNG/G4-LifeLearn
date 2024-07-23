@props(['title' => '', 'number' => '', 'active' => 'gray-300', 'text' => 'black', 'link' => ''])

<div class="bg-{{ $active }} flex-1 rounded-md flex items-center p-2 py-3 h-[100px] shadow-sm">
    <div class="bg-white bg-opacity-20 rounded-full p-2 mr-4">
        {!! $slot !!}
    </div>
    <div class="space-y-2 text-{{ $text }}">
        <div class="text-xl font-bold">{{ $number }}</div>
        <div class="text-sm text-gray-700">{{ $title }}</div>
    </div>
    <a href="{{ route($link) }}" class="hover:bg-white-200 rounded-circle flex-1 inline-block">
        <div class="ml-auto flex h-9 w-9 hover:bg-white hover:bg-opacity-20 transition-all rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-5 h-5 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
    </a>
</div>
