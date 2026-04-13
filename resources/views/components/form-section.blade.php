@props(['title', 'number', 'color' => 'blue'])

@php
    // Définition des variantes de couleurs pour les petits badges
    $colors = [
        'blue' => 'bg-blue-600 shadow-blue-600/20',
        'green' => 'bg-emerald-600 shadow-emerald-600/20',
        'orange' => 'bg-orange-500 shadow-orange-500/20',
    ];
    $currentColor = $colors[$color] ?? $colors['blue'];
@endphp

<div class="space-y-6">
    {{-- Titre de la section avec ligne décorative --}}
    <div class="flex items-center gap-4">
        <div class="w-8 h-8 {{ $currentColor }} rounded-lg flex items-center justify-center shadow-lg">
            <span class="text-white text-xs font-black">{{ $number }}</span>
        </div>
        <h3 class="text-sm font-black uppercase tracking-widest text-slate-800 dark:text-white">
            {{ $title }}
        </h3>
        <div class="flex-1 h-[1px] bg-slate-100 dark:bg-slate-800"></div>
    </div>

    {{-- Conteneur des champs (Grille de 3 colonnes sur PC, 1 sur Mobile) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{ $slot }}
    </div>
</div>
