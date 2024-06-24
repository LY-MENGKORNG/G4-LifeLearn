<!-- component -->
<x-app-layout>
    {{-- {{ dd($systems)}} --}}
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="flex flex-wrap">
            <section class="!mx-auto px-8 w-full">
                <div class="flex justify-between items-center py-3">
                    <h2 class="font-bold text-xl py-5">Systems</h2>
                    <a href="">
                        <button type="button" data-ripple-light="true"
                            class="align-middle select-none  font-bold text-center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
                            New System
                        </button>
                    </a>
                </div>
                <div class="relative flex flex-col w-full bg-clip-border rounded-xl bg-white text-gray-700">
                    <div class="p-6 flex flex-col gap-4  w-full">
                        @can('System access')
                            @foreach ($systems as $system)
                                <div
                                    class="relative flex flex-col bg-clip-border  bg-white text-gray-700 rounded-lg border border-gray-300 p-4">
                                    <div class="mb-4 flex items-start justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="border border-gray-200 p-2.5 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" aria-hidden="true" class="h-6 w-6 text-gray-900">
                                                    <path fill-rule="evenodd"
                                                        d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                                        clip-rule="evenodd"></path>
                                                    <path
                                                        d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div>
                                                <span class="">
                                                    School:
                                                    <span
                                                        class="antialiased font-sans text-sm leading-normal text-blue-gray-900 mb-1 font-bold">
                                                        {{ $system->name }}
                                                    </span>
                                                </span>
                                                <p >
                                                  Location:
                                                  <span
                                                      class="antialiased font-sans text-base font-light leading-relaxed text-inherit !text-gray-600 text-xs font-bold">
                                                      {{ $system->location }}
                                                  </span>
                                                </p>
                                              </div>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <button
                                                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20 flex items-center gap-2"
                                                type="button" data-ripple-dark="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" aria-hidden="true" class="h-4 w-4 text-gray-600">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                    </path>
                                                </svg>
                                                <p
                                                    class="block antialiased font-sans text-base font-light leading-relaxed text-inherit !font-semibold text-xs text-gray-600 md:block hidden">
                                                    Edit
                                                </p>
                                            </button><button
                                                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg text-red-500 hover:bg-red-500/10 active:bg-red-500/30 flex items-center gap-2"
                                                type="button" data-ripple-dark="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" aria-hidden="true" class="h-4 w-4 text-red-500">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <p
                                                    class="block antialiased font-sans text-base font-light leading-relaxed text-inherit !font-semibold text-xs text-red-500 md:block hidden">
                                                    delete
                                                </p>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="flex gap-1">
                                                <p
                                                    class="block antialiased font-sans text-base font-light leading-relaxed text-inherit mb-1 text-xs !font-medium !text-gray-600">
                                                    Contact<!-- -->:
                                                </p>
                                                <p
                                                    class="block antialiased font-sans text-base  leading-relaxed text-blue-gray-900 font-bold">
                                                    {{ $system->user->phone }}
                                                </p>
                                            </div>
                                            <div class="flex gap-1">
                                                <p
                                                    class="block antialiased font-sans text-base font-light leading-relaxed text-inherit mb-1 text-xs !font-medium !text-gray-600">
                                                    Email Address<!-- -->:
                                                </p>
                                                <p
                                                    class="block antialiased font-sans text-base leading-relaxed text-blue-gray-900  font-bold">
                                                    {{ $system->user->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endcan
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
