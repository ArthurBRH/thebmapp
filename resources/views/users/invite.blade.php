@include('admin.adminheader')
{{--    <div class="user_new">--}}
    <form method="POST" action="{{ route('user.invite.store') }}">
        @csrf
    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8 w-full max-w-screen-lg mt-[1rem]">
        <div class="lg:col-span-2">
            <h2 class="text-sm font-medium">Invite gebruiker</h2>
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
                            <x-input-label for="role" class="text-xs font-semibold" :value="__('Baan')" />
                            <x-text-input id="role" class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="text" name="role" placeholder="Baan" required />
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>
                        <div class="flex flex-col px-8 pt-4">
                            <button class="pr-4 pl-4 flex items-center justify-center bg-blue-600 text-sm font-medium w-full h-10 rounded text-blue-50 hover:bg-blue-700">Invite Gebruiker</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>
