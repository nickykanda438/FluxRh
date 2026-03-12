<x-app-layout>
    <header class="flex flex-col md:flex-row items-center justify-between p-4 lg:px-8 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-20">
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
            <select class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary focus:border-primary block p-2.5 dark:bg-slate-800 dark:border-slate-700 dark:text-white w-full md:w-64">
                <option selected>Toutes les divisions</option>
                <option value="fin">Finances & Comptabilité</option>
                <option value="rh">Ressources Humaines</option>
                <option value="log">Logistique & Technique</option>
                <option value="adm">Administration Générale</option>
            </select>
            <button class="p-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                <span class="material-symbols-outlined">filter_list</span>
            </button>
        </div>
    </header>

    <div class="p-4 lg:p-8 space-y-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <span class="text-xs font-bold text-green-500">+2.5%</span>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Total des Agents</h3>
                <p class="text-3xl font-extrabold mt-1">1,240</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                <h3 class="text-slate-500 text-sm font-medium mb-4 text-center">Répartition par Genre</h3>
                <div class="flex items-center justify-around">
                    <div class="text-center">
                        <span class="material-symbols-outlined text-blue-500 text-3xl">male</span>
                        <p class="text-lg font-bold">750</p>
                        <p class="text-[10px] text-slate-400 uppercase">Hommes</p>
                    </div>
                    <div class="w-px h-10 bg-slate-100 dark:bg-slate-800"></div>
                    <div class="text-center">
                        <span class="material-symbols-outlined text-pink-500 text-3xl">female</span>
                        <p class="text-lg font-bold">490</p>
                        <p class="text-[10px] text-slate-400 uppercase">Femmes</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-amber-100 text-amber-600 rounded-lg">
                        <span class="material-symbols-outlined">badge</span>
                    </div>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Chefs de Bureau</h3>
                <p class="text-3xl font-extrabold mt-1">84</p>
                <div class="w-full bg-slate-100 h-1 mt-4 rounded-full">
                    <div class="bg-amber-500 h-1 rounded-full" style="width: 45%"></div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg">
                        <span class="material-symbols-outlined">corporate_fare</span>
                    </div>
                </div>
                <h3 class="text-slate-500 text-sm font-medium">Chefs de Division</h3>
                <p class="text-3xl font-extrabold mt-1">22</p>
                <div class="w-full bg-slate-100 h-1 mt-4 rounded-full">
                    <div class="bg-indigo-500 h-1 rounded-full" style="width: 20%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white">Analyse de l'âge & Ancienneté</h3>
                    <div class="flex gap-2">
                        <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 rounded-full text-xs font-medium">Moyenne: 42 ans</span>
                    </div>
                </div>
                
                <div class="flex items-end justify-between h-48 gap-2">
                    <div class="w-full bg-blue-400/20 hover:bg-blue-400 rounded-t-lg transition-all h-[30%] relative group">
                        <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-[10px] font-bold hidden group-hover:block">18-25</span>
                    </div>
                    <div class="w-full bg-blue-400/40 hover:bg-blue-400 rounded-t-lg transition-all h-[55%] relative group">
                        <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-[10px] font-bold hidden group-hover:block">26-35</span>
                    </div>
                    <div class="w-full bg-blue-400 hover:bg-blue-500 rounded-t-lg transition-all h-[85%] relative group">
                        <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-[10px] font-bold hidden group-hover:block">36-45</span>
                    </div>
                    <div class="w-full bg-blue-400/60 hover:bg-blue-400 rounded-t-lg transition-all h-[65%] relative group">
                        <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-[10px] font-bold hidden group-hover:block">46-55</span>
                    </div>
                    <div class="w-full bg-red-400 hover:bg-red-500 rounded-t-lg transition-all h-[40%] relative group">
                        <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-[10px] font-bold hidden group-hover:block">55+</span>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-4 bg-slate-50 dark:bg-slate-800/50 rounded-xl flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-white dark:bg-slate-700 flex items-center justify-center shadow-sm">
                            <span class="material-symbols-outlined text-amber-500">elderly</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 uppercase font-bold">Le plus âgé (Doyen)</p>
                            <p class="font-bold">M. Jean Kabongo (64 ans)</p>
                        </div>
                    </div>
                    <div class="p-4 bg-slate-50 dark:bg-slate-800/50 rounded-xl flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-white dark:bg-slate-700 flex items-center justify-center shadow-sm">
                            <span class="material-symbols-outlined text-green-500">child_care</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 uppercase font-bold">Le plus jeune</p>
                            <p class="font-bold">Mlle. Sarah Luvumbu (22 ans)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm border border-slate-200 dark:border-slate-800">
                <h3 class="font-bold text-lg mb-6">Effectif par Division</h3>
                
                <div class="relative w-48 h-48 mx-auto mb-8">
                    <svg class="w-full h-full rotate-[-90deg]" viewBox="0 0 36 36">
                        <circle class="stroke-slate-100 dark:stroke-slate-800" cx="18" cy="18" fill="none" r="16" stroke-width="3"></circle>
                        <circle class="stroke-blue-500" cx="18" cy="18" fill="none" r="16" stroke-dasharray="40, 100" stroke-width="3"></circle>
                        <circle class="stroke-indigo-400" cx="18" cy="18" fill="none" r="16" stroke-dasharray="25, 100" stroke-dashoffset="-40" stroke-width="3"></circle>
                        <circle class="stroke-amber-400" cx="18" cy="18" fill="none" r="16" stroke-dasharray="35, 100" stroke-dashoffset="-65" stroke-width="3"></circle>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                        <span class="text-2xl font-black">100%</span>
                        <span class="text-[10px] text-slate-400 uppercase">Actif</span>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                            <span class="text-slate-600 dark:text-slate-400">Administration</span>
                        </div>
                        <span>40%</span>
                    </div>
                    <div class="flex items-center justify-between text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-indigo-400"></span>
                            <span class="text-slate-600 dark:text-slate-400">Finances</span>
                        </div>
                        <span>25%</span>
                    </div>
                    <div class="flex items-center justify-between text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                            <span class="text-slate-600 dark:text-slate-400">Logistique</span>
                        </div>
                        <span>35%</span>
                    </div>
                </div>
            </div>
        </div>

        <section class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                <h3 class="font-bold text-lg">Mouvements Récents</h3>
                <button class="text-primary text-sm font-bold hover:underline">Voir tout</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 text-xs uppercase font-bold">
                        <tr>
                            <th class="px-6 py-4">Agent</th>
                            <th class="px-6 py-4">Division</th>
                            <th class="px-6 py-4">Fonction</th>
                            <th class="px-6 py-4">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">MK</div>
                                <span class="font-medium">Musa Kalombo</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Finances</td>
                            <td class="px-6 py-4 text-sm font-semibold text-indigo-500 underline uppercase decoration-dotted">Chef de Bureau</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase">Présent</span>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </section>
    </div>

    <nav class="lg:hidden sticky bottom-0 bg-white/80 backdrop-blur-md dark:bg-slate-900/80 border-t border-slate-200 dark:border-slate-800 flex items-center justify-around py-3">
        <a class="flex flex-col items-center gap-1 text-primary" href="#">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-[10px] font-bold uppercase">Dashboard</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-slate-400" href="#">
            <span class="material-symbols-outlined">groups</span>
            <span class="text-[10px] font-bold uppercase">Agents</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-slate-400" href="#">
            <span class="material-symbols-outlined">analytics</span>
            <span class="text-[10px] font-bold uppercase">Rapports</span>
        </a>
    </nav>
</x-app-layout>