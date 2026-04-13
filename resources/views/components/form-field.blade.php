@props([
    'name',
    'label',
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'options' => [],
    'cols' => 1,
    'value' => '',
])

<div class="col-span-{{ $cols }}">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }} @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    @if ($type === 'select')
        <select name="{{ $name }}" id="{{ $name }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-slate-700 dark:placeholder-gray-400 dark:text-white"
            {{ $required ? 'required' : '' }}>
            <option value="">Sélectionner...</option>
            @foreach ($options as $val => $text)
                <option value="{{ $val }}" {{ old($name, $value) == $val ? 'selected' : '' }}>
                    {{ $text }}</option>
            @endforeach
        </select>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-slate-700 dark:placeholder-gray-400 dark:text-white"
            {{ $required ? 'required' : '' }}>
    @endif

    @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
