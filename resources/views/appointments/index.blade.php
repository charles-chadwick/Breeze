<p>{{ __($appointments->count().' Appointments') }}</p>
<ul>
    @forelse($appointments as $appointment)
        <li>{{ $appointment->date_and_time }}</li>
        <li>{{ $appointment->title }}</li>
        <li>{{ $appointment->status }}</li>
    @empty
        <li>{{ __('There are no appointments for this patient') }}</li>
    @endforelse
</ul>
