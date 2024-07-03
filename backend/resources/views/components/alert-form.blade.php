@props([
    'id' => '',
    'route' => '',
    'title' => '',
    'desc' => '',
])

<dialog id="modal_{{ $id }}" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">{{ $title }}</h3>
        <p class="py-4">{{ $desc }}</p>
        <div class="modal-action">
            <form action="{{ route($route, $id) }}" method="POST" class="inline">
                @csrf
                @method('delete')
                <button
                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
            </form>
        </div>
    </div>
</dialog>
