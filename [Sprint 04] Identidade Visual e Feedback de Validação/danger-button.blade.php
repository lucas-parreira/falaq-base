@props(['type' => 'submit'])

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'bg-red-600 text-white px-3 py-1.5 rounded-md text-sm font-medium hover:bg-red-700 transition']) }}
>
    {{ $slot }}
</button>
