@php
    use Illuminate\Support\Carbon;
@endphp
<ul
    role="list"
    class="divide-y divide-gray-100"
>
    @foreach($appointments as $appointment)
        <li
            class="flex justify-between gap-x-6 py-5"
            wire:key="{{ $appointment->id}}"
        >
            <div class="flex w-full gap-x-4">
                <div class="w-full">
                    <p class=" text-gray-900">
                        <a href="#">
                            <flux:modal.trigger name="appointment-form-{{ $appointment->id }}">
                                <span class="font-semibold">{{ $appointment->date }}</span>
                                from
                                <span class="font-semibold">{{ $appointment->start_time }}</span>
                                to
                                <span class="font-semibold">{{ $appointment->end_time }}</span>
                            </flux:modal.trigger>
                            <flux:modal name="appointment-form-{{ $appointment->id }}">
                                <livewire:appointment-form :appointment="$appointment" />
                            </flux:modal>
                        </a>
                    </p>
                    <flux:separator
                        variant="subtle"
                        class="my-2"
                    />
                    <flux:text
                        size="lg"
                        variant="strong"
                    >{{ $appointment->title }}</flux:text>
                    <flux:text>{!! $appointment->description !!}</flux:text>

                    <flux:separator
                        variant="subtle"
                        class="my-2"
                    />
                    <flux:text size="sm">
                        Created by {{ $appointment->createdBy->full_name }}
                        on {{ Carbon::parse($appointment->created_at)->format("m/d/Y \a\\t h:i a") }}
                    </flux:text>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end text-right">
                <p class=" text-gray-900 font-bold">{{ $appointment->status }}</p>
                <p class="mt-1 text-sm text-gray-500">
                    @foreach($appointment->users as $user)
                        <flux:badge class="my-1">{{ $user->full_name }}</flux:badge>
                    @endforeach
                </p>
            </div>
        </li>
    @endforeach

</ul>
