<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-black font-sans text-slate-900 dark:text-slate-100 p-6 lg:p-10">
        <div class="max-w-6xl mx-auto">

            <div class="flex items-center justify-between mb-10 pb-6 border-b border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/20">
                        <span class="material-symbols-outlined text-white text-3xl">person_add</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black tracking-tighter uppercase italic">FluxRh <span class="text-blue-600">/</span> Enregistrement Agent</h2>
                        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-1">Dossier complet du personnel</p>
                    </div>
                </div>
                <a href="{{ route('agents.index') }}" class="px-6 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition-colors flex items-center gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Retour
                </a>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden">
                <form action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data" class="p-8 lg:p-12 space-y-16">
                    @csrf

                    <section>
                        <div class="flex items-center mb-8 text-blue-600 dark:text-blue-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">01.</span> Identité & État-Civil
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="md:col-span-1">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Matricule *</label>
                                <input type="text" name="matricule" value="{{ old('matricule') }}" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner" required>
                            </div>
                            <div class="md:col-span-1">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Catégorie Grade</label>
                                <input type="text" name="categorie_grade" value="{{ old('categorie_grade') }}" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Nom *</label>
                                <input type="text" name="nom" value="{{ old('nom') }}" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Prénom *</label>
                                <input type="text" name="prenom" value="{{ old('prenom') }}" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Postnom</label>
                                <input type="text" name="postnom" value="{{ old('postnom') }}" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Genre</label>
                                <select name="genre" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner appearance-none">
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">État Civil</label>
                                <select name="etat_civil" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner appearance-none">
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Marié">Marié</option>
                                    <option value="Veuf">Veuf</option>
                                    <option value="Divorcé">Divorcé</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Date Naissance</label>
                                <input type="date" name="date_naissance" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Lieu de Naissance</label>
                                <input type="text" name="lieu_naissance" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Nbre d'enfants</label>
                                <input type="number" name="nbre_enfant" value="{{ old('nbre_enfant', 0) }}" min="0" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="flex items-center mb-8 text-green-600 dark:text-green-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">02.</span> Contact & Localisation
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Téléphone</label>
                                <input type="tel" name="telephone" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-green-500 shadow-inner">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Email Professionnel</label>
                                <input type="email" name="email" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-green-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Pays</label>
                                <input type="text" name="pays" value="RDC" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-green-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Province</label>
                                <input type="text" name="province" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-green-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Ville</label>
                                <input type="text" name="ville" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-green-500 shadow-inner">
                            </div>
                            <div class="md:col-span-3">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Adresse Résidentielle</label>
                                <textarea name="adresse" rows="2" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-green-500 shadow-inner"></textarea>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="flex items-center mb-8 text-purple-600 dark:text-purple-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">03.</span> Études & Formation
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Niveau d'étude</label>
                                <input type="text" name="niveau_etude" placeholder="Ex: Licence" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-purple-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Domaine</label>
                                <input type="text" name="domaine_etude" placeholder="Ex: Informatique" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-purple-500 shadow-inner">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Institution</label>
                                <input type="text" name="nom_institution" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-purple-500 shadow-inner">
                            </div>
                        </div>
                        <div class="p-6 bg-slate-50 dark:bg-slate-800/50 rounded-3xl border border-slate-200 dark:border-slate-700">
                            <label class="block mb-4 text-[10px] font-black uppercase text-purple-600 tracking-wider italic">Justificatifs Académiques</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <input type="file" name="documents_etude" class="text-[10px] text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-purple-600 file:text-white cursor-pointer">
                                <input type="text" name="ref_document" placeholder="Référence Document" class="bg-white dark:bg-slate-900 border-none text-xs rounded-xl p-3 focus:ring-1 focus:ring-purple-500 shadow-sm">
                                <input type="date" name="date_obtention" class="bg-white dark:bg-slate-900 border-none text-xs rounded-xl p-3 focus:ring-1 focus:ring-purple-500 shadow-sm">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="flex items-center mb-8 text-amber-600 dark:text-amber-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">04.</span> Structure & Affectation
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Division *</label>
                                <select name="division_id" required class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-amber-500 shadow-inner appearance-none">
                                    <option value="" disabled selected>Sélectionner...</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->nom ?? $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Bureau *</label>
                                <select name="bureau_id" required class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-amber-500 shadow-inner appearance-none">
                                    <option value="" disabled selected>Sélectionner...</option>
                                    @foreach ($bureaux as $bureau)
                                        <option value="{{ $bureau->id }}">{{ $bureau->nom ?? $bureau->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Fonction / Position</label>
                                <input type="text" name="position" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-amber-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Département</label>
                                <input type="text" name="departement" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-amber-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Date d'embauche</label>
                                <input type="date" name="date_embauche" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-amber-500 shadow-inner">
                            </div>
                            <div>
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Commission</label>
                                <input type="text" name="commission" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-amber-500 shadow-inner">
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="flex items-center mb-8 text-rose-600 dark:text-rose-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">05.</span> Actes Administratifs & Finances
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="md:col-span-1">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Rémunération ($)</label>
                                <input type="number" name="remuneration" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-black text-rose-600 rounded-xl w-full p-4 focus:ring-2 focus:ring-rose-500 shadow-inner">
                            </div>
                            <div class="md:col-span-1">
                                <label class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider ml-1">Numéro Arrêté</label>
                                <input type="text" name="arrete" class="bg-slate-50 dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-rose-500 shadow-inner">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-[10px] font-black uppercase text-rose-500 tracking-wider ml-1 italic">Carte Biométrique (Scan)</label>
                                <div class="bg-slate-50 dark:bg-slate-800 p-3 rounded-xl shadow-inner">
                                    <input type="file" name="carte_biometrique" accept=".pdf,.jpg,.jpeg,.png" class="text-[10px] text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-rose-600 file:text-white cursor-pointer w-full">
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="pt-12 border-t border-slate-100 dark:border-slate-800 flex flex-col md:flex-row justify-end items-center gap-6">
                        <button type="reset" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-red-500 transition-colors">
                            Vider le formulaire
                        </button>
                        <button type="submit" class="w-full md:w-auto px-16 py-5 bg-blue-600 text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-blue-600/30 hover:bg-blue-700 transition-colors">
                            Enregistrer l'agent
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>