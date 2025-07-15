<div>
    <!-- header with details and menu -->
    <x-partials.card>
        <x-discussions.details
            :discussion="$discussion"
            class="flex flex-wrap items-center justify-between gap-x-6 gap-y-4 py-2 sm:flex-nowrap"
        />

    </x-partials.card>
    <!-- header with details and menu -->

    <!-- main body of messages -->
    <x-partials.card class="mt-4 flow-root">
        @forelse($messages as $message)
            <div
                class="relative py-2"
                wire:key="{{ $message->id }}"
            >
                <div class="relative flex items-start space-x-3">
                    <div class="relative shrink-0">
                        <img
                            class="flex size-16 items-center shadow-xs justify-center rounded-lg ring-2 ring-zinc-800/20"
                            src="{{ $message->user->avatar }}"
                            alt="{{ $message->user->full_name }}"
                            title="{{ $message->user->full_name }}"
                        />
                    </div>
                    <div class="min-w-0 grow">
                        <div>
                            <div class="text-sm">
                                <a
                                    href="#"
                                    class="font-medium text-zinc-900"
                                >{{ $message->user->full_name }}</a>
                            </div>
                            <p class="mt-0.5 text-sm text-zinc-500">Replied
                                <x-partials.date :datetime="$message->created_at" />
                            </p>
                        </div>
                        <div class="mt-2 text-sm text-zinc-900">
                            {!! $message->content !!}
                        </div>
                    </div>
                    <flux:dropdown>
                        <flux:button icon:trailing="ellipsis-vertical"></flux:button>

                        <flux:menu>
                            <flux:menu.item
                                variant="danger"
                                icon="trash"
                            >
                                <flux:modal.trigger name="message-delete-form-{{ $message->id }}">
                                    <a href="#"> Delete</a>
                                </flux:modal.trigger>
                            </flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>

                    <flux:modal
                        class="w-1/2"
                        name="message-delete-form-{{ $message->id }}"
                    >
                        <livewire:confirm-delete
                            wire:key="confirm-{{ $message->id }}"
                            modal_id="message-delete-form-{{ $message->id }}"
                            :model="$message"
                        />
                    </flux:modal>
                </div>
            </div>
        @empty
            <p class="mt-2 text-center">There are no messages in this discussion.</p>
        @endforelse
        <flux:separator class="mt-4" />
        <div class="pt-2">
            {{ $messages->links() }}
        </div>
    </x-partials.card>
    <!-- main body of messages -->

    <!-- main reply thing -->
    <x-partials.card class="mt-4">
        <h3 class="font-semibold">Leave a reply</h3>
        <livewire:message-form :discussion="$discussion" />
    </x-partials.card>
    <!-- main reply thing -->

</div>
