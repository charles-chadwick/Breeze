<div>
    <x-partials.card class="divide-zinc-100 divide-y">
        @forelse($discussions as $discussion)
            <div
                wire:key="{{ $discussion->id }}"
                class="py-2 text-sm"
            >
                <x-discussions.details :discussion="$discussion" />
            </div>
        @empty
            <p>There are no discussions.</p>
        @endforelse
    </x-partials.card>
</div>
