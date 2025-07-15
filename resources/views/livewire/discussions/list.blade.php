<div>

    <!-- sorting and searching -->
    <x-partials.card class="my-4">
        <x-partials.sort />
        <x-partials.modal
            id="add-discussion-form"
            href="#"
            class="cursor-pointer"
        >
            <livewire:discussion-form modal_id="add-discussion-form" />
        </x-partials.modal>
        <x-partials.modal.trigger
            class="w-1/2"
            id="add-discussion-form"
        >
            Add New Discussion
        </x-partials.modal.trigger>
    </x-partials.card>

    @forelse($discussions as $discussion)
        <x-partials.card class="mb-4">
            <x-discussions.details
                :discussion="$discussion"
            />
        </x-partials.card>
    @empty
        <p>There are no discussions.</p>
    @endforelse

    <x-partials.card class="mt-4">
        <div class="pt-2">
            {{ $discussions->links() }}
        </div>
    </x-partials.card>
</div>

