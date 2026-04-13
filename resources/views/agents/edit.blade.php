<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-black font-sans text-slate-900 dark:text-slate-100 p-6 lg:p-10">
        <div class="max-w-6xl mx-auto">

            {{-- HEADER --}}
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/20">
                        <span class="material-symbols-outlined text-white text-3xl">edit_note</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black tracking-tighter uppercase italic">FluxRh <span
                                class="text-amber-500">/</span> Modification Agent</h2>
                        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-1">Mise à jour du
                            dossier : {{ $agent->nom }} {{ $agent->prenom }}</p>
                    </div>
                </div>
                <a href="{{ route('agents.index') }}"
                    class="px-6 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition-all flex items-center gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Annuler
                </a>
            </div>

            <div
                class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden">
                <form action="{{ route('agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data"
                    class="p-8 lg:p-12 space-y-12">
                    @csrf
                    @method('PUT') {{-- INDISPENSABLE POUR LA MODIFICATION --}}

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
                                <input type="text" name="matricule" value="{{ old('matricule', $agent->matricule) }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner"
                                    required>
                            </div>
                            <div class="md:col-span-1">
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Catégorie
                                    Grade</label>
                                <input type="text" name="categorie_grade"
                                    value="{{ old('categorie_grade', $agent->categorie_grade) }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div class="md:col-span-2">
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Nom
                                    *</label>
                                <input type="text" name="nom" value="{{ old('nom', $agent->nom) }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner"
                                    required>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Prénom
                                    *</label>
                                <input type="text" name="prenom" value="{{ old('prenom', $agent->prenom) }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner"
                                    required>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Postnom</label>
                                <input type="text" name="postnom" value="{{ old('postnom', $agent->postnom) }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Genre</label>
                                <select name="genre"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                                    <option value="M" {{ old('genre', $agent->genre) == 'M' ? 'selected' : '' }}>
                                        Masculin</option>
                                    <option value="F" {{ old('genre', $agent->genre) == 'F' ? 'selected' : '' }}>
                                        Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">État
                                    Civil</label>
                                <select name="etat_civil"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                                    @foreach (['Célibataire', 'Marié', 'Veuf', 'Divorcé'] as $etat)
                                        <option value="{{ $etat }}"
                                            {{ old('etat_civil', $agent->etat_civil) == $etat ? 'selected' : '' }}>
                                            {{ $etat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Date
                                    de Naissance</label>
                                <input type="date" name="date_naissance"
                                    value="{{ old('date_naissance', $agent->date_naissance ? \Carbon\Carbon::parse($agent->date_naissance)->format('Y-m-d') : '') }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Lieu
                                    de Naissance</label>
                                <input type="text" name="lieu_naissance"
                                    value="{{ old('lieu_naissance', $agent->lieu_naissance) }}"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Nbre
                                    d'enfants</label>
                                <input type="number" name="nbre_enfant"
                                    value="{{ old('nbre_enfant', $agent->nbre_enfant) }}" min="0"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner">
                            </div>
                        </div>
                    </section>

                    {{-- SECTION 4 : STRUCTURE & AFFECTATION --}}
                    <section>
                        <div
                            class="flex items-center mb-8 text-amber-600 dark:text-amber-400 font-black text-[10px] uppercase tracking-[0.2em]">
                            <span class="mr-2 italic text-sm">04.</span> Structure & Affectation
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800 ml-4"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Division
                                    *</label>
                                <select name="division_id"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner cursor-pointer"
                                    required>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}"
                                            {{ old('division_id', $agent->division_id) == $division->id ? 'selected' : '' }}>
                                            {{ $division->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-[10px] font-black uppercase text-slate-500 tracking-wider">Bureau
                                    *</label>
                                <select name="bureau_id"
                                    class="bg-slate-50 dark:bg-slate-800 border-none text-sm rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-500 shadow-inner cursor-pointer"
                                    required>
                                    @foreach ($bureaux as $bureau)
                                        <option value="{{ $bureau->id }}"
                                            {{ old('bureau_id', $agent->bureau_id) == $bureau->id ? 'selected' : '' }}>
                                            {{ $bureau->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>

                    {{-- BOUTONS --}}
                    <div
                        class="pt-12 border-t border-slate-100 dark:border-slate-800 flex flex-col md:flex-row justify-end gap-4">
                        <button type="submit"
                            class="px-12 py-4 bg-amber-500 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-amber-500/30 hover:scale-105 active:scale-95 transition-all">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
