@props(['label', 'value', 'text'])

<div class="mt-4">
    <label class="block">
        <span class="text-gray-700 text-sm">{{ $label }}</span>
        <div class="form-input mt-1 block w-full rounded-md">{{ $value }}</div>
    </label>
</div>
