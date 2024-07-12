<x-app-layout>
    <main class="flex-1 overflow-x-hidden  bg-gray-200">
        <div class="flex flex-wrap">
            <section class="!mx-auto px-8 py-4 w-full">
                @if ($notifications)
                    <div class="">
                        <ul role="list" class="divide-y divide-gray-100">

                            @foreach ($notifications as $notification)
                                <a href="{{ route('admin.notifications.show', $notification->id) }}">
                                    <x-notification :name="$notification->sender->first_name" :src="$notification->sender->profile" :email="$notification->sender->email"
                                        :roles="$notification->sender->roles" :last_seen="$notification->created_at" :message="$notification->description">
                                        <div class="flex items-center flex gap-2">

                                            @can('Notification delete')
                                                <form action="{{ route('admin.notifications.destroy', $notification->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        class="p-2 rounded-full hover:bg-gray-200 hover:shadow-md transition">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16"
                                                                    stroke="#ab4513" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </x-notification>

                                </a>
                            @endforeach

                        </ul>
                    </div>
                @else
                    <div class=" bg-white rounded-md flex justify-center items-center" style="height: 200px">
                        <h2 class="text-lg font-medium">Nothing any Notifications found! 🔔</h2>
                    </div>
                @endif

            </section>
        </div>
    </main>
</x-app-layout>
