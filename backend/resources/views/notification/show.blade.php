<x-app-layout>
    <main class="flex-1 overflow-x-hidden  bg-gray-200 p-4">
        @if ($notification)
            <div class="flex">
                <h1>
                    <a class="text-lg underline" href="{{ route('admin.dashboard') }}">
                        Home
                    </a>
                    >
                    <a class="text-lg underline" href="{{ route('admin.notifications.index') }}">
                        Notification
                    </a>
                    >
                    {{ $notification->id }}
                </h1>
            </div>
        @endif
        <section class="mt-3 mx-auto flex flex-col justify-center items-center xl:w-8/12 md:w-full p-4 bg-white rounded-md">
            @if ($notification)
                <div class=" h-auto py-5">
                    <div class="flex gap-5">
                        @if ($notification->sender->profile)
                            <img class="h-10 w-10 flex-none rounded-full bg-gray-50"
                                src="http://localhost:8000/images/{{ $notification->sender->profile }}" alt="">
                        @else
                            <svg fill="#bababa" style="width: 100px" viewBox="0 0 512 512" id="_x30_1" version="1.1"
                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#bababa">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,90 c37.02,0,67.031,35.468,67.031,79.219S293.02,248.438,256,248.438s-67.031-35.468-67.031-79.219S218.98,90,256,90z M369.46,402 H142.54c-11.378,0-20.602-9.224-20.602-20.602C121.938,328.159,181.959,285,256,285s134.062,43.159,134.062,96.398 C390.062,392.776,380.839,402,369.46,402z">
                                    </path>
                                </g>
                            </svg>
                        @endif
                        <div class="">
                            <h2 class="font-bold text-xl">
                                {{ $notification->sender->first_name . ' ' . $notification->sender->last_name }}

                                @foreach ($notification->sender->roles as $role)
                                    @if ($role->name == 'user')
                                        @php $role_style = 'gray' @endphp
                                    @endif
                                    @if ($role->name == 'principle')
                                        @php $role_style = 'green' @endphp
                                    @endif
                                    @if ($role->name == 'teacher')
                                        @php $role_style = 'blue' @endphp
                                    @endif
                                    @if ($role->name == 'student')
                                        @php $role_style = 'pink' @endphp
                                    @endif
                                    <span
                                        class="bg-{{ $role_style }}-400 inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white rounded-full">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            </h2>
                            <span class="text-lg">{{ $notification->sender->email }}</span>
                        </div>
                    </div>
                    <div class="mt-5 w-full  bg-gray-100 text-gray-800 p-4">
                        <span class="user-selected-none">{{ $notification->description }}</span>
                    </div>
                    <div class="w-full overflow-hidden mt-5 w-full">
                        <h3 class="font-medium text-lg mb-3">Here is my references</h3>
                        <div class="flex gap-3 flex-wrap">
                            @foreach ($notification->document as $document)
                                <a href="http://localhost:8000/documents/{{ $document->name }}" class="flex flex-col"
                                    target="_blank">
                                    <img class="h-16 rounded-md flex-1 bg-gray-100" src="{{ asset('images/pdf.png') }}"
                                        type="application/pdf"></img>
                                    <span>{{ $document->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex gap-5 justify-between">
                        <form action="" class="flex-1 flex">
                            @csrf
                            <x-button type class="flex-1 bg-red-400">
                                Reject
                            </x-button>
                        </form>
                        <form action="{{ route('admin.send-mail') }}" class="flex-1 flex" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ $notification->sender->email }}">
                            <input type="hidden" name="subject" value="Documetation approving request">
                            <input type="hidden" name="message" value="Your documents reference have been approving!">
                            <x-button class="flex-1 bg-blue-400">
                                Approve
                            </x-button>
                        </form>
                    </div>
                </div>
            @else
                <div class="h-[500px] flex justify-center items-center">
                    <h2 class="text-lg font-medium">Nothing any Notifications found! 🔔</h2>
                </div>
            @endif
        </section>
    </main>
</x-app-layout>
