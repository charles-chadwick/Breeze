<div {{ $attributes->merge(['class']) }}>
    <h3 class="font-bold"><a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a></h3>
    <div class="my-1">
        <p>{{ $discussion->messages()->count() }} Messages</p>
        <p class="my-1">
            Created <x-partials.date :datetime="$discussion->created_at" />
            by <x-users.details :user="$discussion->user" />
        </p>
        <p class="my-1">
            Last Message <x-partials.date :datetime="$discussion->messages()->orderBy('created_at', 'desc')->get()->last()->created_at" />
            by <x-users.details :user="$discussion->messages()->orderBy('created_at', 'desc')->get()->last()->user" />
        </p>
    </div>

</div>
