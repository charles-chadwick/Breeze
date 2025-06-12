@extends("app")
@section("header", "Patient List")
@section("content")

@foreach($patients as $patient)
    <x-patients.details :patient="$patient" />
@endforeach

@endsection
