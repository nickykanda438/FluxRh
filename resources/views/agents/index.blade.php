<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-slate-900 font-sans text-slate-900 dark:text-slate-100 p-4 sm:p-6 lg:p-8 pb-20">
        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold tracking-tight uppercase italic">
                        FluxRh <span class="text-blue-600">/</span> <span class="text-slate-500">Annuaire</span>
                    </h2>
                    <p class="text-slate-400 text-[9px] font-bold uppercase tracking-widest mt-1">
                        Gestion du personnel
                    </p>
                </div>

                <a href="{{ route('agents.create') }}"
                    class="group inline-flex items-center justify-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-xl shadow-lg shadow-blue-600/20 transition-all hover:bg-blue-700 active:scale-95">
                    <span class="material-symbols-outlined text-lg">person_add</span>
                    <span class="text-[10px] font-black uppercase tracking-wider">Nouveau</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                @php
                    $total = $agents->count();
                    $males = $agents->where('genre', 'M')->count();
                    $females = $agents->where('genre', 'F')->count();
                    $percM = $total > 0 ? ($males / $total) * 100 : 0;
                    $percF = $total > 0 ? ($females / $total) * 100 : 0;
                @endphp

                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex justify-between items-start">
                        <span class="material-symbols-outlined text-blue-600 bg-blue-50 dark:bg-blue-900/20 p-2 rounded-lg text-xl">groups</span>
                        <div class="text-right">
                            <div class="text-2xl font-black italic">{{ $total }}</div>
                            <div class="text-[9px] font-bold uppercase text-slate-400">Total Agents</div>
                        </div>
                    </div>
                    <div class="mt-3 h-1 w-full bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden flex">
                        <div class="bg-blue-500" style="width: {{ $percM }}%"></div>
                        <div class="bg-pink-500" style="width: {{ $percF }}%"></div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <span class="material-symbols-outlined text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 p-2 rounded-lg text-xl">verified_user</span>
                    <div>
                        <div class="text-xl font-black italic">{{ $agents->where('statut', 'Actif')->count() }}</div>
                        <div class="text-[9px] font-bold uppercase text-slate-400">En service</div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <span class="material-symbols-outlined text-red-500 bg-red-50 dark:bg-red-900/20 p-2 rounded-lg text-xl">person_off</span>
                    <div>
                        <div class="text-xl font-black italic">{{ $agents->where('statut', 'Déserteur')->count() }}</div>
                        <div class="text-[9px] font-bold uppercase text-slate-400">Déserteurs</div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <span class="material-symbols-outlined text-amber-500 bg-amber-50 dark:bg-amber-900/20 p-2 rounded-lg text-xl">elderly</span>
                    <div>
                        <div class="text-xl font-black italic">{{ $agents->where('statut', 'Retraité')->count() }}</div>
                        <div class="text-[9px] font-bold uppercase text-slate-400">Retraités</div>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <form action="{{ route('agents.index') }}" method="GET" class="relative group">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Rechercher..."
                        class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-800 rounded-xl py-3 pl-11 text-xs focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                </form>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="hidden md:table-header-group">
                            <tr class="border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Agent</th>
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Matricule</th>
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Poste</th>
                                <th class="p-4 text-right text-[10px] font-black uppercase tracking-widest text-slate-400">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800 flex flex-col md:table-row-group">
                            @forelse($agents as $agent)
                                <tr class="flex flex-col md:table-row group hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors p-4 md:p-0">
                                    
                                    <td class="md:p-4 mb-2 md:mb-0">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 shrink-0 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 font-bold text-[10px]">
                                                {{ strtoupper(substr($agent->nom, 0, 1) . substr($agent->prenom, 0, 1)) }}
                                            </div>
                                            <div class="overflow-hidden">
                                                <div class="text-xs font-black text-slate-800 dark:text-slate-100 uppercase truncate italic">
                                                    {{ $agent->nom }} {{ $agent->prenom }}
                                                </div>
                                                <div class="text-[9px] text-slate-400 font-bold uppercase md:hidden">
                                                    Matricule: #{{ $agent->matricule }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="hidden md:table-cell md:p-4">
                                        <span class="px-2 py-0.5 bg-slate-100 dark:bg-slate-800 rounded text-[9px] font-bold text-slate-500 uppercase">
                                            #{{ $agent->matricule }}
                                        </span>
                                    </td>

                                    <td class="md:p-4 mb-3 md:mb-0">
                                        <div class="flex flex-col">
                                            <span class="text-[11px] font-bold text-slate-600 dark:text-slate-300 leading-tight">
                                                {{ $agent->fonction }}
                                            </span>
                                            <span class="text-[9px] text-slate-400 font-black uppercase tracking-tighter">
                                                {{ $agent->departement }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="md:p-4 md:text-right border-t border-slate-50 dark:border-slate-800 pt-3 md:pt-4 md:border-none mt-auto">
                                        <div class="flex items-center md:justify-end gap-3">
                                            <a href="{{ route('agents.show', $agent->id) }}" class="flex items-center gap-1 text-[10px] font-bold text-slate-400 hover:text-blue-500 uppercase transition-colors">
                                                <span class="material-symbols-outlined text-lg">visibility</span>
                                                <span class="md:hidden">Voir</span>
                                            </a>
                                            <a href="{{ route('agents.edit', $agent->id) }}" class="flex items-center gap-1 text-[10px] font-bold text-slate-400 hover:text-amber-500 uppercase transition-colors">
                                                <span class="material-symbols-outlined text-lg">edit_note</span>
                                                <span class="md:hidden">Éditer</span>
                                            </a>
                                            <button onclick="supprimer(event)" data-url="{{ route('agents.destroy', $agent->id) }}" class="flex items-center gap-1 text-[10px] font-bold text-slate-400 hover:text-red-500 uppercase transition-colors ml-auto md:ml-0">
                                                <span class="material-symbols-outlined text-lg text-red-400">delete_sweep</span>
                                                <span class="md:hidden">Supprimer</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <x-confirm message="Voulez-vous supprimer cet agent ?" />
</x-app-layout>