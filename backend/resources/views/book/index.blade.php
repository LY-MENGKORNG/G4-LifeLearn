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
                <x-book-table author="{{ $book->author }}" cover="{{ env('APP_HOST') . '/images/' . $book->cover }}"
                    book_id="{{ $book->id }}" title="{{ $book->title }}" description="{{ $book->description }}">
                    <form action="{{ route('admin.books.edit', $book->id)}}" method="post" class="inline">
                        @csrf
                        @method('post')
                        <button class="p-2 rounded-full hover:bg-gray-200 hover:shadow-md transition">
                            <a href="{{ route('admin.books.edit', $book->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-4 h-4">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                    </path>
                                </svg></a>
    
                            </span>
                        </button>
                    </form>
                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button class="p-2 rounded-full hover:bg-gray-200 hover:shadow-md transition">
                            <a href="{{route('admin.books.destroy', $book->id)}}">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16"
                                            stroke="#ab4513" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </button>
                    </form>
                </x-book-table>
            @endforeach
        </ul>
    </main>
</x-app-layout>
