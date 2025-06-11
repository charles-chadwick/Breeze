@extends("app")
@section("content")
    <table>
        <thead>
        <tr>
            <th>MRN</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <th>{{ $patient->id }}</th>
                    <th>{{ $patient->full_name }}</th>
                    <th>{{ $patient->dob }}</th>
                    <th>{{ $patient->gender }}</th>
                    <th>{{ $patient->status }}</th>
                    <th>{{ $patient->email }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
