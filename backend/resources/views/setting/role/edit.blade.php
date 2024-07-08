<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-4">
        <div class="flex">
            <h1>
                <a class="text-lg underline" href="{{ route('admin.dashboard') }}">
                    Home
                </a>
                >
                <a class="text-lg underline" href="{{ route('admin.roles.index') }}">
                    Role
                </a>
                > 
                {{$role->name}}
            </h1>
        </div>
        <div class="container mx-auto">
            <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                    @csrf
                    @method('put')
                    <div class="flex flex-col space-y-2">
                        <label for="role_name" class="text-gray-700 select-none font-medium">Role Name</label>
                        <input id="role_name" type="text" name="name" value="{{ old('name', $role->name) }}"
                            placeholder="Placeholder"
                            class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                    </div>

                    <h3 class="text-xl my-4 text-gray-600">Permissions</h3>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($permissions as $permission)
                            <div class="flex flex-col justify-cente">
                                <div class="flex flex-col">
                                    <label class="inline-flex items-center mt-3">
                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                            name="permissions[]" value="{{ $permission->id }}"
                                            @if (count($role->permissions->where('id', $permission->id))) checked @endif><span
                                            class="ml-2 text-gray-700">{{ $permission->name }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-16">
                        <button type="submit" data-ripple-light="true"
                            class="align-middle select-none font-sans font-bold text-center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
                            Submit
                        </button>
                    </div>
            </div>
        </div>
    </main>
</x-app-layout>
