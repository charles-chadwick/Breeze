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
                    {{ $prescription->prescribed_at }}
                </div>
            </flux:heading>
            <flux:text>

            </flux:text>
        </div>
    @empty
        <p>This patient has no prescriptions.</p>

    @endforelse
</div>
