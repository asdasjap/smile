<x-dashboard>
    <div class="settings-container grid grid-cols-12 auto-rows-min h-full w-full">
        <div class="settings-form bg-gray-300 col-span-8 col-start-3 mt-6">
            <div class="profile-container grid py-6 grid-cols-6">
                <div class="img-holder relative col-span-3  flex justify-center py-3 px-7">
                    <span class="img-holder-inside ml-20  relative">
                        <img class="rounded-full " width="150" height="150" src="{{ asset('public/' . $user->image_profile) }}" alt="" srcset="">
                        <form action="" x-data="{clicked: false}" enctype="multipart/form-data" id="image-upload-form" class="absolute top-0 w-full h-full">
                            {{-- document.getElementById('input-imageupload').click() --}}
                            <label for="block" >
                                <div class="flex justify-center items-center upload-trigger rounded-full bg-gray-500 h-full opacity-0 hover:opacity-50" @click="document.getElementById('input-imageupload').click();">
									<i class="fas fa-user-edit text-white text-lg ml-3"></i>
								</div>
                                <input id="input-imageupload" name="image_profile" type="file" hidden>
                            </label>
                        </form>
                    </span>
                    
                </div>
                <div class="user-data flex justify-center flex-col col-span-3">
                    <h1 class="uppercase font-semibold">name: {{ $user->name }}</h1>
                    <h2 class="mt-3 font-semibold">EMAIL: {{$user->email}}</h2>
                    <h2 class="mt-3 font-semibold">STRESS LEVEL: {{$user->score}}</h2>
                </div>

                <form class="py-4 px-5 col-span-6 grid grid-cols-12 gap-5" action="/user/{{$user->id}}/settings" method="post">
                    <div class="col-span-6 ">
                        <label class="block mt-10">
                            <span class="text-gray-700 uppercase">Name</span>
                            <input type="text" name="name" class="mt-1 block w-full" placeholder="" value="{{ $user->name }}">
                        </label>
                        <label class="block mt-10">
                            <span class="text-gray-700 uppercase">email</span>
                            <input type="text" name="email" class="mt-1 block w-full" placeholder="" value="{{ $user->email }}">
                        </label>
						<label class="block mt-10">
                            <span class="text-gray-700 uppercase">new password</span>
                            <input type="password" name="password" class="mt-1 block w-full" placeholder=""     >
                        </label>
						<label class="block mt-10">
							<span class="text-gray-700 uppercase">confirm new password</span>
							<input type="password" name="password" class="mt-1 block w-full" placeholder=""     >
						</label>
                        
                    </div>
                   <div class="col-span-6">
					   <label class="block mt-10">
						   <span class="text-gray-700 uppercase">school</span>
						   <input type="text" name="school" class="mt-1 block w-full" placeholder="" value="{{ $user->school }}">
					   </label>
                        <label class="block mt-10">
                            <span class="text-gray-700 uppercase">guardian name</span>
                            <input type="text" name="guardian_name" class="mt-1 block w-full" placeholder="" value="{{ $user->guardian_name }}">
                        </label>
                        <label class="block mt-10">
                            <span class="text-gray-700 uppercase">guardian email</span>
                            <input type="text" name="guardian_email" class="mt-1 block w-full" placeholder="" value="{{ $user->guardian_email }}">
                        </label>
                   </div>
				  
				   <button type="submit" class="col-span-2 py-2 px-4 col-start-6 uppercase bg-blue-500 text-white">Submit</button>
                </form>

               
            </div>
        </div>
    </div>
</x-dashboard>