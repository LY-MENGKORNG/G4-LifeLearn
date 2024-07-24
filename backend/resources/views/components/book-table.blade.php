@props([
    'cover' => '',
    'title' => '',
    'book_id' => '',
    'author' => '',
])

<li class="flex justify-between items-center p-2 gap-2">
    <a href="{{ route('admin.books.show', $book_id) }}" class="flex justify-between items-center flex-1">
        <div class="flex-1 flex min-w-0 gap-x-4 overflow-hidden rounded-md items-center">
            <img src="{{ $cover }}" alt="{{$title}}" class="w-10 rounded-md h-auto ">
            <h3 class="font-medium text-lg">{{ $title }}</h3>
        </div>
        <div class="flex-1 min-w-0 gap-x-4 text-start">
            {{ $author }}
        </div> 
    </a>
    {{ $slot }}
<li>
