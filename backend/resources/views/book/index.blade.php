<x-app-layout>
    <main class="w-full overflow-x-hidden  bg-gray-100 p-4">
        <div class="flex">
            <h1>
                <a class="text-lg hover:underline" href="{{ route('admin.dashboard') }}">
                    Home
                </a>
                /
                <a class="text-lg hover:underline" href="{{ route('admin.books.index') }}">
                    Book
                </a>
            </h1>
        </div>
        <div class="flex justify-between pb-3">
            <h2 class="text-2xl font-medium">Book List</h2>
            <a href="{{ route('admin.books.create') }}">
                <x-button>Create</x-button>
            </a>
        </div>
        <ul role="list" class="divide-y divide-gray-100 bg-white rounded-md px-4">
            @foreach ($books as $book)
                <x-book-table author="{{$book->author}}" cover="{{env('APP_HOST').'/images/'.$book->cover}}" book_id="{{$book->id}}" title="{{$book->title}}" description="{{$book->description}}" />
            @endforeach
        </ul>
    </main>
</x-app-layout>
