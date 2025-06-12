<div>
    <div class="flex">
        <div class="shrink-0">
            <a href="{{ route('patients.details', $patient) }}" title="Go to patient chart">
            <img
                src="{{ $patient->avatar }}"
                alt="{{ $patient->full_name }}"
                class="w-24 h-24 border mr-4 border-zinc-200 saturate-65 hover:saturate-100"
            ></a>
        </div>
        <div class="w-full">
            <flux:heading size="lg">
                <a href="{{ route('patients.details', $patient) }}" title="Go to patient chart">
                {{ $patient->full_name }} (#{{$patient->id}})
                </a>
            </flux:heading>

            <flux:text class="mt-2 text-zinc-700">
                <p>{{ $patient->gender }}</p>
                <p>{{ $patient->age }} Years Old ({{ $patient->dob }})</p>
            </flux:text>
        </div>
        <div class="shrink-0">
            <flux:badge color="lime">{{ $patient->status }}</flux:badge>
        </div>
    </div>
</div>
