<x-app-layout>

    <div class="min-h-screen bg-slate-50 dark:bg-black font-sans text-slate-900 dark:text-slate-100 p-6 lg:p-10">
        <div class="max-w-6xl mx-auto">

            {{-- HEADER --}}
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/20">
                        <span class="material-symbols-outlined text-white text-3xl">person_add</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black tracking-tighter uppercase italic">FluxRh <span
                                class="text-blue-600">/</span> Enregistrement Agent</h2>
                        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-1">Dossier complet
                            du personnel</p>
                    </div>
                </div>
                <a href="{{ route('agents.index') }}"
                    class="px-6 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition-all flex items-center gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Retour
                </a>
            </div>
            @if (session('success'))
                <div id="alert-success"
                    class="flex items-center p-4 mb-4 text-green-800 border border-green-300 rounded-2xl bg-green-50 dark:bg-slate-900 dark:text-green-400 dark:border-green-800 transition-all duration-300"
                    role="alert">
                    <span class="material-symbols-outlined mr-2">check_circle</span>
                    <div class="text-sm font-medium flex-1">
                        <span class="font-bold">Succès !</span> {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-transparent text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:hover:bg-slate-800 inline-flex items-center justify-center h-8 w-8 transition-colors"
                        onclick="this.parentElement.remove()" aria-label="Close">
                        <span class="material-symbols-outlined text-sm">close</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div id="alert-error"
                    class="flex items-center p-4 mb-4 text-red-800 border border-red-300 rounded-2xl bg-red-50 dark:bg-slate-900 dark:text-red-400 dark:border-red-800 transition-all duration-300"
                    role="alert">
                    <span class="material-symbols-outlined mr-2">info</span>
                    <div class="text-sm font-medium flex-1">
                        <span class="font-bold">Attention :</span> {{ session('error') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-transparent text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 dark:hover:bg-slate-800 inline-flex items-center justify-center h-8 w-8 transition-colors"
                        onclick="this.parentElement.remove()" aria-label="Close">
                        <span class="material-symbols-outlined text-sm">close</span>
                    </button>
                </div>
            @endif
            <div
                class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden">
                <form action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-8 lg:p-12 space-y-12">
                    @csrf

                    {{-- SECTION 1 : IDENTITÉ & ÉTAT-CIVIL --}}
                    <section>
                        <div
                            class="flex items-center mb-8 text-blue-600 dark:text-blue-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">01.</span> Identité & État-Civil
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="md:col-span-1">
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Matricule
                                    *</label>
                                <input type="text" name="matricule" value="{{ old('matricule') }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner"
                                    required>
                            </div>
                            <div class="md:col-span-1">
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Catégorie
                                    Grade</label>
                                <input type="text" name="categorie_grade" value="{{ old('categorie_grade') }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div class="md:col-span-2">
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Nom
                                    *</label>
                                <input type="text" name="nom" value="{{ old('nom') }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner"
                                    required>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Prénom
                                    *</label>
                                <input type="text" name="prenom" value="{{ old('prenom') }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner"
                                    required>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Postnom</label>
                                <input type="text" name="postnom" value="{{ old('postnom') }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Genre</label>
                                <select name="genre"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">État
                                    Civil</label>
                                <select name="etat_civil"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Marié">Marié</option>
                                    <option value="Veuf">Veuf</option>
                                    <option value="Divorcé">Divorcé</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Date
                                    de Naissance</label>
                                <input type="date" name="date_naissance"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Lieu
                                    de Naissance</label>
                                <input type="text" name="lieu_naissance"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Nbre
                                    d'enfants</label>
                                <input type="number" name="nbre_enfant" value="{{ old('nbre_enfant', 0) }}"
                                    min="0" step="1"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                        </div>
                    </section>

                    {{-- SECTION 2 : CONTACT & LOCALISATION --}}
                    <section>
                        <div
                            class="flex items-center mb-8 text-green-600 dark:text-green-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">02.</span> Contact & Localisation
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Téléphone</label>
                                <input type="tel" name="telephone"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Email
                                    Professionnel</label>
                                <input type="email" name="email"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Pays</label>
                                <input type="text" name="pays" value="RDC"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Province</label>
                                <input type="text" name="province"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Ville</label>
                                <input type="text" name="ville"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div class="md:col-span-3">
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Adresse
                                    Résidentielle</label>
                                <textarea name="adresse" rows="2"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner"></textarea>
                            </div>
                        </div>
                    </section>

                    {{-- SECTION 3 : ÉTUDES & DIPLÔMES --}}
                    <section>
                        <div
                            class="flex items-center mb-8 text-purple-600 dark:text-purple-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">03.</span> Études & Formation
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Niveau
                                    d'étude</label>
                                <input type="text" name="niveau_etude" placeholder="Ex: Licence"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Domaine
                                    d'étude</label>
                                <input type="text" name="domaine_etude" placeholder="Ex: Informatique"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Institution</label>
                                <input type="text" name="nom_institution"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Année
                                    d'obtention</label>
                                <input type="text" name="annee_obtention" placeholder="YYYY"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                        </div>

                        <div
                            class="p-6 bg-slate-50 dark:bg-slate-800/50 rounded-3xl border-2 border-dashed border-slate-200 dark:border-slate-700">
                            <label
                                class="block mb-4 text-[10px] font-black uppercase text-purple-600 tracking-wider italic">Upload
                                Documents (Diplômes, Certificats, Attestations)</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <input type="file" name="documents_etude"
                                    class="text-[10px] text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-purple-600 file:text-white">
                                <input type="text" name="ref_document" placeholder="Référence Document"
                                    class="text-[10px] p-2 rounded-lg border-none bg-white dark:bg-slate-900 shadow-sm">
                                <input type="date" name="date_obtention"
                                    class="text-[10px] p-2 rounded-lg border-none bg-white dark:bg-slate-900 shadow-sm">
                            </div>
                        </div>
                    </section>

                    {{-- SECTION 4 : AFFECTATION & CARRIÈRE --}}
                    <section>
                        <div
                            class="flex items-center mb-8 text-amber-600 dark:text-amber-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">04.</span> Structure & Affectation
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Département</label>
                                <input type="text" name="departement"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Division</label>
                                <select name="division_id"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner cursor-pointer"
                                    required>
                                    <option value="" disabled selected>Choisir une division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">
                                            {{ $division->nom ?? ($division->name ?? ($division->intitule ?? $division->libelle)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Coordination</label>
                                <input type="text" name="coordination"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Bureau
                                    *</label>
                                <select name="bureau_id"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner cursor-pointer"
                                    required>
                                    <option value="" disabled selected>Choisir un bureau</option>
                                    @foreach ($bureaux as $bureau)
                                        <option value="{{ $bureau->id }}">
                                            {{ $bureau->nom ?? ($bureau->name ?? ($bureau->intitule ?? $bureau->libelle)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Unité</label>
                                <input type="text" name="unite"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Position
                                    / Fonction</label>
                                <input type="text" name="position"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Commission
                                    d'affectation</label>
                                <input type="text" name="commission"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Date
                                    d'embauche</label>
                                <input type="date" name="date_embauche"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                        </div>
                    </section>

                    {{-- SECTION 5 : ACTES & RÉMUNÉRATION --}}
                    <section>
                        <div
                            class="flex items-center mb-8 text-rose-600 dark:text-rose-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">05.</span> Actes Administratifs & Finances
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Nature
                                    de l'acte</label>
                                <input type="text" name="nature_acte" placeholder="Ex: Décision, Décret"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Numéro
                                    Arrêté</label>
                                <input type="text" name="arrete"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Rémunération
                                    ($)</label>
                                <input type="number" min="0" step="1" name="remuneration"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner font-black text-rose-600">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider italic">Carte
                                    Biométrique (Scan)</label>
                                <input type="file" name="carte_biometrique" accept=".pdf,.jpg,.jpeg,.png"
                                    class="text-[10px] text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-rose-600 file:text-white">
                            </div>
                        </div>
                    </section>

                    {{-- BOUTONS --}}
                    <div
                        class="pt-12 border-t border-slate-100 dark:border-slate-800 flex flex-col md:flex-row justify-end gap-4">
                        <button type="reset"
                            class="px-8 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-all">
                            Vider les champs
                        </button>
                        <button type="submit"
                            class="px-12 py-4 bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-blue-600/30 hover:scale-105 active:scale-95 transition-all">
                            Enregistrer le dossier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
