<div {{ $attributes }}>
    <div>
        <p class="text-sm/6 font-semibold text-zinc-900">
            <a
                href="{{ route('discussions.show', $discussion) }}"
                class="hover:underline"
            >{{ $discussion->title }}</a>
        </p>
        <div class="mt-1 items-center gap-x-2 text-sm/4 text-zinc-500">
            <p>
                <a
                    href="#"
                    class="hover:underline"
                >{{ $discussion->user->full_name }}</a>
            </p>
            <p>
                <time datetime="2023-01-23T22:34Z">{{ $discussion->lastPost()->created_at }}</time>
            </p>
        </div>
    </div>
    <dl class="flex w-full flex-none justify-between gap-x-8 sm:w-auto">
        <div class="flex -space-x-0.5">
            <dt class="sr-only">People in this conversation</dt>
            @foreach($discussion->users as $user)
                <dd>
                    <img
                        class="size-6 rounded-full bg-zinc-50 ring-2 ring-white"
                        src="{{ $user->avatar }}"
                        alt="{{ $user->full_name }}"
                        title="{{ $user->full_name }}"
                    />
                </dd>
            @endforeach
        </div>
        <div class="flex w-16 gap-x-2.5">
            <dt>
                <span class="sr-only">Total messages</span>
                <a href="{{ route('discussions.show', $discussion) }}">
                    <svg
                        class="size-6 text-zinc-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        aria-hidden="true"
                        data-slot="icon"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"
                        />
                    </svg>
                </a>
            </dt>
            <a href="{{ route('discussions.show', $discussion) }}">
                <dd class="text-sm/6 text-zinc-900">{{ $discussion->messages()->count() }}</dd>
            </a>
        </div>
    </dl>
</div>
