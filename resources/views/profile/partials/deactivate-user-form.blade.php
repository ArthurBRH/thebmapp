<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Deactivate Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deactivated, you can choose to activate your account again') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deactivate')"
    >{{ __('Deactivate Account') }}</x-danger-button>

    <x-modal name="confirm-user-deactivate" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('deactivate') }}" class="p-6">
            @csrf
            @method('put')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to deactivate your account?') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Deactivate Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
