<div class="py-4">
    <form wire:submit="save">
        <flux:editor
            wire:model="content"
        />
        <flux:error wire:model="content" />
        <div class="mt-4 text-center">
        <button
            type="submit"
            class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
        >Save
        </button>
        </div>
    </form>
</div>
