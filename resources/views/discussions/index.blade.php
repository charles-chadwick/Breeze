<p>{{ __($discussions->count().' Discussions') }}</p>
<ul>
    @forelse($discussions as $discussion)
        <li>{{ $discussion->title }}</li>
        <li>{{ $discussion->status }}</li>
    @empty
        <li>{{ __('There are no discussions for this patient') }}</li>
    @endforelse
</ul>
