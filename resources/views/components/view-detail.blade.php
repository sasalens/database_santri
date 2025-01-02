@props(['label', 'value', 'text'])

<div class="mt-4">
    <label class="block">
        <span class="text-gray-700 text-sm">{{ $label }}</span>
        <input type="text" value="{{ $value }}" class="form-input mt-1 block w-full rounded-md" readonly>
    </label>
</div>
