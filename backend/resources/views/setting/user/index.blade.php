<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
        <div class="p-3">
            <div class="bg-white mx-auto shadow-md rounded overflow-hidden">
                <div class="flex bg-gray-900 text-white p-4 justify-between items-center font-semibold">
                    <h2 class="text-xl">User List</h2>
                    @can('User add')
                        <a href="{{ route('admin.users.create') }}">
                            <x-base-button class="border bg-gray-900">
                                Create User
                            </x-base-button>
                        </a>
                    @endcan
                </div>
                <div class="">
                    <ul role="list" class="divide-y divide-gray-100 bg-white rounded-md px-4">
                        @foreach ($users as $user)
                            <x-user-table :name="$user->first_name . ' ' . $user->last_name" :email="$user->email" :src="$user->profile" :roles="$user->roles"
                                :last_seen="$user->last_seen">
                                <div class="flex items-center">
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
                                                <x-alert-form id="{{$user->id}}" route="admin.users.destroy" title="Hello world" desc="Hello world from cambodia" />

                                                <button class="btn" onclick="modal_{{$user->id}}.showModal()">Delete</button>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </x-user-table>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
