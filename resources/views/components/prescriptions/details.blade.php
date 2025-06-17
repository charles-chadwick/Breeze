<div
    class="mb-2"
    wire:key="{{ $prescription->id }}"
>
    <flux:heading class="flex">
        <a
            class="w-full"
            href="#"
        >
            <flux:modal.trigger name="prescription-form-{{ $prescription->id }}">
                {{ $prescription->medication->brand_name }} -
                {{ $prescription->dosage }} -
                ({{ $prescription->medication->generic_name }})
            </flux:modal.trigger>
        </a>
        <flux:modal name="prescription-form-{{ $prescription->id }}">
            <livewire:prescription-form :prescription="$prescription" />
        </flux:modal>
        <div class="shrink-0">

        </div>
    </flux:heading>
    <flux:text class="text-xs">
        Prescribed by {{ $prescription->prescriber->full_name }} on {{ $prescription->prescribed_at }}
    </flux:text>
</div>
