<div class="container px-6 py-2 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Membership Payment
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


    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Chapter 
            </span>
            <select wire:model="chapter_id" id="chapter_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                @foreach($chapters as $chapter)
                <option value="{{$chapter->id}}">{{$chapter->state}}</option>
                @endforeach

            </select>
            @error('chapter_id') <span class="error text-red-600">{{ 'Chapter is required!' }}</span> @enderror
        </label>

        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Membership Type
            </span>
            <div class="mt-2">
                @foreach($membershiptypes as $membershiptype)
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" wire:model="membershiptype_id" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="accountType" value="{{$membershiptype->id}}" />
                    <span class="ml-2">{{$membershiptype->name}}{{' : '}} @money($membershiptype->cost)</span>
                </label>
                @endforeach
            </div>
            @error('membershiptype_id') <span class="error text-red-600">{{ 'Membership Type is required!' }}</span> @enderror
        </div>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Specialty
            </span>

            <select wire:click="changeEvent($event.target.value)" wire:model="specialty_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                @foreach($specialties as $specialty)
                <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                @endforeach

            </select>
            @error('specialty_id') <span class="error text-red-600">{{ 'Specialty is required!' }}</span> @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Subspecialty
            </span>
            <select wire:model="subspecialty_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                @for($i = 0; $i < count($subspecialties); $i++) <option value="{{$subspecialties[$i]['id']}}">{{$subspecialties[$i]['name']}}</option>
                    @endfor
            </select>
            @error('subspecialty_id') <span class="error text-red-600">{{ 'Subspecialty is required!' }}</span> @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">About You</span>
            <textarea wire:model="about" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Berif description of your personality..."></textarea>
            @error('about') <span class="error text-red-600">{{ 'About you is required!' }}</span> @enderror
        </label>
        <div class="flex mt-6 text-sm">
            <label class="flex items-center dark:text-gray-400">
                <input type="checkbox" wire:click="checkEvent($event.target.value)" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                <span class="ml-2">
                    I agree to the
                    <a href="#" class="underline">NIEEE Membership policy</a>
                </span>
            </label>
        </div>
        <div class="py-4">
            <button wire:click="pay"  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Proceed to payment
            </button>
        </div>
    </div>
</div>