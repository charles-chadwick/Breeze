<div>
    @forelse($prescriptions as $prescription)
        <div class="mb-2">
            <flux:heading class="flex">
                <div class="w-full">
                    {{ $prescription->medication->brand_name }} -
                    {{ $prescription->dosage }} -
                    ({{ $prescription->medication->generic_name }})
                </div>
                <div class="shrink-0">

                </div>
            </flux:heading>
            <flux:text class="text-xs">
                Prescribed by {{ $prescription->prescriber->full_name }} on {{ $prescription->prescribed_at }}
            </flux:text>
        </div>
    @empty
        <p>This patient has no prescriptions.</p>

    @endforelse
</div>
