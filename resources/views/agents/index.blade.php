<x-app-layout>
    <header
        class="bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800 px-4 lg:px-8 py-2 lg:py-6 sticky top-0 z-10">
        <div class="flex items-center justify-between max-w-5xl mx-auto gap-4">
            <button @click="sidebarOpen = true"
                class="lg:hidden p-2 -ml-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div>
                <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Gestion du Statut des
                    Agents</h2>
                <p class="text-slate-500 dark:text-slate-400 mt-2">Consulter et modifier en temps réel l'état
                    administratif de vos effectifs.</p>
            </div>
            <div class="flex flex-shrink-0 gap-2 lg:gap-3">
                <button
                    class="px-6 py-2.5 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg transition-all">
                    Annuler
                </button>
                <button
                    class="px-6 py-2.5 text-sm font-semibold text-white bg-primary hover:bg-primary/90 rounded-lg shadow-lg shadow-primary/20 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">save</span>
                    <span class="hidden sm:inline">Enregistrer l'agent</span>
                    <span class="sm:hidden">Enregistrer</span>
                </button>
            </div>
        </div>
    </header>
    <div class="p-2 overflow-y-auto">
        <!-- Status Modification Legend/Actions (Optional Context) -->
        <div class=" grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="p-4 bg-white dark:bg-background-dark border border-slate-200 dark:border-slate-800 rounded-lg">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-slate-500 uppercase">Actif</span>
                    <div class="w-2 h-2 rounded-full bg-green-500"></div>
                </div>
                <p class="text-2xl font-black text-slate-900 dark:text-white">94</p>
                <p class="text-xs text-slate-500 mt-1">En service</p>
            </div>
            <div class="p-4 bg-white dark:bg-background-dark border border-slate-200 dark:border-slate-800 rounded-lg">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-slate-500 uppercase">Non-actif</span>
                    <div class="w-2 h-2 rounded-full bg-slate-400"></div>
                </div>
                <p class="text-2xl font-black text-slate-900 dark:text-white">12</p>
                <p class="text-xs text-slate-500 mt-1">En pause/congé</p>
            </div>
            <div class="p-4 bg-white dark:bg-background-dark border border-slate-200 dark:border-slate-800 rounded-lg">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-slate-500 uppercase">Retraité</span>
                    <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                </div>
                <p class="text-2xl font-black text-slate-900 dark:text-white">18</p>
                <p class="text-xs text-slate-500 mt-1">Anciens agents</p>
            </div>
            <div class="p-4 bg-white dark:bg-background-dark border border-slate-200 dark:border-slate-800 rounded-lg">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-slate-500 uppercase">Décédé</span>
                    <div class="w-2 h-2 rounded-full bg-red-500"></div>
                </div>
                <p class="text-2xl font-black text-slate-900 dark:text-white">4</p>
                <p class="text-xs text-slate-500 mt-1">Dossiers clôturés</p>
            </div>
        </div>
        <!-- Table Card -->
        <div
            class="mt-8 bg-white dark:bg-background-dark border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                ID Agent</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Nom complet</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Service</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Statut actuel</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Dernière modification</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        <!-- Agent Row 1 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-500">#8821</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                        JD</div>
                                    <span class="text-sm font-semibold text-slate-900 dark:text-white">Jean
                                        Dupont</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-400">
                                Ressources Humaines</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 uppercase tracking-wide">
                                    Actif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">12/10/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <button
                                    class="text-primary hover:text-primary/70 text-sm font-bold tracking-wide">MODIFIER</button>
                            </td>
                        </tr>
                        <!-- Agent Row 2 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-500">#8822</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                        MC</div>
                                    <span class="text-sm font-semibold text-slate-900 dark:text-white">Marie
                                        Claire</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-400">
                                Logistique</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400 uppercase tracking-wide">
                                    Retraité
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">05/09/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <button
                                    class="text-primary hover:text-primary/70 text-sm font-bold tracking-wide">MODIFIER</button>
                            </td>
                        </tr>
                        <!-- Agent Row 3 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-500">#8823</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                        RM</div>
                                    <span class="text-sm font-semibold text-slate-900 dark:text-white">Robert
                                        Martin</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-400">
                                Sécurité</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-slate-200 text-slate-700 dark:bg-slate-700 dark:text-slate-300 uppercase tracking-wide">
                                    Non-actif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">20/11/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <button
                                    class="text-primary hover:text-primary/70 text-sm font-bold tracking-wide">MODIFIER</button>
                            </td>
                        </tr>
                        <!-- Agent Row 4 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-500">#8824</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                        LB</div>
                                    <span class="text-sm font-semibold text-slate-900 dark:text-white">Lucie
                                        Bernard</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-400">
                                Finance</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 uppercase tracking-wide">
                                    Décédé
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">15/08/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <button
                                    class="text-primary hover:text-primary/70 text-sm font-bold tracking-wide">MODIFIER</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
                <p class="text-sm text-slate-500">Affichage de <span class="font-bold">4</span> agents sur <span
                        class="font-bold">128</span></p>
                <div class="flex gap-2">
                    <button
                        class="p-2 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800 disabled:opacity-50"
                        disabled="">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button
                        class="p-2 border border-slate-200 dark:border-slate-800 rounded bg-primary text-white">1</button>
                    <button
                        class="p-2 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800">2</button>
                    <button
                        class="p-2 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800">3</button>
                    <button
                        class="p-2 border border-slate-200 dark:border-slate-800 rounded hover:bg-slate-50 dark:hover:bg-slate-800">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
