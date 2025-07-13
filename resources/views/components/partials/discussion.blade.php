<div>
    <a href="{{ route('discussions.show', $discussion) }}">
        <h3 class="font-bold">{{ $discussion->title }}</h3>
    </a>
    <p cl>{{ $discussion->messages()->count() }} Messages</p>
    <p>Created {{ $discussion->created_at }} by {{ $discussion->user->full_name }}</p>
    <p>Last Message {{ $discussion->messages()->orderBy('created_at', 'desc')->get()->last()->created_at }}
       by {{ $discussion->messages()->orderBy('created_at', 'desc')->get()->last()->user->full_name }}</p>
</div>
