<x-partials.card>
    <x-partials.discussion :discussion="$discussion" />
    @foreach($messages as $message)
        <div class="my-2 py-2 border-t border-t-zinc-100" wire:key="{{ $message->id }}">
            <p>{!! $message->content !!}</p>
            <p class="text-sm text-right text-zinc-700">At {{ $message->created_at }} {{ $message->user->full_name }}</p>
        </div>

    @endforeach
</x-partials.card>
