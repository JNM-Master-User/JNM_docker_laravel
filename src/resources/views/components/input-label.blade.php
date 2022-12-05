@props(['value'])

<label {{ $attributes->merge(['class' => ' sm:text-xs block mb-2 font-medium text-gray-900 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
