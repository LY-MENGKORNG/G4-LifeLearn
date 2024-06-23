<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">

                <h3 class="text-gray-700 text-3xl m-0 p-0 font-medium">Welcome : {{ auth()->user()->first_name. ' '. auth()->user()->last_name }}</h3>                

                {{-- <p>Role : <b>
                    @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                    @endforeach 
                </b> </p> --}}
            </div>
            <div class="container mx-auto px-6 py-4 flex flex-wrap w-full gap-3">
                <div class="p-3 rounded-md flex-1 bg-white mx-auto" style="min-width: 200px">
                    <h1 class="text-2xl font-bold">Total Users</h1>
                    {{$dashboard['users']->count()}}
                </div>
                <div class=" p-3 rounded-md flex-1 bg-white mx-auto" style="min-width: 200px">
                    <h1 class="text-2xl font-bold">Total Systems</h1>
                    {{$dashboard['systems']->count()}}
                </div>
                <div class=" p-3 rounded-md flex-1 bg-white mx-auto" style="min-width: 200px">
                    <h1 class="text-2xl font-bold">Total Incomes</h1>
                    {{$dashboard['payments']->count()}}
                </div>
            </div>  
        </main>
    </div>
</div>
</x-app-layout>
