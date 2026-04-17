<x-app-layout>
    <header class="flex flex-col md:flex-row items-center justify-between p-3 md:p-4 lg:px-6 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-30">
        <div class="flex items-center justify-between w-full md:w-auto gap-3">
            <div class="flex items-center gap-3 lg:hidden">
                <span class="material-symbols-outlined text-slate-600 text-xl">menu</span>
            </div>
            <div>
                <h2 class="text-lg lg:text-xl font-black tracking-tighter uppercase italic leading-none">
                    FluxRh <span class="text-blue-600">/</span> <span class="text-slate-500 text-xs lg:text-base">Analytics</span>
                </h2>
                <p class="text-[8px] text-slate-400 font-bold uppercase tracking-widest mt-0.5 hidden md:block">Intelligence RH</p>
            </div>
        </div>

        <div class="mt-3 md:mt-0 flex items-center gap-2 w-full md:w-auto">
            <div class="relative flex-1 md:flex-none">
                <select class="appearance-none bg-slate-50 border-none text-slate-900 text-[10px] font-black uppercase rounded-lg focus:ring-2 focus:ring-blue-600 block w-full md:w-48 p-2 dark:bg-slate-800 dark:text-white">
                    <option selected>Toutes les divisions</option>
                    @foreach($divisionsData as $div)
                        <option value="{{ Str::slug($div['label']) }}">{{ $div['label'] }}</option>
                    @endforeach
                </select>
                <span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 text-sm">expand_more</span>
            </div>
            <button class="p-2 text-slate-500 bg-slate-50 dark:bg-slate-800 rounded-lg hover:bg-slate-100 shrink-0">
                <span class="material-symbols-outlined text-lg">tune</span>
            </button>
        </div>
    </header>

    <div class="p-3 md:p-4 lg:p-6 space-y-4 md:space-y-6 pb-10 bg-slate-50/50 dark:bg-slate-900">
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            <div class="bg-white dark:bg-slate-800 p-4 rounded-[1.5rem] shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl">groups</span>
                    </div>
                    <h3 class="text-slate-400 text-[8px] font-black uppercase tracking-wider">Effectif</h3>
                </div>
                <p class="text-2xl md:text-3xl font-black italic text-slate-800 dark:text-white leading-none">{{ $totalAgents }}</p>
            </div>

            <div class="bg-white dark:bg-slate-800 p-4 rounded-[1.5rem] shadow-sm border border-slate-200 dark:border-slate-800">
                <h3 class="text-slate-400 text-[8px] font-black uppercase tracking-wider mb-3 text-center">Genre</h3>
                <div class="flex items-center justify-around">
                    <div class="flex flex-col items-center">
                        <span class="material-symbols-outlined text-blue-500 text-xl">male</span>
                        <p class="text-sm font-black italic">{{ $hommes }}</p>
                    </div>
                    <div class="w-px h-6 bg-slate-100 dark:bg-slate-700"></div>
                    <div class="flex flex-col items-center">
                        <span class="material-symbols-outlined text-pink-500 text-xl">female</span>
                        <p class="text-sm font-black italic">{{ $femmes }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 p-4 rounded-[1.5rem] shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 bg-amber-50 dark:bg-amber-900/20 text-amber-600 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl">badge</span>
                    </div>
                    <h3 class="text-slate-400 text-[8px] font-black uppercase tracking-wider">CB</h3>
                </div>
                <p class="text-2xl font-black italic text-slate-800 dark:text-white">{{ $totalCB }}</p>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1 mt-2 rounded-full overflow-hidden">
                    <div class="bg-amber-500 h-full" style="width: {{ $totalAgents > 0 ? ($totalCB / $totalAgents) * 100 : 0 }}%"></div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 p-4 rounded-[1.5rem] shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl">corporate_fare</span>
                    </div>
                    <h3 class="text-slate-400 text-[8px] font-black uppercase tracking-wider">CD</h3>
                </div>
                <p class="text-2xl font-black italic text-slate-800 dark:text-white">{{ $totalCD }}</p>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1 mt-2 rounded-full overflow-hidden">
                    <div class="bg-indigo-500 h-full" style="width: {{ $totalAgents > 0 ? ($totalCD / $totalAgents) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
            <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-[2rem] p-5 md:p-6 shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h3 class="font-black text-base md:text-lg text-slate-800 dark:text-white uppercase tracking-tighter italic">Pyramide des Âges</h3>
                        <p class="text-[8px] text-slate-400 font-bold uppercase tracking-widest">Démographie</p>
                    </div>
                    <div class="px-3 py-1 bg-slate-900 text-white rounded-lg text-[9px] font-black uppercase italic">
                        Moy: {{ round($ageMoyen) }} ans
                    </div>
                </div>

                <div class="relative h-40 md:h-48 flex items-end justify-between gap-2 px-2 border-b border-slate-100 dark:border-slate-700/50">
                    @php $maxAgeCount = max($ageData) ?: 1; @endphp
                    @foreach ($ageData as $label => $count)
                        @php $height = ($count / $maxAgeCount) * 100; @endphp
                        <div class="flex-1 flex flex-col items-center group relative h-full justify-end">
                            <div class="w-full bg-slate-100 dark:bg-slate-700/50 rounded-t-lg transition-all group-hover:bg-blue-600"
                                style="height: {{ max($height, 5) }}%">
                            </div>
                            <span class="text-[7px] md:text-[8px] font-black text-slate-400 uppercase mt-2 tracking-tighter truncate w-full text-center">{{ $label }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <div class="p-3 bg-slate-50 dark:bg-slate-900/40 rounded-xl flex items-center gap-3">
                        <span class="material-symbols-outlined text-amber-500 text-lg">history_edu</span>
                        <div class="min-w-0">
                            <p class="text-[7px] text-slate-400 uppercase font-black">Doyen</p>
                            <p class="font-black text-slate-800 dark:text-white uppercase italic text-[10px] truncate">{{ $doyen->nom ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="p-3 bg-slate-50 dark:bg-slate-900/40 rounded-xl flex items-center gap-3">
                        <span class="material-symbols-outlined text-emerald-500 text-lg">bolt</span>
                        <div class="min-w-0">
                            <p class="text-[7px] text-slate-400 uppercase font-black">Benjamin</p>
                            <p class="font-black text-slate-800 dark:text-white uppercase italic text-[10px] truncate">{{ $plusJeune->nom ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-[2rem] p-5 shadow-sm border border-slate-200 dark:border-slate-800">
                <h3 class="font-black text-sm uppercase italic tracking-tighter mb-6 text-slate-800 dark:text-white">Divisions</h3>
                
                <div class="relative w-32 h-32 mx-auto mb-6">
                    <svg class="w-full h-full rotate-[-90deg]" viewBox="0 0 36 36">
                        <circle class="stroke-slate-50 dark:stroke-slate-700" cx="18" cy="18" fill="none" r="15.9" stroke-width="3"></circle>
                        <circle class="stroke-blue-600" cx="18" cy="18" fill="none" r="15.9" stroke-width="3.5" stroke-dasharray="75, 100"></circle>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                        <span class="text-xl font-black italic">100%</span>
                        <span class="text-[7px] text-slate-400 font-black uppercase tracking-tighter">Actifs</span>
                    </div>
                </div>

                <div class="space-y-2 max-h-[150px] overflow-y-auto pr-1 custom-scrollbar">
                    @foreach ($divisionsData as $div)
                        <div class="flex items-center justify-between p-2 rounded-lg bg-slate-50 dark:bg-slate-900/50">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full {{ $div['color'] }}"></span>
                                <span class="text-[9px] font-black uppercase text-slate-600 dark:text-slate-300">{{ Str::limit($div['label'], 15) }}</span>
                            </div>
                            <span class="text-[9px] font-black italic text-blue-600">{{ $div['percent'] }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <section class="bg-white dark:bg-slate-800 rounded-[2rem] border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
            <div class="p-4 md:p-5 border-b border-slate-50 dark:border-slate-700 flex justify-between items-center bg-slate-50/30">
                <h3 class="font-black text-sm uppercase italic tracking-tighter text-slate-800 dark:text-white">Dernières recrues</h3>
                <a href="#" class="text-[8px] font-black uppercase italic text-blue-600 hover:underline">Voir tout</a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50/50 dark:bg-slate-900/20 text-slate-400 text-[8px] uppercase font-black tracking-widest">
                        <tr>
                            <th class="px-6 py-3">Agent</th>
                            <th class="px-6 py-3">Structure</th>
                            <th class="px-6 py-3 text-right">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-slate-700">
                        @foreach($mouvementsRecents->take(5) as $agent)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-900/40 transition-colors">
                                <td class="px-6 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-7 h-7 rounded-lg bg-slate-900 dark:bg-blue-600 flex items-center justify-center text-white font-black text-[9px] italic">
                                            {{ strtoupper(substr($agent->nom, 0, 1)) }}{{ strtoupper(substr($agent->prenom, 0, 1)) }}
                                        </div>
                                        <div>
                                            <span class="font-black text-slate-800 dark:text-white uppercase text-[10px] italic block">{{ $agent->nom }}</span>
                                            <span class="text-[8px] text-slate-400 font-bold uppercase tracking-tighter">Mat: {{ $agent->matricule }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <span class="text-[9px] font-black text-slate-600 dark:text-slate-300 uppercase block">{{ $agent->bureau->division->nom ?? 'DR' }}</span>
                                </td>
                                <td class="px-6 py-3 text-right">
                                    <span class="px-2 py-0.5 bg-blue-600 text-white text-[7px] font-black rounded-full uppercase italic">Recrue</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 3px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    .dark .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; }
</style>
