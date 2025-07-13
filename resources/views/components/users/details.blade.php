<span {{ $attributes->merge(['class' => "hover:underline"])}}>
    <a href="#">
    <x-partials.badge color="lime">
    {{ $user->full_name }}
    </x-partials.badge>
    </a>
</span>
