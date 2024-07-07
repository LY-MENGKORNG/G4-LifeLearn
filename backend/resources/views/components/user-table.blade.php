@props([
    'src' => '',
    'name' => '',
    'email' => '',
    'roles' => [],
    'tag' => 'li',
    'role_style' => 'gray',
    'last_seen' => '',
])

<{{ $tag }} class="flex justify-between gap-x-6 py-3">
    <div class="flex min-w-0 gap-x-4">
        @if ($src != '')
            <img class="h-10 w-10 flex-none rounded-full bg-gray-50"
                src="http://localhost:8000/images/{{ $src }}" alt="">
        @else
            <svg fill="#bababa" style="width: 40px" viewBox="0 0 512 512" id="_x30_1" version="1.1" xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#bababa">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,90 c37.02,0,67.031,35.468,67.031,79.219S293.02,248.438,256,248.438s-67.031-35.468-67.031-79.219S218.98,90,256,90z M369.46,402 H142.54c-11.378,0-20.602-9.224-20.602-20.602C121.938,328.159,181.959,285,256,285s134.062,43.159,134.062,96.398 C390.062,392.776,380.839,402,369.46,402z">
                    </path>
                </g>
            </svg>
        @endif
        <div class="min-w-0 flex-auto">
            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $name }}
                @foreach ($roles as $role)
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
            </p>
            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $email }}</p>
        </div>
    </div>
    @if ($tag == 'li')
        <div class="hidden shrink-0 sm:flex justify-center sm:flex-col sm:items-end">
            @section('content')
                @php
                    // Convert the timestamps to DateTime objects
                    $last_seen = new DateTime($last_seen);
                    $current = new DateTime(now());

                    $interval = $last_seen->diff($current);

                    $formattedDuration = sprintf(
                        '%d hours, %d minutes, and %d seconds',
                        $interval->h,
                        $interval->i,
                        $interval->s,
                    );

                    $humanReadableDuration = '';
                    if ($interval->h > 0) {
                        $humanReadableDuration .= $interval->h . ' hours ';
                    }
                    if ($interval->i > 0) {
                        $humanReadableDuration .= $interval->i . ' minutes ';
                    }
                    if ($humanReadableDuration == '') {
                        $humanReadableDuration = 'just now';
                    }
                @endphp
            @endsection
            <p class="mt-1 text-xs leading-5 text-gray-500">
                Last seen
                <time datetime="2023-01-23T13:23Z">
                    <span
                    class="bg-blue-400 inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-white rounded-full">{{ $humanReadableDuration }}
                    
                    </span>
                    ago</time>
            </p>
        </div>
    @endif
    {{ $slot }}
    </{{ $tag }}>
