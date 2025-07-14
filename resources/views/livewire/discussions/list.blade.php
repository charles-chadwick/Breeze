<div>
    @forelse($discussions as $discussion)
        <x-partials.card class="mb-4">
            <x-discussions.details
                :discussion="$discussion"
            />
        </x-partials.card>
    @empty
        <p>There are no discussions.</p>
    @endforelse
</div>
