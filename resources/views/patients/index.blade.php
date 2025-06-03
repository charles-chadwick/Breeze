<ul>
    @foreach($patients as $patient)
        <li>{{ $patient->full_name }}</li>
    @endforeach
</ul>
