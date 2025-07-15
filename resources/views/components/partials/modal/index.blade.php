@props([
    'id',
    'title' => null,
    'initiallyOpen' => false,
    'buttons' => null,
    'max_width' => 'max-w-xl'
])

<div
    x-data="{ isOpen: @js($initiallyOpen), open() { this.isOpen = true }, close() { this.isOpen = false } }"
    x-show="isOpen"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-opacity-50"
    x-ref="{{ $id }}"
    @keydown.escape.window="close()"
    @open-modal.window="$event.detail.id === '{{ $id }}' && open()"
    @close-modal.window="$event.detail.id === '{{ $id }}' && close()"
    x-transition.opacity
>
    <div
        class="absolute inset-0"
        @click="close()"
    ></div>

    <div
        @click.stop
        class="bg-white backdrop-opacity-100 rounded-lg shadow-xl {{ $max_width }} w-full mx-4 px-4 py-4 z-10 transform transition-all"
        x-show="isOpen"
        x-transition
    >
        @if($title)
            <h2 class="text-xl font-semibold mb-4">{{ $title }}</h2>
        @endif

        <div {{ $attributes }}>
            {{ $slot }}
        </div>
        @if($buttons != null)
            <div class="mt-6 text-center">

                {{ $buttons }}
                <button
                    @click="close()"
                    class="px-4 py-2  text-zinc-900 rounded"
                >
                    Close
                </button>
            </div>
        @endif
    </div>
</div>
