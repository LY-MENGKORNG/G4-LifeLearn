<x-app-layout>

    {{-- {{ dd($user) }} --}}
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-gray-700 text-3xl font-medium">Welcome :
                    {{ auth()->user()->last_name . ' ' . auth()->user()->first_name }}</h3>
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" id="updateProfile" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2">
                            <label for="first_name" class="text-gray-700 select-none font-medium">First Name</label>
                            <input id="first_name" type="text" name="first_name"
                                value="{{ old('first_name', $user->first_name) }}" placeholder="Enter first name"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="last_name" class="text-gray-700 select-none font-medium">Last Name</label>
                            <input id="last_name" type="text" name="last_name"
                                value="{{ old('last_name', $user->last_name) }}" placeholder="Enter last name"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                            <input id="email" type="text" name="email" value="{{ old('email', $user->email) }}"
                                placeholder="Enter email"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex text-gray-500 mt-5">
                            <div class="bg-white rounded-lg">
                                <div class="" x-data="imageData()">
                                    <div x-show="previewUrl == '' && imgurl == ''">
                                        <p class="text-center uppercase text-bold">
                                            <label for="thumbnailprev" class="cursor-pointer">
                                                Upload a file
                                            </label>
                                            <input type="file" name="profile" id="thumbnailprev"
                                                class="hidden thumbnailprev" @change="updatePreview()">
                                        </p>
                                    </div>
                                    <div x-show="previewUrl !== ''" class="relative w-24 h-24">
                                        <img :src="previewUrl" alt=""
                                            class="shadow-lg rounded-full max-w-full align-middle border-none h-full w-full object-cover">
                                        <div class="ml-5">
                                            <button type="button" class=""
                                                @click="clearPreview()">change</button>
                                        </div>
                                    </div>

                                    <div x-show="imgurl !== ''" class="relative w-24 h-24">
                                        <img :src="imgurl" alt=""
                                            class="shadow-lg rounded-full max-w-full align-middle border-none h-full w-full object-cover">
                                        <div class="ml-5">
                                            <button type="button" class=""
                                                @click="clearPreview()">change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-16 mb-16">
                            <button type="submit" data-ripple-light="true"
                                class="align-middle select-none  font-bold text-center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    </div>


    <script>
        function imageData() {
            var files = document.getElementById("thumbnailprev").files;
            if (files.length == 0) {
                var url = '/images/' + {!! json_encode($user->profile) !!};
            } else {
                url = '';
            }
            return {
                previewUrl: "",
                imgurl: url,
                updatePreview() {
                    var reader, files = document.getElementById("thumbnailprev").files;
                    reader = new FileReader();
                    reader.onload = e => {
                        this.previewUrl = e.target.result;
                    };
                    reader.readAsDataURL(files[0]);
                    console.log(document.querySelector('#updateProfile'));
                },
                clearPreview() {
                    document.getElementById("thumbnailprev").value = null;
                    this.previewUrl = "";
                    this.imgurl = "";
                }
            };
        }
    </script>
</x-app-layout>
