<form wire:submit="save">
    <flux:heading class="mt-1 pb-2">Title</flux:heading>

    <flux:input
        wire:model="title"
        placeholder="Title"
        class="mb-4"
    />

    <flux:error wire:model="title" />

    <flux:heading class="mt-1 pb-2">Content</flux:heading>

    <flux:editor
        wire:model="content"
    />

    <flux:error wire:model="content" />

    <flux:heading class="mt-4 pb-2">Choose Users</flux:heading>

    <flux:select wire:model="selected_user_id">
        <flux:select.option>Select A User or Patient</flux:select.option>
        @foreach($users as $user)
            <flux:select.option
                wire:key="user-{{ $user->id }}"
                wire:click="addUser"
                value="{{ $user->id }}"
            >{{ $user->full_name }}</flux:select.option>
        @endforeach
    </flux:select>

    <div class="flex flex-wrap gap-2 mt-2 text-sm">
        @foreach($selected_users as $user)
            <div
                class="bg-zinc-100 px-3 py-1 rounded flex items-center gap-2"
                wire:key="selected-user-{{ $user->id }}"
            >
                <span>{{ $user['full_name'] }}</span>
                <button
                    wire:click="removeUser({{ $user['id'] }})"
                    class="text-zinc-500 font-bold"
                >x
                </button>
            </div>
        @endforeach
    </div>

    <div class="mt-4 text-center">
        <button
            type="submit"
            class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
        >Save
        </button>
        <button
            @click="close()"
            type="button"
            class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
        >Cancel
        </button>
    </div>
</form>
