<x-app-layout>
    <header
        class="bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800 px-4 lg:px-8 py-2 lg:py-6 sticky top-0 z-10">
        <div class="flex items-center justify-between max-w-5xl mx-auto gap-4">
            <button @click="sidebarOpen = true"
                class="lg:hidden p-2 -ml-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div>
                <nav class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-2">
                    <span>Agents</span>
                    <span class="material-symbols-outlined text-[10px]">chevron_right</span>
                    <span class="text-primary font-medium">Nouveau profil</span>
                </nav>
                <h2 class="text-2xl font-black text-slate-900 dark:text-slate-100 tracking-tight">Ajouter un Agent</h2>
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
    <div class="px-2 lg:px-4 py-2 lg:py-4">
        <div class="max-w-5xl mx-auto space-y-8">
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div
                    class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                    <h3 class="text-sm font-bold text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">badge</span>
                        1. INFORMATIONS IDENTITAIRES
                    </h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Matricule</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            placeholder="Ex: AG-2024-001" type="text" />
                    </div>
                    <div class="flex flex-col gap-1.5 lg:col-span-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nom / Postnom /
                            Prénom</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            placeholder="Entrez le nom complet" type="text" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Date de
                            naissance</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            type="date" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Lieu de
                            naissance</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            placeholder="Ville ou province" type="text" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Genre</label>
                        <select
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary">
                            <option value="">Sélectionner</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                </div>
            </section>
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div
                    class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                    <h3 class="text-sm font-bold text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">family_restroom</span>
                        2. ÉTAT CIVIL & FAMILLE
                    </h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">État Civil</label>
                        <select
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary">
                            <option value="Célibataire">Célibataire</option>
                            <option value="Marié">Marié(e)</option>
                            <option value="Divorcé">Divorcé(e)</option>
                            <option value="Veuf">Veuf/Veuve</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nombre
                            d'enfants</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            min="0" placeholder="0" type="number" />
                    </div>
                </div>
            </section>
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                <div
                    class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                    <h3 class="text-sm font-bold text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">location_on</span>
                        3. CONTACT & LOCALISATION
                    </h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Téléphone</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            placeholder="+243 ..." type="tel" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Email
                            Professionnel</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            placeholder="nom.prenom@entreprise.com" type="email" />
                    </div>
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Adresse
                            complète</label>
                        <textarea
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            placeholder="N°, Avenue, Quartier, Commune, Ville" rows="2"></textarea>
                    </div>
                </div>
            </section>
            <section
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden mb-12">
                <div
                    class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                    <h3 class="text-sm font-bold text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">payments</span>
                        4. POSTE & RÉMUNÉRATION
                    </h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Grade</label>
                        <select
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary">
                            <option value="">Sélectionner un grade</option>
                            <option value="Directeur">Directeur</option>
                            <option value="Chef de Division">Chef de Division</option>
                            <option value="Chef de Bureau">Chef de Bureau</option>
                            <option value="Attaché d'Administration">Attaché d'Administration</option>
                            <option value="Agent de Collaboration">Agent de Collaboration</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Statut</label>
                        <select
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary">
                            <option value="Actif">Actif</option>
                            <option value="Non_actif">Non actif</option>
                            <option value="Déserteur">Déserteur</option>
                            <option value="Décédé">Décédé</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Rémunération de base
                            (CDF/USD)</label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 font-medium text-sm">$</span>
                            <input
                                class="w-full pl-7 rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                                placeholder="0.00" type="number" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Réf. Carte
                            Biométrique</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-primary focus:border-primary"
                            placeholder="ID-XXXX-XXXX" type="text" />
                    </div>
                </div>
            </section>
            <div class="h-20"></div>
        </div>
    </div>
</x-app-layout>
