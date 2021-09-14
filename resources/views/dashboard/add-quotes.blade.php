<x-dashboard>
    <div class="quotes w-full h-full absolute top-0 left-0"  x-data="{show: {{$errors->any() ? 'true' : 'false'}}}">

        <div class="ml-5 mt-10">
            <x-button @click="show=true; document.querySelector('.modal').classList.remove('hidden')">Add Qoutes</x-button>
        </div>

        <div class=" p-6 h-3/6">
            <div class=" w-3/4 mx-auto h-full bg-gray-200 p-4">
                @foreach ($quotes as $quote)
                    <div class="mt-4  py-2 cursor-pointer">
                        - {{ $quote->quote }}
                        <i class="fas fa-arrow-right ml-2 text-gray-800"></i>
                    </div>
                @endforeach
            </div>

            {{ $quotes->links() }}
        </div>

        <div x-show="show" class="modal {{$errors->any() ? '' : 'hidden'}}">
            <div class="absolute right-5 top-5 cursor-pointer w-5 p-2 flex justify-center items-center" @click="show=false">
                <i class="text-lg fas fa-times text-white"></i>
            </div>
            <div class="min-h-screen  flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
                <form action="/add-quotes" class="py-6 px-10 bg-gray-200" method="POST" enctype="multipart/form-data">
                @csrf
                    <div>
                        <x-label for="quote" :value="__('Quote')" />
        
                        <x-input id="quote" class="block mt-1 w-full" type="text" name="quote" :value="old('quote')"   />

                        @error('quote')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-label for="image_quote" :value="__('Image')" />
        
                        <x-input id="image_quote" class="block mt-1 w-full" type="file" name="image_quote"   />
                        @error('image_quote')
                            <p class="text-red-400 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex justify-end  mt-10">
                        <x-button>Submit</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard>