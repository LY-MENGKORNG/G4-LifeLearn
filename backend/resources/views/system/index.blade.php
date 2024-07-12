<!-- component -->
<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
 
        <div class="flex flex-wrap">
            <section class="!mx-auto p-3 w-full"> 
                @can('System access')
                    <div class="w-full  xl:mb-0 mx-auto ">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-blueGray-700">Systems List</h3>
                                    </div>
                                    <div class="relative w-full px-2 max-w-full flex-grow flex-1 text-right">
                                        @can('System add')
                                            <a href="{{ route('admin.systems.create')}}">
                                                <x-base-button type="button" class="bg-blue-600 text-white">
                                                     
                                                    New System
                                                </x-base-button>
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center bg-transparent w-full border-collapse ">
                                    <thead class="bg-blue-200">
                                        <tr>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Owner </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                System Name </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Created Date </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Actions </th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($systems as $system)
                                            <x-system-table :name="$system->first_name . ' ' . $system->last_name" :email="$system->email" :src="$system->profile"
                                                :location="$system->location" :system_name="$system->name" :created_date="$system->created_at">
                                                <td
                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                                    @can('System edit')
                                                        <button
                                                            class="p-2 selected-none rounded-full hover:bg-gray-200 hover:shadow-md transition">
                                                            <a href="{{ route('admin.systems.edit', $system->id) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                    fill="currentColor" aria-hidden="true" class="w-4 h-4">
                                                                    <path
                                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                                    </path>
                                                                </svg></a>

                                                            </span>
                                                        </button>
                                                    @endcan
                                                    @can('System delete')
                                                        <form action="{{ route('admin.systems.destroy', $system->id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                class="p-2 selected-none rounded-full hover:bg-gray-200 hover:shadow-md transition">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <path
                                                                            d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16"
                                                                            stroke="#ab4513" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </x-system-table>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div> 
                @endcan
            </section>
        </div>
    </main>
</x-app-layout>
