@props([
    'cover' => '',
    'title' => '',
    'description' => '',
    'book_id' => '',
    'author' => '',
])

<li class="flex justify-between p-2 gap-2">
    <a href="{{ route('admin.books.show', $book_id) }}" class="flex justify-between flex-1">
        <div class="flex min-w-0 gap-x-4 flex-col overflow-hidden rounded-md h-[70px] w-[75px]">
            <h3 class="font-medium text-lg">{{ $title }}</h3>
            <img src="{{ $cover }}" alt="{{$title}}">
        </div>
        <div class="flex min-w-0 gap-x-4">
            {{ $author }}
        </div>
        <div class="flex min-w-0 gap-x-4">
            {{ $description }}
        </div>
    </a>
    {{ $slot }}
<li>
