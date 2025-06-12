@props([
    "appointments",
    "show_patient" => true
])
<div>
    @foreach($appointments as $appointment)
        <div class="flex m-2 pb-2 border-b border-b-gray-200">
        <div class="w-full">
            <h2>
                <span class="font-bold">{{ $appointment->date }}</span> from
                <span class="font-bold">{{ $appointment->start_time }}</span> to
                <span class="font-bold">{{ $appointment->end_time }}</span>
            </h2>

            @if($show_patient)
            <p>
                <a
                    href="{{ route('patients.details', $appointment->patient->id) }}"
                >
                    <x-badge
                        flat
                        gray
                        label="{{ $appointment->patient->full_name }} (#{{$appointment->patient->id}})"
                    />
                </a>
            </p>
            @endif
            <p class="text-sm font-bold">{{ $appointment->title }}</p>
            <p class="text-sm">{{ $appointment->description }}</p>
        </div>
        <div class="shrink-0 text-right">
            <p>
                <x-badge

                    flat
                    lime
                    label="{{ $appointment->status }}"
                />
            </p>
            <p>
                @foreach($appointment->users as $user)
                    <x-badge

                        flat
                        gray
                        label=" {{ $user->full_name }}"
                    />
                @endforeach
            </p>
        </div>
        </div>
    @endforeach
</div>
