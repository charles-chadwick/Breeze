@extends("app")
@section("page_header", "Patients")
@section("content")
    <x-card title="Demographics">
        <x-patients.details :patient="$patient" />
    </x-card>
    <x-card title="Appointments">

    </x-card>
@endsection
