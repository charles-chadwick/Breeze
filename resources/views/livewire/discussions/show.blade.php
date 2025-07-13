<div>
    <x-partials.card>
        <x-discussions.details class="text-sm" :discussion="$discussion" />
    </x-partials.card>

    <x-partials.card class="mt-2 text-sm">
        @foreach($messages as $message)
            <div
                class="py-2  @if(!$loop->last) border-b border-b-zinc-100 @endif"
                wire:key="{{ $message->id }}"
            >
                <p class="text-sm font-bold">
                    <x-partials.date :datetime="$message->created_at" />
                    <x-users.details :user="$message->user" />
                    said:
                </p>

                <p class="mt-2">{!! $message->content !!}</p>
            </div>
        @endforeach
    </x-partials.card>
</div>
