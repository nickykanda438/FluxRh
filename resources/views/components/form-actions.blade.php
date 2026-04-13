@props([
    'cancelAction' => '',
    'submitText' => 'Enregistrer',
])

<div class="flex items-center justify-end gap-4 p-6 border-t border-slate-200 dark:border-slate-800">
    <button type="button"
        {{ $attributes->merge(['class' => 'px-6 py-2.5 text-sm font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl transition-all']) }}
        {!! $cancelAction !!}>
        Annuler
    </button>
    <button type="submit"
        class="px-6 py-2.5 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-xl shadow-lg shadow-blue-600/20 transition-all">
        {{ $submitText }}
    </button>
</div>
