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
                / Create
            </h1>
        </div>
        <div class="mt-5 bg-white rounded-md px-4 py-6">
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="flex gap-3 w-full">
                    <div class="flex flex-col flex-1">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" placeholder="Title" class="rounded-md"
                            required>
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="author">Author</label>
                        <input id="author" name="author" type="text" placeholder="Author" class="rounded-md"
                            required>
                    </div>
                </div>
                <div class="flex gap-3 w-full mt-4">
                    <div class="flex flex-col flex-1">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" type="text" placeholder="description" class="rounded-md" required></textarea>
                    </div>
                </div>
                <div class="flex gap-3 w-full mt-4">
                    <div class="flex flex-col flex-1">
                        <label for="cover">Book Cover</label>
                        <input id="cover" name="cover" type="file" placeholder="cover"
                            class="rounded-md border" required>
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="file">Book</label>
                        <input id="file" name="file" type="file" placeholder="description"
                            class="rounded-md border" required>
                    </div>
                </div>
                <div class="flex gap-3 w-full mt-4">
                    <div class="flex flex-col flex-1">
                        <label for="published_date">Published date</label>
                        <input id="published_date" name="published_date" type="date" placeholder="published_date"
                            class="rounded-md border" required>
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="price">Price (Obtional)</label>
                        <input type="number" name="price" id="price" value="0">
                    </div>
                </div>
                <div class="flex mt-5">
                    <x-button class="mx-auto">Submit</x-button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
