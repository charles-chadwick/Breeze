<!-- Trigger buttons -->

<a x-data @click="$dispatch('open-modal', { id: '{{ $id }}' })" href="#">{{ $slot }}</a>
