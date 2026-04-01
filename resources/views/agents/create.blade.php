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
                <a href="{{ route('agents.index') }}"
                    class="px-6 py-2.5 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg transition-all">
                    Annuler
                </a>
                <button type="submit" form="createAgentForm"
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
            <form id="createAgentForm" method="POST" action="{{ route('agents.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- SECTION 1: INFORMATIONS IDENTITAIRES -->
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
                        <!-- Matricule -->
                        <div class="flex flex-col gap-1.5">
                            <label for="matricule" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Matricule <span class="text-red-500">*</span></label>
                            <input
                                id="matricule"
                                name="matricule"
                                type="text"
                                value="{{ old('matricule') }}"
                                placeholder="Ex: AG-2024-001"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary @error('matricule') border-red-500 @enderror"
                                required />
                            @error('matricule')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nom -->
                        <div class="flex flex-col gap-1.5">
                            <label for="nom" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nom <span class="text-red-500">*</span></label>
                            <input
                                id="nom"
                                name="nom"
                                type="text"
                                value="{{ old('nom') }}"
                                placeholder="Nom de famille"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary @error('nom') border-red-500 @enderror"
                                required />
                            @error('nom')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Postnom -->
                        <div class="flex flex-col gap-1.5">
                            <label for="postnom" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Postnom <span class="text-red-500">*</span></label>
                            <input
                                id="postnom"
                                name="postnom"
                                type="text"
                                value="{{ old('postnom') }}"
                                placeholder="Postnom"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary @error('postnom') border-red-500 @enderror"
                                required />
                            @error('postnom')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Prénom -->
                        <div class="flex flex-col gap-1.5">
                            <label for="prenom" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Prénom <span class="text-red-500">*</span></label>
                            <input
                                id="prenom"
                                name="prenom"
                                type="text"
                                value="{{ old('prenom') }}"
                                placeholder="Prénom"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary @error('prenom') border-red-500 @enderror"
                                required />
                            @error('prenom')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Genre -->
                        <div class="flex flex-col gap-1.5">
                            <label for="genre" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Genre</label>
                            <select
                                id="genre"
                                name="genre"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="">Sélectionner</option>
                                <option value="M" {{ old('genre') === 'M' ? 'selected' : '' }}>Masculin</option>
                                <option value="F" {{ old('genre') === 'F' ? 'selected' : '' }}>Féminin</option>
                            </select>
                        </div>

                        <!-- Date de naissance -->
                        <div class="flex flex-col gap-1.5">
                            <label for="date_naissance" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Date de naissance</label>
                            <input
                                id="date_naissance"
                                name="date_naissance"
                                type="date"
                                value="{{ old('date_naissance') }}"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Lieu de naissance -->
                        <div class="flex flex-col gap-1.5 lg:col-span-2">
                            <label for="lieu_naissance" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Lieu de naissance</label>
                            <input
                                id="lieu_naissance"
                                name="lieu_naissance"
                                type="text"
                                value="{{ old('lieu_naissance') }}"
                                placeholder="Ville ou province"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>
                    </div>
                </section>

                <!-- SECTION 2: ÉTAT CIVIL & FAMILLE -->
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
                        <!-- État Civil -->
                        <div class="flex flex-col gap-1.5">
                            <label for="etat_civil" class="text-xs font-bold text-slate-500 uppercase tracking-wider">État Civil</label>
                            <select
                                id="etat_civil"
                                name="etat_civil"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="">Sélectionner</option>
                                <option value="Célibataire" {{ old('etat_civil') === 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                                <option value="Marié" {{ old('etat_civil') === 'Marié' ? 'selected' : '' }}>Marié(e)</option>
                                <option value="Divorcé" {{ old('etat_civil') === 'Divorcé' ? 'selected' : '' }}>Divorcé(e)</option>
                                <option value="Veuf" {{ old('etat_civil') === 'Veuf' ? 'selected' : '' }}>Veuf/Veuve</option>
                            </select>
                        </div>

                        <!-- Nombre d'enfants -->
                        <div class="flex flex-col gap-1.5">
                            <label for="nbre_enfant" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nombre d'enfants</label>
                            <input
                                id="nbre_enfant"
                                name="nbre_enfant"
                                type="number"
                                value="{{ old('nbre_enfant', 0) }}"
                                min="0"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>
                    </div>
                </section>

                <!-- SECTION 3: CONTACT & LOCALISATION -->
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
                        <!-- Téléphone -->
                        <div class="flex flex-col gap-1.5">
                            <label for="telephone" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Téléphone</label>
                            <input
                                id="telephone"
                                name="telephone"
                                type="tel"
                                value="{{ old('telephone') }}"
                                placeholder="+243 ..."
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col gap-1.5">
                            <label for="email" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Email Professionnel</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                placeholder="nom.prenom@entreprise.com"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Adresse -->
                        <div class="flex flex-col gap-1.5 md:col-span-2">
                            <label for="adresse" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Adresse complète</label>
                            <textarea
                                id="adresse"
                                name="adresse"
                                rows="2"
                                placeholder="N°, Avenue, Quartier, Commune, Ville"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary">{{ old('adresse') }}</textarea>
                        </div>

                        <!-- Province -->
                        <div class="flex flex-col gap-1.5">
                            <label for="province" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Province</label>
                            <input
                                id="province"
                                name="province"
                                type="text"
                                value="{{ old('province') }}"
                                placeholder="Province"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Ville -->
                        <div class="flex flex-col gap-1.5">
                            <label for="ville" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Ville</label>
                            <input
                                id="ville"
                                name="ville"
                                type="text"
                                value="{{ old('ville') }}"
                                placeholder="Ville"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>
                    </div>
                </section>

                <!-- SECTION 4: ÉTUDES & FORMATION -->
                <section
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                    <div
                        class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                        <h3 class="text-sm font-bold text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">school</span>
                            4. ÉTUDES & FORMATION
                        </h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Niveau d'étude -->
                        <div class="flex flex-col gap-1.5">
                            <label for="niveau_etude" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Niveau d'étude</label>
                            <input
                                id="niveau_etude"
                                name="niveau_etude"
                                type="text"
                                value="{{ old('niveau_etude') }}"
                                placeholder="Ex: BAC, Licencié, Master"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Domaine d'étude -->
                        <div class="flex flex-col gap-1.5">
                            <label for="domaine_etude" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Domaine d'étude</label>
                            <input
                                id="domaine_etude"
                                name="domaine_etude"
                                type="text"
                                value="{{ old('domaine_etude') }}"
                                placeholder="Ex: Informatique, Droit, Sciences"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Année d'obtention -->
                        <div class="flex flex-col gap-1.5">
                            <label for="annee_obtention" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Année d'obtention</label>
                            <input
                                id="annee_obtention"
                                name="annee_obtention"
                                type="text"
                                value="{{ old('annee_obtention') }}"
                                placeholder="2020"
                                maxlength="4"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Institution -->
                        <div class="flex flex-col gap-1.5">
                            <label for="nom_institution" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nom de l'institution</label>
                            <input
                                id="nom_institution"
                                name="nom_institution"
                                type="text"
                                value="{{ old('nom_institution') }}"
                                placeholder="Université ou École"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Pays d'étude -->
                        <div class="flex flex-col gap-1.5 md:col-span-2">
                            <label for="pays_etude" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pays d'étude</label>
                            <input
                                id="pays_etude"
                                name="pays_etude"
                                type="text"
                                value="{{ old('pays_etude') }}"
                                placeholder="Pays"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>
                    </div>
                </section>

                <!-- SECTION 5: STRUCTURE ORGANISATIONNELLE -->
                <section
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                    <div
                        class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                        <h3 class="text-sm font-bold text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">domain</span>
                            5. STRUCTURE ORGANISATIONNELLE
                        </h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Bureau -->
                        <div class="flex flex-col gap-1.5">
                            <label for="bureau_id" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Bureau <span class="text-red-500">*</span></label>
                            <select
                                id="bureau_id"
                                name="bureau_id"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary @error('bureau_id') border-red-500 @enderror"
                                required>
                                <option value="">Sélectionner un bureau</option>
                                @foreach($bureaus as $bureau)
                                    <option value="{{ $bureau->id }}" {{ old('bureau_id') == $bureau->id ? 'selected' : '' }}>
                                        {{ $bureau->nom }} @if($bureau->division) - {{ $bureau->division->nom }} @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('bureau_id')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Département -->
                        <div class="flex flex-col gap-1.5">
                            <label for="departement" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Département</label>
                            <input
                                id="departement"
                                name="departement"
                                type="text"
                                value="{{ old('departement') }}"
                                placeholder="Département"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Coordination -->
                        <div class="flex flex-col gap-1.5">
                            <label for="coordination" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Coordination</label>
                            <input
                                id="coordination"
                                name="coordination"
                                type="text"
                                value="{{ old('coordination') }}"
                                placeholder="Coordination"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Unité -->
                        <div class="flex flex-col gap-1.5">
                            <label for="unite" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Unité</label>
                            <input
                                id="unite"
                                name="unite"
                                type="text"
                                value="{{ old('unite') }}"
                                placeholder="Unité"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>
                    </div>
                </section>

                <!-- SECTION 6: POSTE & CARRIÈRE -->
                <section
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                    <div
                        class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                        <h3 class="text-sm font-bold text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">work</span>
                            6. POSTE & CARRIÈRE
                        </h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Catégorie/Grade -->
                        <div class="flex flex-col gap-1.5">
                            <label for="categorie_grade" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Catégorie/Grade</label>
                            <select
                                id="categorie_grade"
                                name="categorie_grade"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="">Sélectionner un grade</option>
                                <option value="Directeur" {{ old('categorie_grade') === 'Directeur' ? 'selected' : '' }}>Directeur</option>
                                <option value="Chef de Division" {{ old('categorie_grade') === 'Chef de Division' ? 'selected' : '' }}>Chef de Division</option>
                                <option value="Chef de Bureau" {{ old('categorie_grade') === 'Chef de Bureau' ? 'selected' : '' }}>Chef de Bureau</option>
                                <option value="Attaché d'Administration" {{ old('categorie_grade') === 'Attaché d\'Administration' ? 'selected' : '' }}>Attaché d'Administration</option>
                                <option value="Agent de Collaboration" {{ old('categorie_grade') === 'Agent de Collaboration' ? 'selected' : '' }}>Agent de Collaboration</option>
                            </select>
                        </div>

                        <!-- Position -->
                        <div class="flex flex-col gap-1.5">
                            <label for="position" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Position</label>
                            <input
                                id="position"
                                name="position"
                                type="text"
                                value="{{ old('position') }}"
                                placeholder="Position"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Date d'embauche -->
                        <div class="flex flex-col gap-1.5">
                            <label for="date_embauche" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Date d'embauche</label>
                            <input
                                id="date_embauche"
                                name="date_embauche"
                                type="date"
                                value="{{ old('date_embauche') }}"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Rémunération -->
                        <div class="flex flex-col gap-1.5">
                            <label for="remuneration" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Rémunération (CDF/USD)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 font-medium text-sm">$</span>
                                <input
                                    id="remuneration"
                                    name="remuneration"
                                    type="number"
                                    value="{{ old('remuneration') }}"
                                    step="0.01"
                                    min="0"
                                    placeholder="0.00"
                                    class="w-full pl-7 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                            </div>
                        </div>

                        <!-- Commission/Affectation -->
                        <div class="flex flex-col gap-1.5">
                            <label for="commission_affectation" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Commission/Affectation</label>
                            <input
                                id="commission_affectation"
                                name="commission_affectation"
                                type="text"
                                value="{{ old('commission_affectation') }}"
                                placeholder="Commission d'affectation"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Arrête -->
                        <div class="flex flex-col gap-1.5">
                            <label for="arrete" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Arrête</label>
                            <input
                                id="arrete"
                                name="arrete"
                                type="text"
                                value="{{ old('arrete') }}"
                                placeholder="Numéro d'arrête"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Nature d'acte -->
                        <div class="flex flex-col gap-1.5">
                            <label for="nature_acte" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nature d'acte</label>
                            <input
                                id="nature_acte"
                                name="nature_acte"
                                type="text"
                                value="{{ old('nature_acte') }}"
                                placeholder="Nature d'acte"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Statut -->
                        <div class="flex flex-col gap-1.5 md:col-span-2">
                            <label for="status" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Statut</label>
                            <select
                                id="status"
                                name="status"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="">Sélectionner un statut</option>
                                <option value="Actif" {{ old('status') === 'Actif' ? 'selected' : '' }}>Actif</option>
                                <option value="Non_actif" {{ old('status') === 'Non_actif' ? 'selected' : '' }}>Non actif</option>
                                <option value="Déserteur" {{ old('status') === 'Déserteur' ? 'selected' : '' }}>Déserteur</option>
                                <option value="Décédé" {{ old('status') === 'Décédé' ? 'selected' : '' }}>Décédé</option>
                            </select>
                        </div>
                    </div>
                </section>

                <!-- SECTION 7: DOCUMENTS -->
                <section
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden mb-12">
                    <div
                        class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                        <h3 class="text-sm font-bold text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">attach_file</span>
                            7. DOCUMENTS
                        </h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Diplôme -->
                        <div class="flex flex-col gap-1.5">
                            <label for="doc_diplome" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Diplôme</label>
                            <input
                                id="doc_diplome"
                                name="doc_diplome"
                                type="file"
                                accept=".pdf,.jpg,.png"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary file:mr-3 file:py-2 file:px-3 file:rounded file:border-0 file:bg-primary file:text-white" />
                            <p class="text-xs text-slate-500">PDF, JPG ou PNG (max 2MB)</p>
                        </div>

                        <!-- Référence Diplôme -->
                        <div class="flex flex-col gap-1.5">
                            <label for="ref_diplome" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Référence Diplôme</label>
                            <input
                                id="ref_diplome"
                                name="ref_diplome"
                                type="text"
                                value="{{ old('ref_diplome') }}"
                                placeholder="Référence du diplôme"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Carte Biométrique -->
                        <div class="flex flex-col gap-1.5">
                            <label for="doc_biometrie" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Carte Biométrique</label>
                            <input
                                id="doc_biometrie"
                                name="doc_biometrie"
                                type="file"
                                accept=".pdf,.jpg,.png"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary file:mr-3 file:py-2 file:px-3 file:rounded file:border-0 file:bg-primary file:text-white" />
                            <p class="text-xs text-slate-500">PDF, JPG ou PNG (max 2MB)</p>
                        </div>

                        <!-- Référence Biométrie -->
                        <div class="flex flex-col gap-1.5">
                            <label for="ref_biometrie" class="text-xs font-bold text-slate-500 uppercase tracking-wider">ID Biométrique</label>
                            <input
                                id="ref_biometrie"
                                name="ref_biometrie"
                                type="text"
                                value="{{ old('ref_biometrie') }}"
                                placeholder="ID-XXXX-XXXX"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>

                        <!-- Acte d'Affectation -->
                        <div class="flex flex-col gap-1.5">
                            <label for="doc_affectation" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Acte d'Affectation</label>
                            <input
                                id="doc_affectation"
                                name="doc_affectation"
                                type="file"
                                accept=".pdf,.jpg,.png"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary file:mr-3 file:py-2 file:px-3 file:rounded file:border-0 file:bg-primary file:text-white" />
                            <p class="text-xs text-slate-500">PDF, JPG ou PNG (max 2MB)</p>
                        </div>

                        <!-- Référence Affectation -->
                        <div class="flex flex-col gap-1.5">
                            <label for="ref_affectation" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Référence Affectation</label>
                            <input
                                id="ref_affectation"
                                name="ref_affectation"
                                type="text"
                                value="{{ old('ref_affectation') }}"
                                placeholder="Référence de l'acte"
                                class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary focus:border-primary" />
                        </div>
                    </div>
                </section>

                <div class="h-20"></div>
            </form>
        </div>
    </div>
</x-app-layout>
