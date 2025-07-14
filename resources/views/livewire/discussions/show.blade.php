<div>
    <x-partials.card>
        <x-discussions.details
            :discussion="$discussion"
            class="flex flex-wrap items-center justify-between gap-x-6 gap-y-4 py-2 sm:flex-nowrap"
        />
        <p class="pb-1">
            <flux:modal.trigger name="message-form-{{ $discussion->id }}">
                <a
                    href="#"
                    class="rounded-full bg-zinc-200 px-2.5 py-1 text-sm font-semibold text-zinc-500 shadow-xs hover:bg-zinc-500 hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600"
                >
                    Add Reply
                </a>
            </flux:modal.trigger>
            <flux:modal name="message-form-{{ $discussion->id }}">
                <livewire:message-form :discussion="$discussion" />
            </flux:modal>
        </p>
    </x-partials.card>

    <x-partials.card class="mt-4 flow-root">
        @foreach($messages as $message)
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
                            <p class="mt-0.5 text-sm text-zinc-500">Replied {{ $message->created_at }}</p>
                        </div>
                        <div class="mt-2 text-sm text-zinc-900">
                            {!! $message->content !!}
                        </div>
                    </div>
                    <flux:dropdown>
                        <flux:button icon:trailing="chevron-down">Options</flux:button>

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
        @endforeach
    </x-partials.card>
</div>
