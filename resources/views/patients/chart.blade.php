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
            Prescriptions
        </flux:heading>
        <x-prescriptions.index :limit="3" :prescriptions="$patient->prescriptions" />
    </x-card>
    <x-card>
        <flux:heading size="lg">
            Appointments
        </flux:heading>
        <livewire:appointments :appointments="$patient->appointments" />
    </x-card>
@endsection
