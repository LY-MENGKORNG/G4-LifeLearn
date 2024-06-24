<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">

                {{-- <h3 class="text-gray-700 text-3xl m-0 p-0 font-medium">Welcome : {{ auth()->user()->first_name. ' '. auth()->user()->last_name }}</h3>                 --}}

                {{-- <p>Role : <b>
                    @foreach (auth()->user()->roles as $role)
                        {{ $role->name }}
                    @endforeach 
                </b> </p> --}}
            </div>
            <div class="container mx-auto px-6 py-4 flex flex-wrap w-full gap-3">

                <div class="p-3 rounded-md flex-1 bg-white mx-auto space-y-2" style="min-width: 200px">
                    <div class="">
                        <span class="">Total Users</span>
                    </div>
                    <div class="">
                        <h1 class="text-2xl font-bold">{{ $dashboard['users']->count() }}</h1>
                    </div>
                </div>
                <div class="p-3 rounded-md flex-1 bg-white mx-auto space-y-2" style="min-width: 200px">
                    <div class="">
                        <span class="">Total Systems</span>
                    </div>
                    <div class="">
                        <h1 class="text-2xl font-bold">{{ $dashboard['systems']->count() }}</h1>
                    </div>
                </div>
                <div class="p-3 rounded-md flex-1 bg-white mx-auto space-y-2" style="min-width: 200px">
                    <div class="">
                        <span class="">Total Payments</span>
                    </div>
                    <div class="">
                        <h1 class="text-2xl font-bold">{{ $dashboard['payments']->count() }}</h1>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
</x-app-layout>
