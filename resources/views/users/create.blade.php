@include('admin.adminheader')
<form method="POST" action="{{ route('register') }}">
        @csrf
<div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8 w-full max-w-screen-lg mt-[1rem]">
    <div class="lg:col-span-2">
        <h2 class="text-sm font-medium">Maak gebruiker aan</h2>
        <div class="bg-white rounded mt-4 shadow-lg">
            <div class="flex items-center px-8 py-5">
                <label class="text-sm font-medium ml-4">Gebruikersnaam & Wachtwoord</label>
            </div>
            <div class="border-t">
                <div class="flex items-center px-8 py-5">
                </div>
                <div class="grid grid-cols-2 gap-4 px-8 pb-8">
                    <div class="col-span-2">
                                        <x-input-label class="text-xs font-semibold" for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="text" name="name" :value="old('name')" placeholder="Naam" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>
                    <div class="">
                                    <x-input-label class="text-xs font-semibold" for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="lex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="email" name="email" :value="old('email')" placeholder="Email" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="">
                        <x-input-label for="job" class="text-xs font-semibold" :value="__('Job')" />
                                        <x-text-input id="job" class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="text" name="job" placeholder="Baan" required />
                                        <x-input-error :messages="$errors->get('job')" class="mt-2" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 px-8 pb-8">
                    <div class="w-[50%] col-span-2">
                    <x-input-label class="text-xs font-semibold" for="color" :value="__('Color')" />
                                    <select class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" id="color" name="color" required>
                                        <option value="black">black</option>
                                        <option value="red">Red</option>
                                        <option value="blue">Blue</option>
                                        <option value="green">Green</option>
                                        <option value="orange">Orange</option>
                                        <option value="sky">Sky</option>
                                        <option value="amber">Amber</option>
                                        <option value="teal">Teal</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('color')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h2 class="text-sm font-medium">Gebruiker info</h2>
        <div class="bg-white rounded mt-4 shadow-lg py-6">
            <div class="px-8">
{{--                <div class="flex items-end">--}}
{{--                    <div class="text-sm font-medium focus:outline-none -ml-1" name="" id="">--}}
{{--                        <option value="">Product (Billed Monthly)</option>--}}
{{--                    </div>--}}
{{--                    <span class="text-sm ml-auto font-semibold">$20</span>--}}
{{--                    <span class="text-xs text-gray-500 mb-px">/mo</span>--}}
{{--                </div>--}}
{{--                <span class="text-xs text-gray-500 mt-2">Save 20% with annual billing</span>--}}
            </div>
{{--            <div class="px-8 mt-4">--}}
{{--                <div class="flex items-end justify-between">--}}
                    <span class="text-sm font-semibold ml-4">Wachtwoord</span>
{{--                    <span class="text-sm text-gray-500 mb-px">Password</span>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="px-8 mt-4 border-t pt-4">
                        <!-- Password -->
                <div class="">
                            <x-input-label class="text-white" for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full text-black"
                                          type="password"
                                          name="password"
                                          required placeholder="**********" autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="">
                            <x-input-label class="text-white" for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input class="text-black" id="password_confirmation" class="block mt-1 w-full text-black"
                                          type="password"
                                          name="password_confirmation" required placeholder="**********" autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
            </div>
{{--            <div class="flex items-center px-8 mt-8">--}}
{{--                <input id="termsConditions" type="checkbox">--}}
{{--                <label class="text-xs text-gray-500 ml-2" for="termsConditions">I agree to the terms and conditions.</label>--}}
{{--            </div>--}}
            <div class="flex flex-col px-8 pt-4">
                <button class="flex items-center justify-center bg-blue-600 text-sm font-medium w-full h-10 rounded text-blue-50 hover:bg-blue-700">Nieuwe Gebruiker</button>
{{--                <button class="text-xs text-blue-500 mt-3 underline">Have a coupon code?</button>--}}
            </div>
        </div>
    </div>
</div>
</form>
