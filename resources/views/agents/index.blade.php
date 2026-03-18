<x-app-layout>
    <div x-data="{ 
        showModal: false, 
        showStatusModal: false,
        selectedAgent: { name: '', id: '' },
        newStatus: ''
    }" class="min-h-screen bg-white font-sans text-slate-800">
        
        <!-- Header épuré sans fond noir -->
        <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
            <div class="max-w-[1600px] mx-auto px-4 lg:px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-primary rounded-lg">
                        <span class="material-symbols-outlined text-white block text-2xl">badge</span>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800">FLUX-RH</h2>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-slate-400 text-base">search</span>
                        <input type="text" placeholder="Recherche matricule ou nom..." 
                               class="pl-10 pr-4 py-2.5 bg-slate-100 border-none rounded-lg text-sm w-72 focus:ring-1 focus:ring-primary/30">
                    </div>
                    <button @click="showModal = true" class="px-5 py-2.5 bg-primary text-white text-xs font-medium rounded-lg shadow-sm hover:bg-primary/90 transition flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">person_add</span>
                        Nouvel Agent
                    </button>
                </div>
            </div>
        </header>

        <main class="p-4 lg:p-6 max-w-[1600px] mx-auto space-y-6">
            <!-- Statistiques simplifiées (tons clairs) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-5 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">check_circle</span>
                        </div>
                        <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-0.5 rounded">En poste</span>
                    </div>
                    <h4 class="text-2xl font-bold tracking-tight">1,248</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Agents Actifs</p>
                </div>

                <div class="bg-white p-5 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">directions_run</span>
                        </div>
                        <span class="text-xs font-medium text-amber-600 bg-amber-50 px-2 py-0.5 rounded">Alerte</span>
                    </div>
                    <h4 class="text-2xl font-bold tracking-tight">14</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Déserteurs</p>
                </div>

                <div class="bg-white p-5 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">elderly</span>
                        </div>
                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-0.5 rounded">Retraite</span>
                    </div>
                    <h4 class="text-2xl font-bold tracking-tight">89</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Agents Âgés</p>
                </div>

                <div class="bg-white p-5 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">heart_broken</span>
                        </div>
                        <span class="text-xs font-medium text-red-600 bg-red-50 px-2 py-0.5 rounded">Inactif</span>
                    </div>
                    <h4 class="text-2xl font-bold tracking-tight">06</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Décédés</p>
                </div>
            </div>

            <!-- Tableau épuré avec les champs demandés -->
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Matricule</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Nom</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Postnom</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Fonction</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Service/Province</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Genre</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Ancienneté</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-slate-500 uppercase tracking-wider">Statut</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Exemple de ligne avec données réalistes -->
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-4 py-3 text-sm font-mono text-primary">AG-2026-004</td>
                                <td class="px-4 py-3 text-sm font-medium">Marcel</td>
                                <td class="px-4 py-3 text-sm">KABAMBA MUTEBA</td>
                                <td class="px-4 py-3 text-sm">Directeur de Cabinet</td>
                                <td class="px-4 py-3 text-sm">Finance / Kinshasa</td>
                                <td class="px-4 py-3 text-sm">M</td>
                                <td class="px-4 py-3 text-sm">8 ans</td>
                                <td class="px-4 py-3 text-center">
                                    <button @click="showStatusModal = true; selectedAgent = {name: 'Marcel KABAMBA', id: 'AG-004'}" 
                                            class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        ACTIF
                                    </button>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-1">
                                        <button title="Voir" class="p-2 rounded-lg text-slate-500 hover:bg-slate-100">
                                            <span class="material-symbols-outlined text-base">visibility</span>
                                        </button>
                                        <button title="Modifier" class="p-2 rounded-lg text-blue-600 hover:bg-blue-50">
                                            <span class="material-symbols-outlined text-base">edit_note</span>
                                        </button>
                                        <button title="Supprimer" class="p-2 rounded-lg text-red-500 hover:bg-red-50">
                                            <span class="material-symbols-outlined text-base">delete_forever</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Autres lignes... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <!-- Modal d'ajout d'agent (version allégée sans fond noir) -->
        <div x-show="showModal" x-transition.opacity class="fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-slate-900/90 backdrop-blur-xl" @click="showModal = false"></div>
            
            <div class="relative bg-white w-full max-w-6xl rounded-3xl shadow-2xl flex flex-col max-h-[95vh] overflow-hidden border border-slate-200">
                <div class="px-8 py-6 border-b border-slate-200 flex items-center justify-between bg-white/90 backdrop-blur-md sticky top-0 z-10">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-800">Nouveau Dossier Agent</h3>
                        <p class="text-xs text-slate-500 mt-1">Saisie complète des données administratives</p>
                    </div>
                    <button @click="showModal = false" class="w-10 h-10 flex items-center justify-center bg-slate-100 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <form id="fullAgentForm" class="p-8 overflow-y-auto bg-slate-50 space-y-8" enctype="multipart/form-data">
                    
                    <section class="space-y-4">
                        <h4 class="text-xs font-semibold uppercase text-primary tracking-wider">01. Identité & État Civil</h4>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="text-xs text-slate-500">Matricule</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:ring-1 focus:ring-primary/30" placeholder="Ex: AG-2026-000">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Nom</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Postnom</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Prénom</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Date de naissance</label>
                                <input type="date" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Lieu de naissance</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Genre</label>
                                <select class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">État Civil</label>
                                <select class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                                    <option>Célibataire</option>
                                    <option>Marié(e)</option>
                                    <option>Veuf(ve)</option>
                                    <option>Divorcé(e)</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Nombre d'enfants</label>
                                <input type="number" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-4">
                        <h4 class="text-xs font-semibold uppercase text-amber-600 tracking-wider">02. Coordonnées & Adresse</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="text-xs text-slate-500">Téléphone</label>
                                <input type="tel" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm" placeholder="+243...">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Email</label>
                                <input type="email" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm" placeholder="agent@fluxrh.cd">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Adresse Domicile</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Ville</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Province</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Pays</label>
                                <input type="text" value="RD Congo" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-medium">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-4">
                        <h4 class="text-xs font-semibold uppercase text-blue-600 tracking-wider">03. Parcours Académique</h4>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="text-xs text-slate-500">Niveau d'étude</label>
                                <select class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                                    <option>D6 (Humanités)</option>
                                    <option>Graduat / Licence</option>
                                    <option>Master / DES</option>
                                    <option>Doctorat (PhD)</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Domaine d'étude</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Institution</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Année d'obtention</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-4 p-6 bg-primary/5 rounded-xl border border-primary/10">
                        <h4 class="text-xs font-semibold uppercase text-primary tracking-wider">04. Carrière & Affectation</h4>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="text-xs text-slate-500">Catégorie Grade</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Position / Titre</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Date d'embauche</label>
                                <input type="date" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Rémunération</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm" placeholder="USD / CDF">
                            </div>
                            <div class="md:col-span-2 grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-xs text-slate-500">Coordination</label>
                                    <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                                </div>
                                <div>
                                    <label class="text-xs text-slate-500">Direction</label>
                                    <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                                </div>
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Division</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Bureau / Unité</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-4">
                        <h4 class="text-xs font-semibold uppercase text-purple-600 tracking-wider">05. Actes & Références</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="text-xs text-slate-500">Commission d'affectation</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm" placeholder="Référence">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Nature de l'acte</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm" placeholder="Promotion, Engagement...">
                            </div>
                            <div>
                                <label class="text-xs text-slate-500">Arrêté / Référence</label>
                                <input type="text" class="w-full mt-1 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-4">
                        <h4 class="text-xs font-semibold uppercase text-slate-700 tracking-wider">06. Documents & Biométrie</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="p-4 bg-white border border-dashed border-slate-300 rounded-xl flex flex-col items-center text-center hover:border-primary transition">
                                <div class="w-10 h-10 bg-primary/10 text-primary rounded-full flex items-center justify-center mb-2">
                                    <span class="material-symbols-outlined">school</span>
                                </div>
                                <p class="text-xs font-medium mb-1">Diplômes</p>
                                <p class="text-[10px] text-slate-400 mb-2">PDF, JPG (Max 5Mo)</p>
                                <input type="file" class="text-[10px] text-slate-400 file:bg-primary file:text-white file:border-none file:px-3 file:py-1 file:rounded-md file:text-xs">
                            </div>
                            <div class="p-4 bg-white border border-dashed border-slate-300 rounded-xl flex flex-col items-center text-center hover:border-amber-500 transition">
                                <div class="w-10 h-10 bg-amber-500/10 text-amber-600 rounded-full flex items-center justify-center mb-2">
                                    <span class="material-symbols-outlined">fingerprint</span>
                                </div>
                                <p class="text-xs font-medium mb-1">Carte Biométrique</p>
                                <p class="text-[10px] text-slate-400 mb-2">Recto-Verso</p>
                                <input type="file" class="text-[10px] text-slate-400 file:bg-amber-500 file:text-white file:border-none file:px-3 file:py-1 file:rounded-md file:text-xs">
                            </div>
                            <div class="p-4 bg-white border border-dashed border-slate-300 rounded-xl flex flex-col items-center text-center hover:border-purple-500 transition">
                                <div class="w-10 h-10 bg-purple-500/10 text-purple-600 rounded-full flex items-center justify-center mb-2">
                                    <span class="material-symbols-outlined">description</span>
                                </div>
                                <p class="text-xs font-medium mb-1">Acte d'affectation</p>
                                <p class="text-[10px] text-slate-400 mb-2">Copie certifiée</p>
                                <input type="file" class="text-[10px] text-slate-400 file:bg-purple-500 file:text-white file:border-none file:px-3 file:py-1 file:rounded-md file:text-xs">
                            </div>
                        </div>
                    </section>
                </form>

                <div class="px-8 py-4 border-t border-slate-200 bg-white flex justify-end gap-4">
                    <button @click="showModal = false" class="px-4 py-2 text-xs font-medium text-slate-500 hover:text-slate-700">Annuler</button>
                    <button type="submit" form="fullAgentForm" class="px-6 py-2 bg-primary text-white text-xs font-medium rounded-lg shadow-sm hover:bg-primary/90">Enregistrer</button>
                </div>
            </div>
        </div>

        <!-- Modal de changement de statut (version claire) -->
        <div x-show="showStatusModal" x-transition.opacity class="fixed inset-0 z-[120] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-slate-900/80" @click="showStatusModal = false"></div>
            <div class="relative bg-white w-full max-w-sm rounded-2xl p-6 text-center shadow-xl border border-slate-200">
                <div class="w-16 h-16 bg-primary/10 text-primary rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl">sync_alt</span>
                </div>
                <h3 class="text-lg font-semibold text-slate-800">Changer le statut</h3>
                <p class="text-xs text-slate-500 mt-1" x-text="selectedAgent.name"></p>
                
                <div class="mt-6 space-y-2">
                    <template x-for="status in ['Actif', 'Déserteur', 'Âgé', 'Décédé']">
                        <button @click="newStatus = status" 
                                :class="newStatus === status ? 'bg-primary text-white ring-2 ring-primary/20' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                                class="w-full py-3 rounded-lg text-xs font-medium transition">
                            <span x-text="status"></span>
                        </button>
                    </template>
                </div>

                <div class="flex gap-2 mt-6">
                    <button class="flex-1 py-3 bg-slate-900 text-white rounded-lg text-xs font-medium">Confirmer</button>
                    <button @click="showStatusModal = false" class="flex-1 py-3 bg-slate-100 text-slate-600 rounded-lg text-xs font-medium">Annuler</button>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>