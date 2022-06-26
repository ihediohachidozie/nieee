<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Profile
    </h2>
    <!-- CTA -->
    <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="#">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
            <span>Star this project on GitHub</span>
        </div>
        <span>View more &RightArrow;</span>
    </a>


    <!-- Cards with title -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        <!--      Cards with title -->
    </h4>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Person Information
            </h4>
            <div class="mt-2">
                <div class="flex grid gap-6 md:grid-cols-2">
                    <div class="w-full">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">First Name</span>
                            <input wire:model.defer="firstName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </label>
                    </div>
                    <div class="w-full">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                            <input wire:model.defer="lastName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </label>

                    </div>
                </div>
                <label class="block text-sm mt-2">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input wire:model="email" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                <div class="flex grid gap-6 md:grid-cols-2">
                    <div class="w-full">
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Membership Status</span>
                            <input wire:model="group" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </label>
                    </div>
                    <div class="w-full">
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Membership ID</span>
                            <input wire:model="memberid" disabled class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </label>
                    </div>

                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">About You</span>
                    <textarea wire:model.defer="about" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long form content."></textarea>
                </label>
                <div class="flex justify-end">
                    <div wire:loading wire:target="updateUserInfo" class="px-3 py-1 mt-2">
                        <span class="text-green-700 dark:text-green-400">Saving ....</span>
                    </div>
                    <div>
                        <button wire:click="updateUserInfo" class="px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Update
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Contact Information
            </h4>
            <div class="mt-2">
                <div class="flex grid gap-6 md:grid-cols-2">
                    <div class="w-full">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Phone</span>
                            <input wire:model="phone" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </label>
                    </div>
                    <div class="w-full">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Chapter</span>

                            <select wire:model="chapter_id" id="chapter_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                @foreach($chapters as $chapter)
                                <option value="{{$chapter->id}}">{{$chapter->state}}</option>
                                @endforeach

                            </select>
                        </label>

                    </div>
                </div>
                <div class="flex grid gap-6 md:grid-cols-2">
                    <div class="w-full">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Specialty</span>
                            <select wire:click="changeEvent($event.target.value)" wire:model="specialty_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                @foreach($specialties as $specialty)
                                <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                @endforeach

                            </select>
                        </label>
                    </div>
                    <div class="w-full">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Subspecialty</span>

                            <select wire:model="subspecialty_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                @for($i = 0; $i < count($subspecialties); $i++) <option value="{{$subspecialties[$i]['id']}}">{{$subspecialties[$i]['name']}}</option>
                                    @endfor
                            </select>
                        </label>

                    </div>
                </div>
                <label class="block text-sm mt-2">
                    <span class="text-gray-700 dark:text-gray-400">Address</span>
                    <input wire:model="address" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                <label class="block text-sm mt-2">
                    <span class="text-gray-700 dark:text-gray-400">State of Origin</span>
                    <select wire:model="state" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @foreach($states as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block text-sm mt-2">
                    <span class="text-gray-700 dark:text-gray-400">LGA</span>
                    <input wire:model="lga" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>


                <div class="flex justify-end">
                    <div wire:loading wire:target="updateContact" class="px-3 py-1 mt-2">
                        <span class="text-green-700 dark:text-green-400">Saving ....</span>
                    </div>
                    <div>
                        <button wire:click="updateContact" class="px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Update
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Change Password
            </h4>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Current Password</span>
                <input type="password" wire:model.defer="current_password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" />
                @error('current_password') <span class="error text-red-600">{{ $message }}</span> @enderror

            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400">New Password</span>
                <input type="password" wire:model.defer="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" />
                @error('password') <span class="error text-red-600">{{ $message }}</span> @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400">Re-enter New Password</span>
                <input type="password" wire:model.defer="password_confirmation" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" />
                @error('password_confirmation') <span class="error text-red-600">{{ $message }}</span> @enderror
            </label>
            <div class="mt-2">
                @if (session()->has('msg'))
                <div class="alert text-red-600">
                    {{ session('msg') }}
                </div>
                @endif
            </div>
            <div class="flex justify-end">
                <div wire:loading wire:target="changePassword" class="px-3 py-1 mt-2">
                    <span class="text-green-700 dark:text-green-400">Saving ....</span>
                </div>
                <div>
                    <button wire:click="changePassword" wire:loading.attr="disabled" class="px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Update
                    </button>
                </div>
            </div>

        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Next of kin
            </h4>
            <div class="flex grid gap-6 md:grid-cols-2">
                <div class="w-full">
                    <label class="block text-sm mt-2">
                        <span class="text-gray-700 dark:text-gray-400">First Name</span>
                        <input wire:model="kfirstName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                </div>
                <div class="w-full">
                    <label class="block text-sm mt-2">
                        <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                        <input wire:model="klastName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                </div>

            </div>

            <div class="flex grid gap-6 md:grid-cols-2">
                <div class="w-full">
                    <label class="block text-sm mt-2">
                        <span class="text-gray-700 dark:text-gray-400">Phone</span>
                        <input wire:model="kphone" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                </div>
                <div class="w-full">
                    <label class="block text-sm mt-2">
                        <span class="text-gray-700 dark:text-gray-400">Relationship</span>
                        <select wire:model="relationship" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($relationships as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>

                    </label>
                </div>

            </div>
            <label class="block text-sm mt-2">
                <span class="text-gray-700 dark:text-gray-400">Address</span>
                <input wire:model="kaddress" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </label>

            <div class="flex justify-end">
                <div wire:loading wire:target="updateNextkin" class="px-3 py-1 mt-2">
                    <span class="text-green-700 dark:text-green-400">Saving ....</span>
                </div>
                <div>
                    <button wire:click="updateNextkin" class="px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Update
                    </button>
                </div>
            </div>

        </div>
    </div>