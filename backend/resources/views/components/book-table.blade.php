@props([
    'cover' => '',
    'title' => '',
    'description' => '',
    'book_id' => '',
    'author' => '',
])

<li class="flex justify-between items-center p-2 gap-2">
    <a href="{{ route('admin.books.show', $book_id) }}" class="flex justify-between items-center flex-1">
        <div class="flex min-w-0 gap-x-4 overflow-hidden rounded-md items-center">
            <img src="{{ $cover }}" alt="{{$title}}" class="w-10 rounded-md h-auto ">
            <h3 class="font-medium text-lg">{{ $title }}</h3>
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
