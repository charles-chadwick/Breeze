@extends("app")
@section("page_header", "Medications Database")
@section("content")
    <table>
        <thead>
        <tr>
            <th>Generic Name</th>
            <th>Brand Name</th>
            <th>Strength</th>
            <th>Dose Form</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medications as $medication)
            <tr>
                <td>{{ $medication->generic_name }}</td>
                <td>{{ $medication->brand_name }}</td>
                <td>{{ $medication->strength }}</td>
                <td>{{ $medication->dose_form }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
