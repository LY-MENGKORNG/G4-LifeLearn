<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                    @can('Permission add')
                        <a href="{{ route('admin.permissions.create') }}">
                            <button type="submit" data-ripple-light="true"
                                class="align-middle select-none font-sans font-bold text-center  transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
                                New Permission
                            </button>
                        </a>
                    @endcan
                </div>

                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                    Permission Name</th>

                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @can('Permission access')
                                @foreach ($permissions as $permission)
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6 border-b border-grey-light">{{ $permission->name }}</td>
                                        <td class="py-4 px-6 border-b border-grey-light text-right">
                                            @can('Permission edit')
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                                            @endcan

                                            @can('Permission delete')
                                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endcan

                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
    </div>
</x-app-layout>
