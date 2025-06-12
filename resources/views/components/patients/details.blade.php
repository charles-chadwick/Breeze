<div class="flex">
    <div class="shrink-0">
        <x-avatar xl rounded="md" src="{{ $patient->avatar }}" class="mx-2 my-1" />
    </div>
    <div class="w-full">
        <a href="{{ route('patients.details', $patient) }}">
        <h1 class="font-bold">{{ $patient->full_name }} (#{{ $patient->id }})</h1>
        </a>
        <div class="text-sm">
            <p>{{ $patient->dob }}</p>
            <p>{{ $patient->gender }}</p>
            <p>{{ $patient->email }}</p>
        </div>
    </div>

    <div class="flex-0 text-right">
        <x-badge
            icon="inbox-stack"
            flat lime
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
