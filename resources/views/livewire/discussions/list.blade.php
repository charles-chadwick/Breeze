<div>
    @forelse($discussions as $discussion)
        <div wire:key="{{ $discussion->id }}">
            <h3>{{ $discussion->title }}</h3>
            <p>Created {{ $discussion->created_at }} by {{ $discussion->user->full_name }}</p>
        </div>
    @empty
        <p>There are no discussions.</p>
    @endforelse
</div>
