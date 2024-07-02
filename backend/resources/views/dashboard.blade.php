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
            <div class="mx-auto px-6 py-4 flex flex-wrap w-full gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101 101" id="user"><path d="M50.4 54.5c10.1 0 18.2-8.2 18.2-18.2S60.5 18 50.4 18s-18.2 8.2-18.2 18.2 8.1 18.3 18.2 18.3zm0-31.7c7.4 0 13.4 6 13.4 13.4s-6 13.4-13.4 13.4S37 43.7 37 36.3s6-13.5 13.4-13.5zM18.8 83h63.4c1.3 0 2.4-1.1 2.4-2.4 0-12.6-10.3-22.9-22.9-22.9H39.3c-12.6 0-22.9 10.3-22.9 22.9 0 1.3 1.1 2.4 2.4 2.4zm20.5-20.5h22.4c9.2 0 16.7 6.8 17.9 15.7H21.4c1.2-8.9 8.7-15.7 17.9-15.7z"></path></svg>
                <x-overview-card title="Total Users" :number="$users->count()">
                    @slot('icon')
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101 101" id="user"><path d="M50.4 54.5c10.1 0 18.2-8.2 18.2-18.2S60.5 18 50.4 18s-18.2 8.2-18.2 18.2 8.1 18.3 18.2 18.3zm0-31.7c7.4 0 13.4 6 13.4 13.4s-6 13.4-13.4 13.4S37 43.7 37 36.3s6-13.5 13.4-13.5zM18.8 83h63.4c1.3 0 2.4-1.1 2.4-2.4 0-12.6-10.3-22.9-22.9-22.9H39.3c-12.6 0-22.9 10.3-22.9 22.9 0 1.3 1.1 2.4 2.4 2.4zm20.5-20.5h22.4c9.2 0 16.7 6.8 17.9 15.7H21.4c1.2-8.9 8.7-15.7 17.9-15.7z"></path></svg>
                    @endslot
                </x-overview-card>
                <x-overview-card title="Total Systems" :number="$systems->count()"></x-overview-card>
                <x-overview-card title="Total Income" :number="$payments->count() . ' $'"></x-overview-card>
            </div>
        </main>
    </div>
</x-app-layout>
