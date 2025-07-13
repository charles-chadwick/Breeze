@php use Carbon\Carbon; @endphp
<time
    {{ $attributes->merge(['class' => "rounded-xl"])}}
    datetime="{{ $datetime }}"
    title="{{ Carbon::parse($datetime)->format("m/d/Y h:i a") }}"
>
    {{ Carbon::parse($datetime)->diffForHumans() }}
</time>
