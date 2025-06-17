<form wire:action="save">
    @if(session()->has('message'))
        <div class="text-lime-600 p-4 text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="grid grid-cols-2 gap-x-2">
        <div class="grid-col-2">
            <flux:select wire:model="medication_id" label="Medication">
                @foreach($medications as $medication)
                    <flux:select.option value="{{ $medication->id }}">{{ $medication->brand_name }}
            ({{ $medication->generic_name }})
                    </flux:select.option>
                @endforeach
            </flux:select>
        </div>
        <div class="grid-col-1">
            <flux:input
                type="dosage"
                :value="$dosage"
                wire:model="dosage"
                label="Dosage"
            />
        </div>

    </div>
    <div class="grid grid-cols-2 mt-2 gap-x-2">
        <div class="col-span-1">
            <flux:select wire:model="frequency" label="Frequency">
                @foreach($frequencies as $frequency)
                    <flux:select.option>{{ $frequency }}
                    </flux:select.option>
                @endforeach
            </flux:select>
        </div>

        <div class="grid-col-1">
            <flux:select wire:model="route" label="Route of Administration">
                @foreach($routes as $route)
                    <flux:select.option>{{ $route }}
                    </flux:select.option>
                @endforeach
            </flux:select>
        </div>
    </div>
    <div class="grid mt-2 gap-x-2">
        <flux:editor
            wire:model="instructions"
            value="{{ $instructions }}"
            label="Instructions"
        />
    </div>

    <div class="mt-2 text-center">
        <flux:button
            wire:click="save"
            variant="primary"
        >Save
        </flux:button>

    </div>

</form>
