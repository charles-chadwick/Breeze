<ul>
@foreach($prescriptions as $prescription)
    <li>
        <h2 class="font-bold">{{ $prescription->medication->generic_name }} ({{ $prescription->medication->brand_name }})</h2>
        <p>Prescribed {{ $prescription->prescribed_at }} by {{ $prescription->prescriber->full_name }}</p>
        <p>Details: {{ $prescription->dosage }} {{ $prescription->frequency }} {{ $prescription->route }}</p>
        <p>Quantity: {{ $prescription->quantity }} Refills: {{ $prescription->refills }}</p>
        <p>Instructions: {{ $prescription->instructions }}</p>
    </li>
@endforeach
</ul>

'patient_id',
'prescriber_id',
'medication_id',
'dosage',
'frequency',
'route',
'quantity',
'refills',
'prescribed_at',
'instructions',
