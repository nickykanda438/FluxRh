<x-app-layout>
    <div x-data="{ 
        showModal: false, 
        showStatusModal: false,
        selectedAgent: { name: '', id: '' },
        newStatus: ''
    }" class="min-h-screen bg-slate-50 dark:bg-black font-sans text-slate-900 dark:text-slate-100">
        
        <header class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-30 shadow-sm">
            <div class="max-w-[1600px] mx-auto px-4 lg:px-8 py-5 flex flex-col md:flex-row items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tighter flex items-center gap-3">
                        <div class="p-2 bg-primary rounded-xl">
                            <span class="material-symbols-outlined text-white block">badge</span>
                        </div>
                        FLUX-RH PRO
                    </h2>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-slate-400 text-sm">search</span>
                        <input type="text" placeholder="Recherche matricule ou nom..." 
                               class="pl-10 pr-4 py-3 bg-slate-100 dark:bg-slate-800 border-none rounded-2xl text-xs w-72 focus:ring-2 focus:ring-primary/20 transition-all font-medium">
                    </div>
                    <button @click="showModal = true" class="px-6 py-3 bg-primary text-white text-xs font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-primary/30 hover:bg-primary/90 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">person_add</span>
                        Nouvel Agent
                    </button>
                </div>
            </div>
        </header>

        <main class="p-6 lg:p-8 max-w-[1600px] mx-auto space-y-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-green-500/50 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-50 dark:bg-green-500/10 text-green-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined">check_circle</span>
                        </div>
                        <span class="text-[10px] font-black text-green-600 bg-green-50 dark:bg-green-900/30 px-2 py-1 rounded-md uppercase">En poste</span>
                    </div>
                    <h4 class="text-3xl font-black tracking-tighter">1,248</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Agents Actifs</p>
                </div>

                <div class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-amber-500/50 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-amber-50 dark:bg-amber-500/10 text-amber-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined">directions_run</span>
                        </div>
                        <span class="text-[10px] font-black text-amber-600 bg-amber-50 dark:bg-amber-900/30 px-2 py-1 rounded-md uppercase">Alerte</span>
                    </div>
                    <h4 class="text-3xl font-black tracking-tighter">14</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Déserteurs</p>
                </div>

                <div class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-blue-500/50 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-50 dark:bg-blue-500/10 text-blue-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined">elderly</span>
                        </div>
                        <span class="text-[10px] font-black text-blue-600 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded-md uppercase">Retraite</span>
                    </div>
                    <h4 class="text-3xl font-black tracking-tighter">89</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Agents Âgés</p>
                </div>

                <div class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-red-500/50 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-red-50 dark:bg-red-500/10 text-red-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined">heart_broken</span>
                        </div>
                        <span class="text-[10px] font-black text-red-600 bg-red-50 dark:bg-red-900/30 px-2 py-1 rounded-md uppercase">Inactif</span>
                    </div>
                    <h4 class="text-3xl font-black tracking-tighter">06</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Décédés</p>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-[2.5rem] shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-0">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50">
                                <th class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">Matricule</th>
                                <th class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">Agent</th>
                                <th class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">Affectation</th>
                                <th class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800 text-center">Statut</th>
                                <th class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            <tr class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-all">
                                <td class="px-8 py-6 text-sm font-black text-primary italic uppercase">AG-2026-004</td>
                                <td class="px-8 py-6">
                                    <p class="text-sm font-black uppercase tracking-tight">KABAMBA MUTEBA Marcel</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase mt-1">Directeur de Cabinet</p>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex flex-col gap-1">
                                        <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-lg text-[10px] font-black uppercase w-fit">Finance</span>
                                        <span class="text-[9px] text-slate-400 font-bold px-1 uppercase">Kinshasa / Division B.</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <button @click="showStatusModal = true; selectedAgent = {name: 'KABAMBA MUTEBA Marcel', id: 'AG-004'}" 
                                            class="px-5 py-2 rounded-full text-[10px] font-black bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 uppercase tracking-widest hover:ring-4 ring-green-500/10 transition-all">
                                        ACTIF
                                    </button>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center justify-end gap-2">
                                        <button title="Voir Fiche" class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white transition-all">
                                            <span class="material-symbols-outlined text-lg">visibility</span>
                                        </button>
                                        <button title="Modifier" class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white transition-all">
                                            <span class="material-symbols-outlined text-lg">edit_note</span>
                                        </button>
                                        <button title="Supprimer" class="w-9 h-9 flex items-center justify-center rounded-xl bg-red-50 dark:bg-red-900/20 text-red-500 hover:bg-red-500 hover:text-white transition-all">
                                            <span class="material-symbols-outlined text-lg">delete_forever</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <div x-show="showModal" x-transition.opacity class="fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-slate-900/90 backdrop-blur-xl" @click="showModal = false"></div>
            
            <div class="relative bg-white dark:bg-slate-900 w-full max-w-6xl rounded-[3rem] shadow-2xl flex flex-col max-h-[95vh] overflow-hidden border border-white/10">
                <div class="px-12 py-8 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between bg-white/50 dark:bg-slate-900/50 backdrop-blur-md sticky top-0 z-10">
                    <div>
                        <h3 class="text-3xl font-black text-slate-900 dark:text-white uppercase tracking-tighter italic">Nouveau Dossier Agent</h3>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Saisie complète des données administratives et de carrière</p>
                    </div>
                    <button @click="showModal = false" class="w-14 h-14 flex items-center justify-center bg-slate-50 dark:bg-slate-800 rounded-[1.5rem] hover:bg-red-500 hover:text-white transition-all group">
                        <span class="material-symbols-outlined group-hover:rotate-90 transition-transform">close</span>
                    </button>
                </div>

                <form id="fullAgentForm" class="p-12 overflow-y-auto bg-slate-50/30 dark:bg-slate-900/30 space-y-12" enctype="multipart/form-data">
                    
                    <section class="space-y-6">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-primary tracking-[0.4em]">01. Identité & État Civil</h4>
                            <div class="h-[1px] flex-1 bg-primary/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Matricule</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm focus:ring-4 focus:ring-primary/10 transition-all" placeholder="Ex: AG-2026-000">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Nom</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Postnom</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Prénom</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Date de naissance</label>
                                <input type="date" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Lieu de naissance</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Genre</label>
                                <select class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">État Civil</label>
                                <select class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                                    <option>Célibataire</option>
                                    <option>Marié(e)</option>
                                    <option>Veuf(ve)</option>
                                    <option>Divorcé(e)</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Nombre d'enfants</label>
                                <input type="number" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-6">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-amber-500 tracking-[0.4em]">02. Coordonnées & Adresse</h4>
                            <div class="h-[1px] flex-1 bg-amber-500/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Téléphone</label>
                                <input type="tel" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm" placeholder="+243...">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Email</label>
                                <input type="email" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm" placeholder="agent@fluxrh.cd">
                            </div>
                            <div class="md:col-span-1">
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Adresse Domicile</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Ville</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Province</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Pays</label>
                                <input type="text" value="RD Congo" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm font-bold">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-6">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-blue-500 tracking-[0.4em]">03. Parcours Académique</h4>
                            <div class="h-[1px] flex-1 bg-blue-500/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Niveau d'étude</label>
                                <select class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                                    <option>D6 (Humanités)</option>
                                    <option>Graduat / Licence (LMD)</option>
                                    <option>Master / DES</option>
                                    <option>Doctorat (PhD)</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Domaine d'étude</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Nom de l'institution</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Année d'obtention</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-6 p-8 bg-primary/5 rounded-[2.5rem] border border-primary/10">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-primary tracking-[0.4em]">04. Carrière & Affectation</h4>
                            <div class="h-[1px] flex-1 bg-primary/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Catégorie Grade</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Position / Titre</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Date d'embauche</label>
                                <input type="date" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Rémunération</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm" placeholder="USD / CDF">
                            </div>
                            <div class="md:col-span-2 grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Coordination</label>
                                    <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                                </div>
                                <div>
                                    <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Direction / Département</label>
                                    <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                                </div>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Division</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Bureau / Unité</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-6">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-purple-500 tracking-[0.4em]">05. Actes & Références</h4>
                            <div class="h-[1px] flex-1 bg-purple-500/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Commission d'affectation</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm" placeholder="Référence de la commission">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Nature de l'acte</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm" placeholder="Ex: Promotion, Engagement...">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Arrêté / Référence</label>
                                <input type="text" class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-6">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-slate-900 dark:text-white tracking-[0.4em]">06. Documents & Biométrie</h4>
                            <div class="h-[1px] flex-1 bg-slate-200 dark:bg-slate-800"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="p-6 bg-white dark:bg-slate-800 rounded-[2rem] border-2 border-dashed border-slate-200 dark:border-slate-700 flex flex-col items-center text-center group hover:border-primary transition-all">
                                <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mb-4">
                                    <span class="material-symbols-outlined">school</span>
                                </div>
                                <p class="text-[11px] font-black uppercase mb-1">Diplômes & Formation</p>
                                <p class="text-[9px] text-slate-400 mb-4 font-bold uppercase">PDF, JPG (Max 5Mo)</p>
                                <input type="file" class="text-[10px] text-slate-400 file:bg-primary file:text-white file:border-none file:px-4 file:py-2 file:rounded-lg file:font-black">
                            </div>
                            <div class="p-6 bg-white dark:bg-slate-800 rounded-[2rem] border-2 border-dashed border-slate-200 dark:border-slate-700 flex flex-col items-center text-center group hover:border-amber-500 transition-all">
                                <div class="w-12 h-12 bg-amber-500/10 text-amber-500 rounded-full flex items-center justify-center mb-4">
                                    <span class="material-symbols-outlined">fingerprint</span>
                                </div>
                                <p class="text-[11px] font-black uppercase mb-1">Carte Biométrique</p>
                                <p class="text-[9px] text-slate-400 mb-4 font-bold uppercase">Scannage Recto-Verso</p>
                                <input type="file" class="text-[10px] text-slate-400 file:bg-amber-500 file:text-white file:border-none file:px-4 file:py-2 file:rounded-lg file:font-black">
                            </div>
                            <div class="p-6 bg-white dark:bg-slate-800 rounded-[2rem] border-2 border-dashed border-slate-200 dark:border-slate-700 flex flex-col items-center text-center group hover:border-purple-500 transition-all">
                                <div class="w-12 h-12 bg-purple-500/10 text-purple-500 rounded-full flex items-center justify-center mb-4">
                                    <span class="material-symbols-outlined">description</span>
                                </div>
                                <p class="text-[11px] font-black uppercase mb-1">Acte d'affectation</p>
                                <p class="text-[9px] text-slate-400 mb-4 font-bold uppercase">Copie certifiée</p>
                                <input type="file" class="text-[10px] text-slate-400 file:bg-purple-500 file:text-white file:border-none file:px-4 file:py-2 file:rounded-lg file:font-black">
                            </div>
                        </div>
                    </section>
                </form>

                <div class="px-12 py-8 border-t border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900 flex justify-end gap-6 items-center">
                    <button @click="showModal = false" class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-colors">Abandonner</button>
                    <button type="submit" form="fullAgentForm" class="px-14 py-4 bg-primary text-white text-xs font-black uppercase tracking-[0.2em] rounded-[1.5rem] shadow-2xl shadow-primary/40 hover:scale-105 active:scale-95 transition-all">Valider l'enregistrement</button>
                </div>
            </div>
        </div>

        <div x-show="showStatusModal" x-transition.opacity class="fixed inset-0 z-[120] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/90 backdrop-blur-md" @click="showStatusModal = false"></div>
            <div class="relative bg-white dark:bg-slate-900 w-full max-w-sm rounded-[3rem] p-10 text-center shadow-2xl border border-white/5">
                <div class="w-20 h-20 bg-primary/10 text-primary rounded-[2rem] flex items-center justify-center mx-auto mb-6">
                    <span class="material-symbols-outlined text-4xl">sync_alt</span>
                </div>
                <h3 class="text-xl font-black uppercase tracking-tighter">Statut de l'agent</h3>
                <p class="text-xs text-slate-400 font-bold mt-2 uppercase italic" x-text="selectedAgent.name"></p>
                
                <div class="mt-8 space-y-3">
                    <template x-for="status in ['Actif', 'Déserteur', 'Âgé', 'Décédé']">
                        <button @click="newStatus = status" 
                                :class="newStatus === status ? 'bg-primary text-white ring-8 ring-primary/10' : 'bg-slate-100 dark:bg-slate-800 text-slate-500'"
                                class="w-full py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest transition-all">
                            <span x-text="status"></span>
                        </button>
                    </template>
                </div>

                <div class="flex flex-col gap-2 mt-10">
                    <button class="w-full py-4 bg-slate-900 dark:bg-white dark:text-black text-white rounded-2xl text-[10px] font-black uppercase tracking-widest">Confirmer le changement</button>
                    <button @click="showStatusModal = false" class="w-full py-4 text-[10px] font-black uppercase text-slate-400">Annuler</button>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>