<x-app-layout>
    <div class="min-h-screen bg-slate-50/50 dark:bg-slate-900 font-sans text-slate-900 dark:text-slate-100 p-4 md:p-8">
        <div class="max-w-5xl mx-auto">

            <div class="flex flex-col md:flex-row items-center justify-between mb-10 gap-6">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 bg-blue-600 rounded-[1.2rem] flex items-center justify-center shadow-xl shadow-blue-500/20">
                        <span class="material-symbols-outlined text-white text-3xl">edit_square</span>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-black tracking-tighter uppercase italic leading-none">
                            FluxRh <span class="text-blue-600">/</span> <span class="text-slate-500 uppercase tracking-widest text-lg">Edition</span>
                        </h2>
                        <p class="text-slate-400 text-[9px] font-black uppercase tracking-[0.2em] mt-2 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            Dossier Agent : {{ $agent->nom }} {{ $agent->prenom }}
                        </p>
                    </div>
                </div>
                
                <a href="{{ route('agents.index') }}"
                    class="px-6 py-3 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-900 hover:text-white transition-all flex items-center gap-3 shadow-sm group">
                    <span class="material-symbols-outlined text-sm transition-transform group-hover:-translate-x-1">arrow_back</span> 
                    Retour à la liste
                </a>
            </div>

            {{-- FORMULAIRE CARD --}}
            <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden">
                <form action="{{ route('agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-12 space-y-10">
                    @csrf
                    @method('PUT')

                    <section>
                        <div class="flex items-center mb-8 text-blue-600 dark:text-blue-400 font-black text-[10px] uppercase tracking-[0.3em]">
                            <span class="mr-3 italic text-base">01.</span> Informations Identité
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-700 ml-6"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                            <div class="md:col-span-1">
                                <label class="block mb-2 text-[9px] font-black uppercase text-slate-400 tracking-widest">Matricule</label>
                                <input type="text" name="matricule" value="{{ old('matricule', $agent->matricule) }}"
                                    class="bg-slate-50 dark:bg-slate-900 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 transition-all" required>
                            </div>
                            <div class="md:col-span-1">
                                <label class="block mb-2 text-[9px] font-black uppercase text-slate-400 tracking-widest">Catégorie Grade</label>
                                <input type="text" name="categorie_grade" value="{{ old('categorie_grade', $agent->categorie_grade) }}"
                                    class="bg-slate-50 dark:bg-slate-900 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 transition-all">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-[9px] font-black uppercase text-slate-400 tracking-widest">Nom de famille</label>
                                <input type="text" name="nom" value="{{ old('nom', $agent->nom) }}"
                                    class="bg-slate-50 dark:bg-slate-900 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 transition-all" required>
                            </div>
                            
                            <div>
                                <label class="block mb-2 text-[9px] font-black uppercase text-slate-400 tracking-widest">Prénom</label>
                                <input type="text" name="prenom" value="{{ old('prenom', $agent->prenom) }}"
                                    class="bg-slate-50 dark:bg-slate-900 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 transition-all" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-[9px] font-black uppercase text-slate-400 tracking-widest">Postnom</label>
                                <input type="text" name="postnom" value="{{ old('postnom', $agent->postnom) }}"
                                    class="bg-slate-50 dark:bg-slate-900 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 transition-all">
                            </div>
                            <div>
                                <label class="block mb-2 text-[9px] font-black uppercase text-slate-400 tracking-widest">Genre</label>
                                <select name="genre" class="bg-slate-50 dark:bg-slate-900 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 transition-all">
                                    <option value="M" {{ old('genre', $agent->genre) == 'M' ? 'selected' : '' }}>Masculin</option>
                                    <option value="F" {{ old('genre', $agent->genre) == 'F' ? 'selected' : '' }}>Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-[9px] font-black uppercase text-slate-400 tracking-widest">État Civil</label>
                                <select name="etat_civil" class="bg-slate-50 dark:bg-slate-900 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 transition-all">
                                    @foreach (['Célibataire', 'Marié', 'Veuf', 'Divorcé'] as $etat)
                                        <option value="{{ $etat }}" {{ old('etat_civil', $agent->etat_civil) == $etat ? 'selected' : '' }}>{{ $etat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="flex items-center mb-8 text-indigo-600 dark:text-indigo-400 font-black text-[10px] uppercase tracking-[0.3em]">
                            <span class="mr-3 italic text-base">02.</span> Structure & Affectation
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-700 ml-6"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="p-6 bg-slate-50/50 dark:bg-slate-900/40 rounded-3xl border border-slate-100 dark:border-slate-700">
                                <label class="block mb-3 text-[9px] font-black uppercase text-slate-400 tracking-widest">Division d'affectation</label>
                                <select name="division_id" class="bg-white dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 shadow-sm cursor-pointer" required>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" {{ old('division_id', $agent->division_id) == $division->id ? 'selected' : '' }}>{{ $division->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="p-6 bg-slate-50/50 dark:bg-slate-900/40 rounded-3xl border border-slate-100 dark:border-slate-700">
                                <label class="block mb-3 text-[9px] font-black uppercase text-slate-400 tracking-widest">Bureau de rattachement</label>
                                <select name="bureau_id" class="bg-white dark:bg-slate-800 border-none text-sm font-bold rounded-xl w-full p-4 focus:ring-2 focus:ring-blue-600 shadow-sm cursor-pointer" required>
                                    @foreach ($bureaux as $bureau)
                                        <option value="{{ $bureau->id }}" {{ old('bureau_id', $agent->bureau_id) == $bureau->id ? 'selected' : '' }}>{{ $bureau->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>

                    {{-- ACTIONS --}}
                    <div class="pt-10 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-end items-center gap-6">
                        <p class="text-[10px] font-bold text-slate-400 uppercase italic">Vérifiez les données avant de valider l'enregistrement</p>
                        <button type="submit"
                            class="w-full md:w-auto px-10 py-5 bg-slate-900 dark:bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-blue-600 dark:hover:bg-blue-500 hover:scale-[1.02] active:scale-95 transition-all">
                            Mettre à jour le profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>