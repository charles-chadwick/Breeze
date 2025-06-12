@extends("app")
@section("header", "Patient List")
@section("content")

@foreach($patients as $patient)
    <x-card>
        <x-patients.details :patient="$patient" />
    </x-card>
@endforeach

@endsection
