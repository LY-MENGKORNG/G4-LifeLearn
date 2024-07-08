<x-app-layout>
    <main class="flex-1 overflow-x-hidden bg-gray-200">
        <div class="mx-auto xl:px-20 xl:py-4  p-4">
            <form action="{{route('admin.systems.store')}}" method="post">
                @csrf
                @method('post')
                <div  class=""> 
                    <div class="bg-white p-3 rounded-md">
                        <h3 class="font-medium pb-4 text-lg">System</h3>
                        <div class="flex gap-3 w-full">
                            <div class="flex flex-col flex-1 space-y-2">
                                <label for="name" class="text-gray-700 select-none font-medium"> Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Enter system name"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-col flex-1 space-y-2">
                                <label for="location" class="text-gray-700 select-none font-medium"> Location</label>
                                <input id="location" type="text" name="location" value="{{ old('location') }}"
                                    placeholder="Enter system location"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div> 
                        </div> 
                    </div>

                    <div class=" gap-3 p-3 w-full bg-white mt-4 rounded-md">
                        <h3 class="font-medium pb-4 text-lg">Owner</h3>
                        <div class=" ">
                            <div class="flex flex-col flex-1 space-y-2">
                                <label for="owner" class="text-gray-700 select-none font-medium">Email</label>
                                <input id="owner" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter owner email"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div> 
                        </div> 
                    </div>
                </div>
                <div class="w-full flex justify-center">
                    <x-base-button class="font-md bg-blue-500 text-white mt-5">Submit</x-base-button>  
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
