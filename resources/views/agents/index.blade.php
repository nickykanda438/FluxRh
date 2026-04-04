<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-black font-sans text-slate-900 dark:text-slate-100 p-6 lg:p-10">
        <div class="max-w-7xl mx-auto">

            {{-- 1. HEADER : TITRE ET ACTION PRINCIPALE --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                <div>
                    <h2 class="text-3xl font-black tracking-tighter uppercase italic">
                        FluxRh <span class="text-blue-600">/</span> Annuaire
                    </h2>
                    <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-1">
                        Tableau de bord de gestion du personnel
                    </p>
                </div>
                
                <a href="{{ route('agents.create') }}" class="group px-8 py-4 bg-blue-600 text-white rounded-2xl shadow-xl shadow-blue-600/20 transition-all hover:scale-105 active:scale-95 flex items-center gap-3">
                    <span class="material-symbols-outlined text-xl">person_add</span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Nouvel Agent</span>
                </a>
            </div>

            {{-- 2. SECTION STATISTIQUES (CARDS) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                
                @php
                    $total = $agents->count();
                    $males = $agents->where('genre', 'M')->count();
                    $females = $agents->where('genre', 'F')->count();
                    
                    // Calcul des pourcentages pour la barre de progression
                    $percM = $total > 0 ? ($males / $total) * 100 : 0;
                    $percF = $total > 0 ? ($females / $total) * 100 : 0;
                @endphp

                {{-- Card Effectif Total --}}
                <div class="relative overflow-hidden bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-blue-600">groups</span>
                        </div>
                        <div class="flex flex-col items-end">
                            <div class="text-[10px] font-black uppercase tracking-widest text-slate-400">Effectif</div>
                            <div class="text-[9px] font-bold text-blue-500 uppercase">{{ $males }}H / {{ $females }}F</div>
                        </div>
                    </div>
                    
                    <div class="text-3xl font-black italic text-slate-800 dark:text-white">{{ $total }}</div>
                    
                    {{-- Barre de progression dynamique sans erreur de syntaxe --}}
                    <div class="mt-4 flex items-center gap-2">
                        <div class="flex-1 h-1.5 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden flex" 
                             style="--width-m: {{ $percM }}%; --width-f: {{ $percF }}%;">
                            <div class="h-full bg-blue-500 transition-all duration-500" style="width: var(--width-m)"></div>
                            <div class="h-full bg-pink-500 transition-all duration-500" style="width: var(--width-f)"></div>
                        </div>
                        <span class="text-[9px] font-bold text-slate-400">{{ round($percM) }}% / {{ round($percF) }}%</span>
                    </div>
                </div>

                {{-- Card Déserteurs --}}
                <div class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-red-50 dark:bg-red-900/20 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-red-600">person_off</span>
                        </div>
                        <span class="px-2 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 text-[9px] font-black rounded-lg uppercase">Alerte</span>
                    </div>
                    <div class="text-3xl font-black italic text-slate-800 dark:text-white">
                        {{ $agents->where('statut', 'Déserteur')->count() }}
                    </div>
                    <div class="text-[10px] font-bold uppercase text-slate-400 tracking-widest mt-1">Déserteurs</div>
                </div>

                {{-- Card Retraités --}}
                <div class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-emerald-50 dark:bg-emerald-900/20 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-emerald-600">elderly</span>
                        </div>
                        <span class="px-2 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 text-[9px] font-black rounded-lg uppercase">Archive</span>
                    </div>
                    <div class="text-3xl font-black italic text-slate-800 dark:text-white">
                        {{ $agents->where('statut', 'Retraité')->count() }}
                    </div>
                    <div class="text-[10px] font-bold uppercase text-slate-400 tracking-widest mt-1">Retraités</div>
                </div>

                {{-- Card Actifs --}}
                <div class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-amber-50 dark:bg-amber-900/20 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-amber-600">verified_user</span>
                        </div>
                        <div class="w-2 h-2 rounded-full bg-green-500 animate-ping"></div>
                    </div>
                    <div class="text-3xl font-black italic text-slate-800 dark:text-white">
                        {{ $agents->where('statut', 'Actif')->count() }}
                    </div>
                    <div class="text-[10px] font-bold uppercase text-slate-400 tracking-widest mt-1">En service</div>
                </div>
            </div>

            {{-- 3. BARRE DE RECHERCHE --}}
            <div class="mb-8 flex gap-4">
                <form action="{{ route('agents.index') }}" method="GET" class="relative flex-1 group">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors">search</span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher par nom ou matricule..." 
                           class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl py-4 pl-12 text-xs font-medium focus:ring-2 focus:ring-blue-500 shadow-sm outline-none">
                </form>
            </div>

            {{-- 4. TABLEAU DES AGENTS --}}
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30">
                                <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Agent</th>
                                <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Matricule</th>
                                <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Département & Fonction</th>
                                <th class="p-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Localisation</th>
                                <th class="p-6 text-right text-[10px] font-black uppercase tracking-widest text-slate-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @forelse($agents as $agent)
                            <tr class="group hover:bg-slate-50/80 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-blue-600 font-black text-xs uppercase shadow-sm">
                                            {{ strtoupper(substr($agent->nom, 0, 1) . substr($agent->prenom, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-black text-slate-800 dark:text-slate-100 uppercase italic">{{ $agent->nom }} {{ $agent->prenom }}</div>
                                            <div class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">{{ $agent->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <span class="px-3 py-1 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-[10px] font-black text-blue-600 uppercase tracking-widest italic border border-blue-100 dark:border-blue-800">
                                        #{{ $agent->matricule }}
                                    </span>
                                </td>
                                <td class="p-6">
                                    <div class="text-xs font-bold text-slate-600 dark:text-slate-300">{{ $agent->fonction }}</div>
                                    <div class="text-[10px] text-slate-400 font-black uppercase tracking-tighter">{{ $agent->departement }}</div>
                                </td>
                                <td class="p-6">
                                    <div class="text-xs font-bold">{{ $agent->ville }}</div>
                                    <div class="text-[10px] text-slate-400 font-bold uppercase">{{ $agent->province }}</div>
                                </td>
                                <td class="p-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('agents.show', $agent->id) }}" class="p-2 text-slate-400 hover:text-blue-600 transition-colors">
                                            <span class="material-symbols-outlined text-lg">visibility</span>
                                        </a>
                                        <a href="{{ route('agents.edit', $agent->id) }}" class="p-2 text-slate-400 hover:text-amber-500 transition-colors">
                                            <span class="material-symbols-outlined text-lg">edit_note</span>
                                        </a>
                                        <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" class="inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                                                <span class="material-symbols-outlined text-lg">delete_sweep</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-24 text-center">
                                    <div class="flex flex-col items-center opacity-30">
                                        <span class="material-symbols-outlined text-7xl">person_search</span>
                                        <p class="font-black uppercase text-[10px] tracking-[0.2em] mt-4 italic text-slate-500">
                                            La base de données est actuellement vide
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> {{-- FIN TABLEAU --}}
            
        </div> {{-- FIN MAX-W-7XL --}}
    </div> {{-- FIN MIN-H-SCREEN --}}
</x-app-layout>