<x-app-layout>
    <header
        class="flex flex-col md:flex-row items-center justify-between p-4 lg:px-8 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-20">
        <div class="flex items-center justify-between w-full md:w-auto gap-4">
            <div class="flex items-center gap-4 lg:hidden">
                <span class="material-symbols-outlined text-slate-600">menu</span>
            </div>
            <div>
                <h2 class="text-xl lg:text-2xl font-bold text-slate-800 dark:text-white">HR Analytics</h2>
                <p class="text-slate-500 text-sm">Vue d'ensemble de la performance RH</p>
            </div>
        </div>

        <div class="mt-4 md:mt-0 flex items-center gap-3 w-full md:w-auto">
            <label class="text-sm font-medium text-slate-600 dark:text-slate-400 hidden md:block">Division:</label>
            <select
                class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary focus:border-primary block p-2.5 dark:bg-slate-800 dark:border-slate-700 dark:text-white w-full md:w-64">
                <option selected>Toutes les divisions</option>
                <option value="fin">Finances & Comptabilité</option>
                <option value="rh">Ressources Humaines</option>
                <option value="log">Logistique & Technique</option>
                <option value="adm">Administration Générale</option>
            </select>
            <button
                class="p-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                <span class="material-symbols-outlined">filter_list</span>
            </button>
        </div>
    </header>

    <div class="p-4 lg:p-8 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Total des Agents</h3>
                <p class="text-3xl font-extrabold mt-1">{{ $totalAgents }}</p>
            </div>

            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                <h3 class="text-slate-500 text-sm font-medium mb-4 text-center">Répartition par Genre</h3>
                <div class="flex items-center justify-around">
                    <div class="text-center">
                        <span class="material-symbols-outlined text-blue-500 text-3xl">male</span>
                        <p class="text-lg font-bold">{{ $hommes }}</p>
                        <p class="text-[10px] text-slate-400 uppercase">Hommes</p>
                    </div>
                    <div class="w-px h-10 bg-slate-100 dark:bg-slate-800"></div>
                    <div class="text-center">
                        <span class="material-symbols-outlined text-pink-500 text-3xl">female</span>
                        <p class="text-lg font-bold">{{ $femmes }}</p>
                        <p class="text-[10px] text-slate-400 uppercase">Femmes</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-amber-100 text-amber-600 rounded-lg">
                        <span class="material-symbols-outlined">badge</span>
                    </div>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Chefs de Bureau</h3>
                <p class="text-3xl font-extrabold mt-1">{{ $totalCB ?? 0 }}</p>
                <div class="w-full bg-slate-100 h-1 mt-4 rounded-full">
                    <div class="bg-amber-500 h-1 rounded-full"
                        style="width: {{ $totalAgents > 0 ? (($totalCB ?? 0) / $totalAgents) * 100 : 0 }}%"></div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg">
                        <span class="material-symbols-outlined">corporate_fare</span>
                    </div>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Chefs de Division</h3>
                <p class="text-3xl font-extrabold mt-1">{{ $totalCD ?? 0 }}</p>
                <div class="w-full bg-slate-100 h-1 mt-4 rounded-full">
                    <div class="bg-indigo-500 h-1 rounded-full"
                        style="width: {{ $totalAgents > 0 ? (($totalCD ?? 0) / $totalAgents) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div
                class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-[2.5rem] p-8 shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <h3 class="font-black text-xl text-slate-800 dark:text-white uppercase tracking-tighter">Analyse
                            de la Pyramide des Âges</h3>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Répartition par
                            tranche d'âge</p>
                    </div>
                    <div class="flex flex-col items-end">
                        <span
                            class="px-4 py-1.5 bg-blue-50 dark:bg-blue-500/10 text-blue-600 rounded-xl text-xs font-black uppercase italic">
                            Moyenne: {{ round($ageMoyen) }} ans
                        </span>
                    </div>
                </div>

                <div
                    class="relative h-64 flex items-end justify-between gap-3 px-2 border-b border-slate-100 dark:border-slate-800">
                    @foreach ($ageData as $label => $count)
                        @php
                            $percentage = $totalAgents > 0 ? ($count / $totalAgents) * 100 : 0;
                            $barHeight = $percentage > 0 ? max($percentage, 5) : 0;
                        @endphp
                        <div class="flex-1 flex flex-col items-center group relative h-full justify-end">
                            <div
                                class="absolute -top-12 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none z-10">
                                <div
                                    class="bg-slate-800 text-white text-[10px] font-black py-2 px-3 rounded-lg shadow-xl mb-2 flex flex-col items-center">
                                    <span>{{ $count }} Agent(s)</span>
                                    <span class="text-blue-400">{{ round($percentage, 1) }}%</span>
                                    <div class="w-2 h-2 bg-slate-800 rotate-45 -mb-3 mt-1"></div>
                                </div>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-xl transition-all duration-500 group-hover:bg-blue-500 relative overflow-hidden"
                                style="height: {{ $barHeight }}%">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-blue-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>
                            </div>
                            <span
                                class="text-[9px] font-black text-slate-400 uppercase mt-4 group-hover:text-blue-500 transition-colors">{{ $label }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div
                        class="p-5 bg-slate-50 dark:bg-slate-800/40 rounded-[1.5rem] border border-transparent hover:border-amber-500/30 transition-all flex items-center gap-5">
                        <div
                            class="w-14 h-14 rounded-2xl bg-white dark:bg-slate-700 flex items-center justify-center shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-3xl">elderly</span>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Doyen des agents
                            </p>
                            <p class="font-black text-slate-800 dark:text-white uppercase text-sm leading-tight">
                                {{ $doyen ? $doyen->nom . ' ' . $doyen->prenom : 'N/A' }}
                            </p>
                            <p class="text-xs font-bold text-amber-600">
                                {{ $doyen ? \Carbon\Carbon::parse($doyen->date_naissance)->age : '?' }} ans
                            </p>
                        </div>
                    </div>

                    <div
                        class="p-5 bg-slate-50 dark:bg-slate-800/40 rounded-[1.5rem] border border-transparent hover:border-green-500/30 transition-all flex items-center gap-5">
                        <div
                            class="w-14 h-14 rounded-2xl bg-white dark:bg-slate-700 flex items-center justify-center shadow-sm">
                            <span class="material-symbols-outlined text-green-500 text-3xl">child_care</span>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Benjamin du
                                groupe</p>
                            <p class="font-black text-slate-800 dark:text-white uppercase text-sm leading-tight">
                                {{ $plusJeune ? $plusJeune->nom . ' ' . $plusJeune->prenom : 'N/A' }}
                            </p>
                            <p class="text-xs font-bold text-green-600">
                                {{ $plusJeune ? \Carbon\Carbon::parse($plusJeune->date_naissance)->age : '?' }} ans
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm border border-slate-200 dark:border-slate-800">
                <h3 class="font-bold text-lg mb-6">Effectif par Division</h3>
                <div class="relative w-48 h-48 mx-auto mb-8">
                    <svg class="w-full h-full rotate-[-90deg]" viewBox="0 0 36 36">
                        <circle class="stroke-slate-100 dark:stroke-slate-800" cx="18" cy="18"
                            fill="none" r="16" stroke-width="3"></circle>
                        <circle class="stroke-blue-500" cx="18" cy="18" fill="none" r="16"
                            stroke-dasharray="40, 100" stroke-width="3"></circle>
                        <circle class="stroke-indigo-400" cx="18" cy="18" fill="none" r="16"
                            stroke-dasharray="25, 100" stroke-dashoffset="-40" stroke-width="3"></circle>
                        <circle class="stroke-amber-400" cx="18" cy="18" fill="none" r="16"
                            stroke-dasharray="35, 100" stroke-dashoffset="-65" stroke-width="3"></circle>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                        <span class="text-2xl font-black">100%</span>
                        <span class="text-[10px] text-slate-400 uppercase">Actif</span>
                    </div>
                </div>

                <div class="space-y-3">
                    @foreach ($divisionsData ?? [] as $div)
                        <div class="flex items-center justify-between text-sm font-medium">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full {{ $div['color'] }}"></span>
                                <span class="text-slate-600 dark:text-slate-400">{{ $div['label'] }}</span>
                            </div>
                            <span>{{ $div['percent'] }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <section
            class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                <h3 class="font-bold text-lg">Mouvements Récents</h3>
                <a href="#" class="text-blue-600 text-sm font-bold hover:underline">Voir tout</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 text-xs uppercase font-bold">
                        <tr>
                            <th class="px-6 py-4">Agent</th>
                            <th class="px-6 py-4">Division & Bureau</th>
                            <th class="px-6 py-4">Fonction</th>
                            <th class="px-6 py-4">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($mouvementsRecents as $agent)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-black text-xs shadow-sm">
                                        {{ strtoupper(substr($agent->nom, 0, 1)) }}{{ strtoupper(substr($agent->prenom, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span
                                            class="font-bold text-slate-800 dark:text-white block">{{ $agent->nom }}
                                            {{ $agent->prenom }}</span>
                                        <span class="text-[10px] text-slate-400 font-medium">Matricule:
                                            {{ $agent->matricule ?? 'N/A' }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-slate-700 dark:text-slate-300 block">
                                        {{ $agent->bureau->division->nom ?? 'Non assignée' }}
                                    </span>
                                    <span class="text-[11px] text-slate-500 italic">
                                        {{ $agent->bureau->nom ?? 'Bureau inconnu' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-[11px] font-bold rounded-lg border border-slate-200 dark:border-slate-700">
                                        {{ $agent->fonction ?? 'Agent' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right md:text-left">
                                    @if ($agent->created_at->diffInDays() < 7)
                                        <span
                                            class="px-2.5 py-1 bg-blue-100 text-blue-700 text-[10px] font-black rounded-full uppercase">Nouveau</span>
                                    @else
                                        <span
                                            class="px-2.5 py-1 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase">Actif</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-slate-400 italic">
                                    Aucune donnée disponible pour le moment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>


</x-app-layout>
