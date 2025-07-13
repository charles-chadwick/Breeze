<div>
    <x-partials.card>
        <ul
            role="list"
            class="divide-y divide-zinc-100"
        >
            @forelse($discussions as $discussion)

                <x-discussions.details
                    :discussion="$discussion"
                    class="flex flex-wrap items-center justify-between gap-x-6 gap-y-4 py-5 sm:flex-nowrap"
                />

            @empty
                <p>There are no discussions.</p>
            @endforelse
        </ul>
    </x-partials.card>
</div>


