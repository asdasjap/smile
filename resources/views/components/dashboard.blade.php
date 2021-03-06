
<x-app-layout>
    <div x-data="{show: false}" >
        <span  @click="show = true;" class="{{session()->has(auth()->user()->email) ? '' : 'hidden' }} cursor-pointer quote__today text-white bg-red-300 block text-center"> {{ session(auth()->user()->email)->quote }}</span>
        <div x-show="show" class="image__quote__modal">
            <img  src="{{ asset("images/quotes/" . session(auth()->user()->email)->image_quote) }}" alt="">
            <div class="close__modal" @click="show = false;">
                <i class=" fas fa-times"></i>
            </div>
        </div>
    </div>
    <div class="bg-gray-200 flex ">
        <div class="w-64 h-screen bg-gray-800 mt-8 sm:mt-0">
            <div class="flex items-center justify-center py-6">
                {{-- <img class="h-6" src="https://premium-tailwindcomponents.netlify.app/assets/svg/tailwindcomponent-light.svg"> --}}
                <p class="text-white uppercase">Smil-e</p>
            </div>

            <nav class="py-10">
                @php
                    $active = 'flex items-center py-2 px-8 bg-gray-700 text-gray-100 border-r-4 border-gray-100';
                    $notActive = 'flex items-center py-2 px-8 text-gray-400 border-r-4 border-gray-800 hover:bg-gray-700 hover:text-gray-100 hover:border-gray-100';
                @endphp
                <a class="" href="/dashboard">
                <a class="{{ request()->routeIs('dashboard') ? $active : $notActive }}" href="/dashboard">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="mx-4 font-medium">Dashboard</span>
                </a>
                {{-- check if admin for admin routes --}}
                @if (auth()->user()->isAdmin)
                    <a class="mt-5 {{ request()->routeIs('accounts') ? $active : $notActive }}" href="#">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <span class="mx-4 font-medium">Accounts</span>
                    </a>

                    <a class="mt-5 {{ request()->routeIs('getQuote') ? $active : $notActive }}" href="/quotes">
                        <i class="fas fa-quote-right"></i>
                        <span class="mx-4 font-medium">Add Quotes</span>
                    </a>

                    <a class="mt-5 {{ request()->routeIs('exercises') ? $active : $notActive }}" href="/exercises">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <span class="mx-4 font-medium">Exercises</span>
                    </a>                  
                    
                @endif
                <a class="mt-5 {{ request()->routeIs('journal') ? $active : $notActive }}" href="#">
                    <i class="far fa-smile-wink"></i>
                    {{-- <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> --}}

                    <span class="mx-4 font-medium">Mood Journal</span>
                </a>

                <a class="mt-5 {{ request()->routeIs('settings') ? $active : $notActive }}" href="/user/settings">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="mx-4 font-medium">Settings</span>
                </a>

               
            </nav>

        </div>

        <div class="w-full bg-gray-200 relative">
            {{-- CONTENT --}}
            {{$slot}}
        </div>
    </div>
            
</x-app-layout>