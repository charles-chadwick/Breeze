<div class="flex">
    <h1 class="font-bold w-full">{{ $patient->full_name }} (#{{ $patient->id }})</h1>
    <x-badge
        md
        icon="inbox-stack"
        class="flex-0"
        positive
        label="{{ $patient->status }}"
    />
</div>
<p>{{ $patient->dob }}</p>
<p>{{ $patient->gender }}</p>
<p>{{ $patient->email }}</p>

