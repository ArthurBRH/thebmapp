<x-guest-layout>
    @if (session('status'))
        <div class="text-white">
            {{ session('status') }}
        </div>
    @endif
    <form method="post" action="{{ route('invited.password') }}">
        @csrf
        <div class="text-white text-centered"> Maak hier je account aan voor Bmapp.nl
        </div>
        <!-- Name -->
        <div>
            <x-input-label class="text-white" for="code" :value="__('Invite code')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" required autofocus/>
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Al een account?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
