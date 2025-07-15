<!-- Trigger buttons -->

<a {{ $attributes }} x-data @click="$dispatch('open-modal', { id: '{{ $id }}' })" href="#">{{ $slot }}</a>
