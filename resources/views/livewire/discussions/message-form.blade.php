<div class="py-4">
    <form wire:submit="save">
        <flux:editor
            wire:model="content"
        />
        <flux:error wire:model="content" />
        <div class="mt-4 text-center">
        <button
            type="submit"
            class="btn-primary"
        >Save
        </button>
        </div>
    </form>
</div>
