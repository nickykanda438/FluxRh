<x-app-layout>
    <header
        class="bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800 px-4 lg:px-8 py-2 lg:py-6 sticky top-0 z-10">
        <div class="flex items-center justify-between max-w-6xl mx-auto gap-4">
            <button @click="sidebarOpen = true"
                class="lg:hidden p-2 -ml-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div>
                <nav class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-2">
                    <span class="material-symbols-outlined text-[10px]">chevron_right</span>
                    <span class="text-primary font-medium">Liste des stagiaires</span>
                </nav>
                <h2 class="text-2xl font-black text-slate-900 dark:text-slate-100 tracking-tight">Stagiaires Actifs</h2>
                <p class="text-slate-500 dark:text-slate-400 text-base">Liste complète des stagiaires en cours de
                    formation et leur progression.</p>
            </div>
            <div class="flex flex-shrink-0 lg:gap-3">
                <button
                    class="px-6 py-2.5 text-sm font-semibold text-white bg-primary hover:bg-primary/90 rounded-lg shadow-lg shadow-primary/20 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">add</span>
                    <span class="hidden sm:inline">Nouveau Stagiaire</span>
                    <span class="sm:hidden">Ajouter</span>
                </button>
            </div>
        </div>
    </header>
    <section class="flex-1 overflow-y-auto mt-1">
        <div class="max-w-6xl mx-auto space-y-6">
            <div
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50">
                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                    Nom du Stagiaire</th>
                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                    Institution</th>
                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-center">
                                    Type</th>
                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                    Date de fin</th>
                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                    Progression</th>
                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm font-bold text-slate-900 dark:text-slate-100">Jean
                                        Dupont</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm text-slate-600 dark:text-slate-400">Université de Lomé</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">Académique</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm text-slate-600 dark:text-slate-400">15/10/2023</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex-1 h-2 w-24 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                            <div class="h-full bg-primary rounded-full" style="width: 75%"></div>
                                        </div>
                                        <span class="text-xs font-bold text-primary">75%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-right">
                                    <button class="text-slate-400 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm font-bold text-slate-900 dark:text-slate-100">Marie Kone</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm text-slate-600 dark:text-slate-400">ESGIS</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300">Professionnel</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm text-slate-600 dark:text-slate-400">01/12/2023</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex-1 h-2 w-24 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                            <div class="h-full bg-primary rounded-full" style="width: 40%"></div>
                                        </div>
                                        <span class="text-xs font-bold text-primary">40%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-right">
                                    <button class="text-slate-400 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm font-bold text-slate-900 dark:text-slate-100">Lucas
                                        Meyer</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm text-slate-600 dark:text-slate-400">IAEC</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">Académique</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm text-slate-600 dark:text-slate-400">20/09/2023</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex-1 h-2 w-24 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                            <div class="h-full bg-primary rounded-full" style="width: 90%"></div>
                                        </div>
                                        <span class="text-xs font-bold text-primary">90%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-right">
                                    <button class="text-slate-400 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm font-bold text-slate-900 dark:text-slate-100">Sophie
                                        Amadou</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm text-slate-600 dark:text-slate-400">LBS</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300">Professionnel</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm text-slate-600 dark:text-slate-400">10/11/2023</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex-1 h-2 w-24 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                            <div class="h-full bg-primary rounded-full" style="width: 25%"></div>
                                        </div>
                                        <span class="text-xs font-bold text-primary">25%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-right">
                                    <button class="text-slate-400 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-200 dark:border-slate-800">
                <p class="text-sm text-slate-500">Affichage de <span class="font-bold">4</span> sur <span
                        class="font-bold">24</span> stagiaires</p>
                <div class="flex items-center gap-1">
                    <a class="flex items-center justify-center size-9 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 transition-colors"
                        href="#">
                        <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                    </a>
                    <a class="flex items-center justify-center size-9 rounded-lg bg-primary text-white text-sm font-bold shadow-sm"
                        href="#">1</a>
                    <a class="flex items-center justify-center size-9 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors"
                        href="#">2</a>
                    <a class="flex items-center justify-center size-9 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors"
                        href="#">3</a>
                    <span class="px-1 text-slate-400">...</span>
                    <a class="flex items-center justify-center size-9 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-medium transition-colors"
                        href="#">6</a>
                    <a class="flex items-center justify-center size-9 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 transition-colors"
                        href="#">
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    </main>
    </div>
</x-app-layout>
