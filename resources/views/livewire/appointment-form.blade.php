<form wire:action="save">
    @if(session()->has('message'))
    <div class="text-lime-600 p-4 text-center">
        {{ session('message') }}
    </div>
        @endif
    <div class="grid grid-cols-3 gap-x-2">
        <div class="grid-col-1">
            <flux:date-picker
                wire:model="date"
                label="Date"
            />
        </div>
        <div class="grid-col-1">
            <flux:input
                type="time"
                :value="$time"
                wire:model="time"
                label="Time"
            />
        </div>
        <div class="grid-col-1">
            <flux:input
                type="number"
                :value="$length"
                wire:model="length"
                label="Length"
            />
        </div>
    </div>
    <div class="grid grid-cols-3 mt-2 gap-x-2">
        <div class="col-span-2">
            <flux:input
                wire:model="title"
                value="{{ $title }}"
                label="Title"
            />
        </div>

        <div class="grid-col-1">
            <flux:input
                wire:model="type"
                value="{{ $type }}"
                label="Type"
            />
        </div>
    </div>
    <div class="grid mt-2 gap-x-2">
        <flux:editor
            wire:model="description"
            value="{{ $description }}"
            label="Description"
        />
    </div>

    <div class="grid mt-2 gap-x-2">
        <flux:select
            wire:model="user_ids"
            variant="listbox"
            label="Select User(s)"
            placeholder="Choose user..."
        >
            @foreach($users as $user)
                <flux:select.option>{{ $user->full_name }}</flux:select.option>
            @endforeach
        </flux:select>
    </div>

    <div class="mt-2 text-center">
        <flux:button
            wire:click="save"
            variant="primary"
        >Save
        </flux:button>
        <flux:button
            wire:click="save"
            variant="primary"
        >Save
        </flux:button>
    </div>

</form>
