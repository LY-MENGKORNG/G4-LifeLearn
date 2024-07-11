<x-app-layout>
    <main class="flex-1 overflow-x-hidden bg-gray-100 p-4">
        <div class="flex justify-between mb-3">
            <h1>
                <a class="text-lg hover:underline" href="{{ route('admin.dashboard') }}">
                    Home
                </a>
                /
                <a class="text-lg hover:underline" href="{{ route('admin.users.index') }}">
                    Users
                </a>
            </h1>
            @can('User add')
                <a href="{{ route('admin.users.create') }}" class="text-white">
                    <x-base-button class="border bg-gray-900">
                        Create User
                    </x-base-button>
                </a>
            @endcan
        </div>
        <div class="bg-white mx-auto shadow-md rounded overflow-hidden">
            <ul role="list" class="divide-y divide-gray-100 bg-white rounded-md px-4">
                @foreach ($users as $user)
                    <x-user-table :name="$user->first_name . ' ' . $user->last_name" :email="$user->email" :src="$user->profile" :roles="$user->roles"
                        :last_seen="$user->last_seen">
                        <div class="flex items-center flex gap-2">
                            @can('User edit')
                                <button class="p-2 rounded-full hover:bg-gray-200 hover:shadow-md transition">
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true" class="w-4 h-4">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                            </path>
                                        </svg></a>

                                    </span>
                                </button>
                            @endcan
                            @can('User delete')
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button class="p-2 rounded-full hover:bg-gray-200 hover:shadow-md transition">
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
                                    </button>
                                </form>
                            @endcan
                        </div>
                        {{-- <div class="flex items-center">
                                    <div x-data="{ dropdownOpen: false }" class="relative">
                                        <button @click="dropdownOpen = ! dropdownOpen"
                                            class="relative block h-8 w-8 rounded-full overflow-hidden  focus:outline-none">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <circle cx="12" cy="7" r="0.5"
                                                        transform="rotate(90 12 7)" stroke="#000000"
                                                        stroke-linecap="round" stroke-linejoin="round"></circle>
                                                    <circle cx="12" cy="12" r="0.5"
                                                        transform="rotate(90 12 12)" stroke="#000000"
                                                        stroke-linecap="round" stroke-linejoin="round"></circle>
                                                    <circle cx="12" cy="17" r="0.5"
                                                        transform="rotate(90 12 17)" stroke="#000000"
                                                        stroke-linecap="round" stroke-linejoin="round"></circle>
                                                </g>
                                            </svg>
                                        </button>

                                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                            class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>
                                        <div x-show="dropdownOpen"
                                            class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                                            style="display: none;">
                                            @can('User edit')
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Edit</a>
                                            @endcan
                                            @can('User delete')
                                                <x-alert-form id="{{ $user->id }}" route="admin.users.destroy"
                                                    title="Hello world" desc="Hello world from cambodia" />
                                                <button class="btn"
                                                    onclick="modal_{{ $user->id }}.showModal()">Delete</button>
                                            @endcan
                                        </div>
                                    </div>
                                </div> --}}
                    </x-user-table>
                @endforeach
            </ul>
        </div>
    </main>
</x-app-layout>
