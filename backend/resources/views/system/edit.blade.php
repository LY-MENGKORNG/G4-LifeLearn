<x-app-layout>
    <main class="flex-1 overflow-x-hidden  bg-gray-200 p-4">
        <h1>
            <a class="text-lg underline" href="{{ route('admin.dashboard') }}">
                Home
            </a>
            >
            <a class="text-lg underline" href="{{ route('admin.systems.index') }}">
                Systems
            </a>
            > 
            {{$system->id}}
        </h1>
        <div class="mx-auto mt-3">
            <form method="POST" action="{{ route('admin.systems.update', $system->id) }}" class="w-full flex flex-col">
                @csrf
                @method('put')
                <div class="flex flex-wrap  justify-start gap-4">
                    <div class="flex-1 m-auto bg-white p-6 rounded-md">
                        <h3 class="font-bold text-xl pb-4">Owner </h3>
                        <div class="flex gap-4">
                            <div class="flex flex-1 flex-col space-y-2">
                                <label for="fist_name" class="text-gray-700 select-none font-medium">First Name</label>
                                <input id="fist_name" type="text" name="first_name"
                                    value="{{ old('last_name', $principle->first_name) }}" placeholder="First Name"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-1 flex-col space-y-2">
                                <label for="last_name" class="text-gray-700 select-none font-medium">Last Name</label>
                                <input id="last_name" type="text" name="last_name"
                                    value="{{ old('last_name', $principle->last_name) }}" placeholder="Owner Name"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                        </div>
                        <div class="flex gap-4 mt-3"> 
                            <div class="flex flex-1 flex-col space-y-2">
                                <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                                <input id="email" type="text" name="email"
                                    value="{{ old('email', $principle->email) }}" placeholder="Email"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-1 flex-col space-y-2">
                                <label for="phone" class="text-gray-700 select-none font-medium">Phone</label>
                                <input id="phone" type="text" name="phone"
                                    value="{{ old('phone', $principle->phone) }}" placeholder="Phone"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                        </div> 
                    </div> 

                    <div class="flex-1 m-auto bg-white p-6 rounded-md  ">
                        <h3 class="font-bold text-xl pb-4">System </h3>
                        <div class="flex gap-4 mt-3"> 
                            <div class="flex flex-1 flex-col space-y-2">
                                <label for="name" class="text-gray-700 select-none font-medium">System Name</label>
                                <input id="name" type="text" name="name"
                                    value="{{ old('name', $system->name) }}" placeholder="System Name"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-1 flex-col space-y-2">
                                <label for="location" class="text-gray-700 select-none font-medium">Location</label>
                                <input id="location" type="text" name="location"
                                    value="{{ old('location', $system->location) }}" placeholder="Location"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                        </div> 
                    </div> 
                </div>

                <div class="text-center my-5">
                    <x-base-button class="border bg-blue-700 text-white ">Submit</x-base-button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
