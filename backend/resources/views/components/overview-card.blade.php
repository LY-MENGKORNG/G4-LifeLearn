@props(['title' => '', 'number' => ''])

<div class="bg-blue-500 flex-1 text-white rounded-lg flex items-center p-4 shadow-md" style="min-width: 250px;">
    <div class="bg-white bg-opacity-20 rounded-full p-2 mr-4">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 10l4.552-4.552a1 1 0 00-1.415-1.415L15 7.59m0 0l-3.182-3.182a1 1 0 00-1.415 0L4.552 7.553a1 1 0 000 1.415L9.952 14m.085-7.58a4.512 4.512 0 01-1.683-.338c-.361.091-.662.237-.94.457-.437.352-.762.776-.966 1.3-.175.444-.264.917-.264 1.403 0 .486.089.96.264 1.403.204.524.529.948.966 1.3.278.22.579.366.94.457a4.512 4.512 0 011.683-.338c.599 0 1.171.135 1.683.338.361-.091.662-.237.94-.457.437-.352.762-.776.966-1.3.175-.444.264-.917.264-1.403 0-.486-.089-.96-.264-1.403-.204-.524-.529-.948-.966-1.3-.278-.22-.579-.366-.94-.457a4.512 4.512 0 01-1.683.338z" />
        </svg> --}}
        {{-- {{ $icon }} --}}
    </div>
    <div>
        <div class="text-xl font-bold">{{ $number }}</div>
        <div class="text-sm">{{ $title }}</div>
    </div>
    <div class="ml-auto">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-5 h-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </div>
</div>
