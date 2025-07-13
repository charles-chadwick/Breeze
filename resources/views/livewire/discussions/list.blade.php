<div>
    <x-partials.card class="my-4 divide-zinc-100 divide-y-2">
        @forelse($discussions as $discussion)
            <div
                wire:key="{{ $discussion->id }}"
                class="py-4 "
            >
                <a href="{{ route('discussions.show', $discussion) }}">
                    <h3 class="font-bold">{{ $discussion->title }}</h3>
                </a>
                <p>{{ $discussion->messages()->count() }} Messages</p>
                <p>Created {{ $discussion->created_at }} by {{ $discussion->user->full_name }}</p>
                <p>Last Message {{ $discussion->messages()->orderBy('created_at', 'desc')->get()->last()->created_at }}
                   by {{ $discussion->messages()->orderBy('created_at', 'desc')->get()->last()->user->full_name }}</p>
            </div>
        @empty
            <p>There are no discussions.</p>
        @endforelse
    </x-partials.card>
</div>
