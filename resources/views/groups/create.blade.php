<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('groups') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus
                                      autocomplete="name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                        <x-input-label for="description" :value="__('Description')"/>
                        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                                      required/>
                        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                        @include('custom_components.add_icon')
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
