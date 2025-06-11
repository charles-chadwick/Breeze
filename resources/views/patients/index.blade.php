@extends("app")
@section("content")
        @foreach($patients as $patient)
            <x-card>
            <x-patients.details :patient="$patient" />
            </x-card>
        @endforeach
@endsection
