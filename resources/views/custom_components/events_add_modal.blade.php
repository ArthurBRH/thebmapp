<div id="events-modal-create" class="modalevent">
<div class="user_new">
    <form class="user_new_form bg-primary" method="POST" action="{{ route('event.store') }}">
        <div class="user_new_content">
            @csrf
<span id="events-modal_close" class="cursor-pointer">X</span>
            <!-- Title -->
            <div>
                <x-input-label class="text-white" for="title" :value="__('Title')" />
                <x-text-input id="title" class="text-black block mt-1 w-full" type="text" name="title" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Date -->
            <div class="mt-4">
                <x-input-label class="text-white" for="date" :value="__('Date')" />
                <x-text-input id="date" class="text-black block mt-1 w-full" type="date" name="date" required />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>

            <!-- Time -->
            <div class="mt-4">
                <x-input-label class="text-white" for="time" :value="__('Time')" />
                <x-text-input id="begin_time" class="text-black block mt-1 w-full" type="time" name="begin_time" required />
                <x-text-input id="end_time" class="text-black block mt-1 w-full" type="time" name="end_time" required />
                <x-input-error :messages="$errors->get('time')" class="mt-2" />
            </div>
            <!-- Description -->
            <div class="mt-4">
                <x-input-label class="text-white" for="description" :value="__('Description')" />
                <x-text-input id="description" class="text-black block mt-1 w-full" type="text" name="description" required />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <!-- Users -->
            <div class="mt-4">
                <x-input-label class="text-white" for="user_id" :value="__('Users')" />
                <select id="user_id" class="text-black block mt-1 w-full" type="text" name="user_id[]" multiple>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{ $user->name }}</option>
                    @endforeach
                </select>                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>


            <div class="flex items-center justify-center mt-4">
                <button class="ml-4">
                    {{ __('New Event') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
