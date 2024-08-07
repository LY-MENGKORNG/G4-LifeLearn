<x-app-layout>
    <main class="w-full overflow-x-hidden  bg-gray-100 p-4">
        @if (!$status)
            <p class="text-green-500">Please check your internet connection</p>
        @else
            <div
                class="relative flex flex-col w-full overflow-hidden  text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                <div class="p-6 bg-blue-200">
                    <h5
                        class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Recent Transactions
                    </h5>
                    <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                        These are details about the last transactions
                    </p>
                </div>
                <div class="p-6 px-0 ">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Transaction
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Amount
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Date
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Status
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Account
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    </p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                {{-- @dd($payment) --}}
                                <tr>
                                    <td class="p-4 border-b border-blue-gray-50">
                                        <div class="flex items-center gap-3">
                                            <p
                                                class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                                {{ $payment->payment_method_details->card->brand }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="p-4 border-b border-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            $300.00
                                        </p>
                                    </td>
                                    <td class="p-4 border-b border-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            Wed 3:00pm
                                        </p>
                                    </td>
                                    <td class="p-4 border-b border-blue-gray-50">
                                        <div class="w-max">
                                            <div
                                                class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                                <span class="">{{ $payment->status }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 border-b border-blue-gray-50">
                                        <div class="flex items-center gap-3">
                                            {{-- <div class="w-12 p-1 border rounded-md h-9 border-blue-gray-50">
                                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/logos/visa.png"
                                                    alt="visa"
                                                    class="relative inline-block h-full w-full !rounded-none  object-contain object-center p-1" />
                                            </div> --}}
                                            <div class="flex flex-col">
                                                <p
                                                    class="block font-sans text-sm antialiased font-normal leading-normal capitalize text-blue-gray-900">
                                                    {{ $payment->billing_details->name }}
                                                </p>
                                                <p
                                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70">
                                                    {{-- {{$payment}} --}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 border-b border-blue-gray-50">
                                        <button
                                            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16"
                                                            stroke="#ab4513" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        @endif
    </main>
</x-app-layout>
