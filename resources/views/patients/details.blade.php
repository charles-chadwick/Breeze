@extends("app")
@section("content")
    <x-card>
<x-patients.details :patient="$patient" />
    </x-card>
@endsection
