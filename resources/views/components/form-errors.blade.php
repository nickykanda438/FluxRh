@props(['errors'])

@if ($errors->any())
    <div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-slate-800 dark:text-red-400 border border-red-200 dark:border-red-800"
        role="alert">
        <div class="flex items-center mb-2">
            <span class="material-symbols-outlined mr-2">error</span>
            <span class="font-bold">Veuillez corriger les erreurs suivantes :</span>
        </div>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
