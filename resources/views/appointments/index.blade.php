@php use App\Enums\AppointmentStatus; @endphp
@extends("app")
@section("page_header", "Appointments")
@section("content")
    <x-card>
        <form
            action=""
            class="flex"
        >
            <x-native-select
                class="w-full"
                name="status"
                label="Select Status"
                placeholder="Select one status"
                selected="{{ request('status') }}"
                :options="AppointmentStatus::array()"
            />
            <div class="shrink-0">
                <x-button type="submit">Submit</x-button>
            </div>
        </form>

        @foreach($appointments as $appointment)
            <div class="flex">
                <div class="w-full">
                    <h2>
                        <span class="font-bold">{{ $appointment->date }}</span> from
                        <span class="font-bold">{{ $appointment->start_time }}</span> to
                        <span class="font-bold">{{ $appointment->end_time }}</span>
                    </h2>
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
                    <p class="text-sm">{{ $appointment->title }}</p>
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

        @endforeach</x-card>
@endsection
