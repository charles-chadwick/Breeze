<ul>
    @foreach($encounters as $encounter)
        <li>{{ $encounter->date_of_service }}</li>
        <li>{{ $encounter->title }}</li>
        <li>{{ $encounter->status }}</li>
    @endforeach
</ul>
