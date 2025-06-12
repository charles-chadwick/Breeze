@extends("app")
@section("header")
    Patient Chart
@endsection
@section("content")
    <x-patients.details :patient="$patient" />
@endsection
