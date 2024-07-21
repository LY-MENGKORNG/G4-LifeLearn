@props([
    'cover' => '',
    'title' => '',
    'description' => '',
    'book_id' => '',
])

<li class="flex justify-between gap-x-6 py-3">
    <a href="{{ route('admin.books.show', $book_id) }}" class="flex justify-between ">
        <div class="flex min-w-0 gap-x-4">
            {{ $title }}
            <img src="{{ $cover }}" alt="">
        </div>
        <div class="flex min-w-0 gap-x-4">
            {{ $description }}
        </div>
    </a>
    {{ $slot }}
<li>
