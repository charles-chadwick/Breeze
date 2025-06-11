<div class="flex">
    <div class="w-full">
        <h1 class="font-bold w-full">{{ $patient->full_name }} (#{{ $patient->id }})</h1>
        <div class="text-sm">
            <p>{{ $patient->dob }}</p>
            <p>{{ $patient->gender }}</p>
            <p>{{ $patient->email }}</p>
        </div>
    </div>

    <div class="flex-0 text-right">
        <x-badge
            icon="inbox-stack"
            positive
            label="{{ $patient->status }}"
        />
        <x-dropdown position="bottom-end">
            <x-slot name="trigger">
                <x-button
                    icon="ellipsis-horizontal-circle"
                    label="Options"
                    white
                />
            </x-slot>
            <x-dropdown.item label="Settings" href="{{ route('patients.details', $patient) }}" />
        </x-dropdown>
    </div>

</div>
