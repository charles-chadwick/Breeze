@extends("app")
@section("page_header", "Patients")
@section("content")
    <x-card title="Demographics">
        <x-patients.details :patient="$patient" />
    </x-card>
    <div class="grid grid-cols-2">
    <x-card title="Appointments" class="grid-col-1">
        <livewire:appointments :appointments="$patient->appointments" :show-patient="false" />
    </x-card>
        <x-card title="Medications">

        </x-card>
    </div>
@endsection
