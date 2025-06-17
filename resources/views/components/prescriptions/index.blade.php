@props([
    'limit' => 0,
    'prescriptions'
]
)

<div>
    @forelse($prescriptions as $prescription)
        <x-prescriptions.details :prescription="$prescription" />
    @empty
        <p>This patient has no prescriptions.</p>
    @endforelse
</div>
