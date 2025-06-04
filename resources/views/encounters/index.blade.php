<p>{{ __($encounters->count().' Encounters') }}</p>
<ul>
    @forelse($encounters as $encounter)
        <li>{{ $encounter->date_of_service }}</li>
        <li>{{ $encounter->title }}</li>
        <li>{{ $encounter->status }}</li>
    @empty
        <li>{{ __('There are no encounters for this patient') }}</li>
    @endforelse
</ul>
