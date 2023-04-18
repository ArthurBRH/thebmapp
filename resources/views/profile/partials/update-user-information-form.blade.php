<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('User Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's Color And See your Job") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="color" :value="__('Color')" />
            <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" :value="old('color', $user->user_info->color)" required autofocus autocomplete="color" />
            <x-input-error class="mt-2" :messages="$errors->get('color')" />
        </div>

        <div>
            <x-input-label for="job" :value="__('Job Type')" />
            <x-text-input id="job" name="job" type="text" class="mt-1 block w-full" :value="old('job', $user->user_info->job)" required autocomplete="job" disabled/>
            <x-input-error class="mt-2" :messages="$errors->get('job')" />

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
