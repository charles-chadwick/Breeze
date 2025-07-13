<div>
    <x-partials.card>
        <x-discussions.details
            :discussion="$discussion"
            class="flex flex-wrap items-center justify-between gap-x-6 gap-y-4 py-2 sm:flex-nowrap"
        />
    </x-partials.card>

    <x-partials.card class="mt-2 flow-root">
        <ul
            role="list"
        >
            @foreach($messages as $message)
                <li>
                    <div class="relative pb-4">
                        <div class="relative flex items-start space-x-3">
                            <div class="relative">
                                <img
                                    class="flex size-16 items-center shadow-xs justify-center rounded-lg ring-2 ring-pink-800/20"
                                    src="{{ $message->user->avatar }}"
                                    alt=""
                                />
                            </div>
                            <div class="min-w-0 flex-1">
                                <div>
                                    <div class="text-sm">
                                        <a
                                            href="#"
                                            class="font-medium text-zinc-900"
                                        >{{ $message->user->full_name }}</a>
                                    </div>
                                    <p class="mt-0.5 text-sm text-zinc-500">Replied {{ $message->created_at }}</p>
                                </div>
                                <div class="mt-2 text-sm text-zinc-900">
                                    {!! $message->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </x-partials.card>
</div>
