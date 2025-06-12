@extends("app")
@section("header")
    Patient Chart
@endsection
@section("content")
    <x-card>
        <x-patients.details :patient="$patient" />
    </x-card>
    <x-card>
        <flux:heading size="lg">
            Appointments
        </flux:heading>
        <livewire:appointments :appointments="$patient->appointments" />
    </x-card>
@endsection
