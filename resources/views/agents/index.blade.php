<x-app-layout>
    {{-- Notifications Flash --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="fixed top-5 right-5 z-[110] flex items-center p-4 text-green-800 border-l-4 border-green-500 rounded-2xl bg-white shadow-2xl dark:bg-slate-900 dark:text-green-400">
            <span class="material-symbols-outlined mr-3">check_circle</span>
            <p class="text-xs font-black uppercase tracking-widest">{{ session('success') }}</p>
        </div>
    @endif

    <div x-data="{ 
        showModal: false, 
        step: 1,
        search: '' 
    }" class="min-h-screen bg-slate-50 dark:bg-black font-sans text-slate-900 dark:text-slate-100">

        {{-- 1. HEADER & ACTIONS --}}
        <header class="sticky top-0 z-40 bg-white/80 dark:bg-black/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
            <div class="max-w-[1600px] mx-auto px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-600/20">
                        <span class="material-symbols-outlined text-white">groups</span>
                    </div>
                    <h2 class="text-xl font-black tracking-tighter uppercase italic">FluxRh <span class="text-blue-600">/</span> Gestion Agents</h2>
                </div>

                <div class="flex items-center gap-4 w-full md:w-auto">
                    <div class="relative flex-1 md:w-80">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                        <input type="text" x-model="search" placeholder="Rechercher un agent..." 
                            class="w-full pl-12 pr-4 py-3 bg-slate-100 dark:bg-slate-800 border-none rounded-2xl text-xs font-bold focus:ring-2 focus:ring-blue-600/20 transition-all">
                    </div>
                    <button @click="showModal = true; step = 1" class="px-8 py-3.5 bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-blue-600/30 hover:scale-105 active:scale-95 transition-all flex items-center gap-3">
                        <span class="material-symbols-outlined text-sm">person_add</span>
                        Ajouter Agent
                    </button>
                </div>
            </div>
        </header>

        <main class="p-6 lg:p-10 max-w-[1600px] mx-auto space-y-10">
            
            {{-- 2. CARTES DE STATISTIQUES --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="group bg-white dark:bg-slate-900 p-8 rounded-[2.5rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-blue-500 transition-all duration-500">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 bg-blue-50 dark:bg-blue-500/10 text-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">verified_user</span>
                        </div>
                        <span class="text-[9px] font-black text-blue-600 bg-blue-50 dark:bg-blue-900/30 px-3 py-1.5 rounded-full uppercase">En Poste</span>
                    </div>
                    <h4 class="text-4xl font-black tracking-tighter">{{ $stats['countActifs'] ?? 0 }}</h4>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-2">Effectif Global</p>
                </div>

                <div class="group bg-white dark:bg-slate-900 p-8 rounded-[2.5rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-amber-500 transition-all duration-500">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 bg-amber-50 dark:bg-amber-500/10 text-amber-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">warning</span>
                        </div>
                        <span class="text-[9px] font-black text-amber-600 bg-amber-50 dark:bg-amber-900/30 px-3 py-1.5 rounded-full uppercase">Alertes</span>
                    </div>
                    <h4 class="text-4xl font-black tracking-tighter">{{ $stats['countDeserteurs'] ?? 0 }}</h4>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-2">Désertions Signalées</p>
                </div>

                <div class="group bg-white dark:bg-slate-900 p-8 rounded-[2.5rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-purple-500 transition-all duration-500">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 bg-purple-50 dark:bg-purple-500/10 text-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">hourglass_bottom</span>
                        </div>
                        <span class="text-[9px] font-black text-purple-600 bg-purple-50 dark:bg-purple-900/30 px-3 py-1.5 rounded-full uppercase">Carrière</span>
                    </div>
                    <h4 class="text-4xl font-black tracking-tighter">{{ $stats['countRetraite'] ?? 0 }}</h4>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-2">Éligibles Retraite</p>
                </div>

                <div class="group bg-white dark:bg-slate-900 p-8 rounded-[2.5rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-red-500 transition-all duration-500">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 bg-red-50 dark:bg-red-500/10 text-red-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">person_off</span>
                        </div>
                        <span class="text-[9px] font-black text-red-600 bg-red-50 dark:bg-red-900/30 px-3 py-1.5 rounded-full uppercase">Inactifs</span>
                    </div>
                    <h4 class="text-4xl font-black tracking-tighter">{{ $stats['countDecedes'] ?? 0 }}</h4>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-2">Dossiers Clôturés</p>
                </div>
            </div>

            {{-- 3. TABLEAU D'AFFICHAGE --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-[2.5rem] shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-0">
                        <thead>
                            <tr class="bg-slate-50/50 dark:bg-slate-800/50">
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">Matricule</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">Identité Agent</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">Bureau / Affectation</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800 text-center">Statut</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @forelse ($agents as $agent)
                                <tr class="group hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-all">
                                    <td class="px-8 py-6">
                                        <span class="text-xs font-black text-blue-600 italic bg-blue-50 dark:bg-blue-900/20 px-3 py-1.5 rounded-lg border border-blue-100 dark:border-blue-800">
                                            {{ $agent->matricule }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-black uppercase tracking-tight text-slate-800 dark:text-slate-100">
                                                {{ $agent->nom }} {{ $agent->prenom }}
                                            </span>
                                            <span class="text-[10px] text-slate-400 font-bold uppercase mt-1 italic">{{ $agent->fonction ?? 'Agent de Bureau' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex flex-col">
                                            <span class="text-[11px] font-black uppercase text-slate-600 dark:text-slate-300">{{ $agent->bureau ?? 'N/A' }}</span>
                                            <span class="text-[9px] text-slate-400 font-bold uppercase">{{ $agent->province ?? 'Kinshasa' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest border 
                                            {{ $agent->status == 'ACTIF' ? 'bg-green-50 text-green-600 border-green-200' : 'bg-red-50 text-red-600 border-red-200' }}">
                                            {{ $agent->status }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('agents.show', $agent->id) }}" class="p-2 rounded-xl bg-slate-100 text-slate-500 hover:bg-blue-600 hover:text-white transition-all">
                                                <span class="material-symbols-outlined text-lg">visibility</span>
                                            </a>
                                            <a href="{{ route('agents.edit', $agent->id) }}" class="p-2 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">
                                                <span class="material-symbols-outlined text-lg">edit</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-20 text-center text-slate-400 italic">Aucun agent trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <div x-show="showModal" @click.outside="showModal = false" x-transition.opacity
            class="fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="showModal = false"></div>

            <div class="relative w-full max-w-5xl bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden">
                <div class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800">
                    <div class="flex items-start justify-between p-6 border-b border-slate-200 dark:border-slate-800">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white uppercase tracking-tight">
                            Fiche Complète du Nouvel Agent
                        </h3>
                        <button @click="showModal = false" type="button" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 rounded-lg transition-colors">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <form action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-8 max-h-[70vh] overflow-y-auto">
                        @csrf

                        {{-- SECTION 1 : IDENTITÉ & ÉTAT-CIVIL --}}
                        <div>
                            <div class="flex items-center mb-6 text-blue-600 dark:text-blue-400 font-black text-[10px] uppercase tracking-[0.2em]">
                                <span class="mr-2">01.</span> Identité & État-Civil
                                <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700 ml-4"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Matricule *</label>
                                    <input type="text" name="matricule" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Catégorie/Grade</label>
                                    <input type="text" name="categorie_grade" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Nom *</label>
                                    <input type="text" name="nom" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Prénom *</label>
                                    <input type="text" name="prenom" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Postnom</label>
                                    <input type="text" name="postnom" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Genre</label>
                                    <select name="genre" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                        <option value="">Sélectionner</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Féminin</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Date de Naissance</label>
                                    <input type="date" name="date_naissance" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Lieu de Naissance</label>
                                    <input type="text" name="lieu_naissance" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">État Civil</label>
                                    <select name="etat_civil" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                        <option value="">Sélectionner</option>
                                        <option value="Célibataire">Célibataire</option>
                                        <option value="Marié">Marié(e)</option>
                                        <option value="Veuf">Veuf(ve)</option>
                                        <option value="Divorcé">Divorcé(e)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Nombre d'enfants</label>
                                    <input type="number" name="nbre_enfant" min="0" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        {{-- SECTION 2 : CONTACT & ADRESSE --}}
                        <div>
                            <div class="flex items-center mb-6 text-green-600 dark:text-green-400 font-black text-[10px] uppercase tracking-[0.2em]">
                                <span class="mr-2">02.</span> Contact & Adresse
                                <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700 ml-4"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Téléphone</label>
                                    <input type="tel" name="telephone" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Email</label>
                                    <input type="email" name="email" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Adresse</label>
                                    <textarea name="adresse" rows="2" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500"></textarea>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Province</label>
                                    <input type="text" name="province" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Ville</label>
                                    <input type="text" name="ville" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        {{-- SECTION 3 : ÉTUDES & FORMATION --}}
                        <div>
                            <div class="flex items-center mb-6 text-purple-600 dark:text-purple-400 font-black text-[10px] uppercase tracking-[0.2em]">
                                <span class="mr-2">03.</span> Études & Formation
                                <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700 ml-4"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Niveau d'étude</label>
                                    <input type="text" name="niveau_etude" placeholder="Ex: BAC, Licence, Master" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Domaine d'étude</label>
                                    <input type="text" name="domaine_etude" placeholder="Ex: Informatique, Droit" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Année d'obtention</label>
                                    <input type="number" name="annee_obtention" placeholder="2020" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Nom de l'institution</label>
                                    <input type="text" name="nom_institution" placeholder="Université ou École" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Pays d'étude</label>
                                    <input type="text" name="pays_etude" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        {{-- SECTION 4 : DOCUMENTS & CERTIFICATIONS --}}
                        <div>
                            <div class="flex items-center mb-6 text-amber-600 dark:text-amber-400 font-black text-[10px] uppercase tracking-[0.2em]">
                                <span class="mr-2">04.</span> Documents & Certifications
                                <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700 ml-4"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Diplôme (Fichier)</label>
                                    <input type="file" name="doc_diplome" accept=".pdf,.jpg,.png" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 file:bg-blue-600 file:text-white file:rounded file:border-0 file:py-1 file:px-3">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Référence Diplôme</label>
                                    <input type="text" name="ref_diplome" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Date d'obtention Diplôme</label>
                                    <input type="date" name="date_obtention_diplome" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Carte Biométrique</label>
                                    <input type="file" name="doc_biometrie" accept=".pdf,.jpg,.png" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 file:bg-blue-600 file:text-white file:rounded file:border-0 file:py-1 file:px-3">
                                </div>
                            </div>
                        </div>

                        {{-- SECTION 5 : CARRIÈRE & AFFECTATION --}}
                        <div>
                            <div class="flex items-center mb-6 text-orange-600 dark:text-orange-400 font-black text-[10px] uppercase tracking-[0.2em]">
                                <span class="mr-2">05.</span> Carrière & Affectation
                                <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700 ml-4"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Position/Fonction</label>
                                    <input type="text" name="position" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Date d'embauche</label>
                                    <input type="date" name="date_embauche" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Rémunération (CDF/USD)</label>
                                    <input type="number" name="remuneration" step="0.01" min="0" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-5">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Département</label>
                                    <input type="text" name="departement" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Coordination</label>
                                    <input type="text" name="coordination" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Division</label>
                                    <input type="text" name="division" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Bureau</label>
                                    <input type="text" name="bureau" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Unité</label>
                                    <input type="text" name="unite" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Commission/Affectation</label>
                                    <input type="text" name="commission_affectation" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Arrêté</label>
                                    <input type="text" name="arrete" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Nature de l'acte</label>
                                    <input type="text" name="nature_acte" class="bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 text-sm rounded-xl w-full p-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        {{-- BOUTONS ACTIONS --}}
                        <div class="flex items-center gap-3 border-t border-slate-200 dark:border-slate-700 pt-6">
                            <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-black uppercase rounded-xl transition-all focus:ring-4 focus:ring-blue-500/30">
                                Enregistrer l'agent
                            </button>
                            <button @click="showModal = false" type="button" class="px-8 py-3 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-600 text-sm font-black uppercase rounded-xl transition-all">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         

    </div>

    <style>
        /* Custom UI */
        ::-webkit-scrollbar { width: 4px; height: 4px; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        .dark ::-webkit-scrollbar-thumb { background: #1e293b; }
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(0.5);
            cursor: pointer;
        }
    </style>
</x-app-layout>