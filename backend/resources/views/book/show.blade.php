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
                /
                {{$book->id}}
            </h1>
        </div>
    </main>
</x-app-layout>
