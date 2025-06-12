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

        <livewire:appointments :appointments="$appointments" />
    </x-card>
@endsection
