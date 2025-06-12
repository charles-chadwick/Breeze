@extends("app")
@section("page_header", "Patients")
@section("content")
    <div title="Demographics">
        <x-patients.details :patient="$patient" />
    </div>
    <div class="grid grid-cols-2">
        <div

            class="grid-col-1"
        >
            <h3>Appointments</h3>
            <livewire:appointments
                :appointments="$patient->appointments"
                :show-patient="false"
            />
        </div>
        <div title="Medications" class="grid-col-1">
            <h3>Medications</h3>
        </div>
    </div>
@endsection
