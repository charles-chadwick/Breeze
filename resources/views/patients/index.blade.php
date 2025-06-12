@extends("app")
@section("page_header", "Patients")
@section("content")
    @foreach($patients as $patient)
        <x-card>
            <x-patients.details :patient="$patient" />
        </x-card>
    @endforeach
@endsection
