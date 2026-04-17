<x-app-layout>
    <div class="min-h-screen bg-[#f8fafc] dark:bg-black font-sans text-slate-900 dark:text-slate-100 pb-20">

        <div class="sticky top-0 z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ route('agents.index') }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full transition-colors text-slate-500">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </a>
                    <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 mx-2"></div>
                    <h2 class="text-sm font-black uppercase tracking-[0.2em] italic text-blue-600">Dossier Numérique <span class="text-slate-400">#{{ $agent->matricule }}</span></h2>
                </div>
                
                <div class="flex items-center gap-3">
                    <button class="hidden md:flex items-center gap-2 px-4 py-2 text-[10px] font-black uppercase tracking-widest text-slate-600 dark:text-slate-400 hover:text-blue-600 transition-colors">
                        <span class="material-symbols-outlined text-sm">print</span> Imprimer
                    </button>
                    <a href="{{ route('agents.edit', $agent->id) }}" class="px-6 py-2.5 bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest rounded-xl shadow-lg shadow-blue-500/30 hover:scale-105 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">edit</span> Éditer le profil
                    </a>
                </div>
            </div>
        </div>

        <main class="max-w-7xl mx-auto mt-8 px-6">
            <div class="grid grid-cols-12 gap-8">
                
                <div class="col-span-12 lg:col-span-4 space-y-6">
                    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-8 border border-slate-200 dark:border-slate-800 shadow-sm relative overflow-hidden">
                        {{-- Badge Statut --}}
                        <div class="absolute top-6 right-6">
                            <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/10 text-emerald-600 text-[8px] font-black uppercase rounded-lg border border-emerald-200 dark:border-emerald-500/20">
                                {{ $agent->status }}
                            </span>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 bg-slate-50 dark:bg-slate-800 rounded-3xl flex items-center justify-center mb-6 shadow-inner border border-slate-100 dark:border-slate-700">
                                <span class="material-symbols-outlined text-6xl text-slate-300 dark:text-slate-600">person_filled</span>
                            </div>
                            <h3 class="text-2xl font-black uppercase italic tracking-tighter text-center leading-tight">
                                {{ $agent->nom }}<br>
                                <span class="text-blue-600">{{ $agent->postnom }}</span> {{ $agent->prenom }}
                            </h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em] mt-4 italic">{{ $agent->categorie_grade }}</p>
                        </div>

                        <div class="mt-8 space-y-3">
                            <div class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-100 dark:border-slate-700">
                                <span class="text-[9px] font-black uppercase text-slate-400">Complétude Dossier</span>
                                <span class="text-[10px] font-black text-blue-600">85%</span>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-800 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-blue-600 h-full" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-600 rounded-[2rem] p-8 text-white shadow-xl shadow-blue-500/20">
                        <h4 class="text-[10px] font-black uppercase tracking-widest mb-6 opacity-80">Contact direct</h4>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <span class="material-symbols-outlined opacity-60">smartphone</span>
                                <p class="text-sm font-bold">{{ $agent->telephone }}</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="material-symbols-outlined opacity-60">mail</span>
                                <p class="text-sm font-bold truncate">{{ $agent->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-8 space-y-8">
                    
                    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-10 border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-center gap-4 mb-10 text-slate-400">
                            <span class="text-lg italic font-black text-blue-600">01</span>
                            <h4 class="text-[10px] font-black uppercase tracking-[0.4em]">Structure & Affectation</h4>
                            <div class="h-px flex-1 bg-slate-100 dark:bg-slate-800"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div class="relative pl-8 border-l-2 border-blue-600">
                                <div class="absolute -left-[9px] top-0 w-4 h-4 bg-blue-600 rounded-full border-4 border-white dark:border-slate-900"></div>
                                <label class="text-[9px] font-black uppercase text-slate-400 tracking-widest">Division Actuelle</label>
                                <p class="text-lg font-black uppercase italic mt-1 text-slate-800 dark:text-slate-100">{{ $agent->division->nom ?? 'Direction Générale' }}</p>
                            </div>

                            <div class="relative pl-8 border-l-2 border-slate-200 dark:border-slate-700">
                                <div class="absolute -left-[9px] top-0 w-4 h-4 bg-slate-200 dark:bg-slate-700 rounded-full border-4 border-white dark:border-slate-900"></div>
                                <label class="text-[9px] font-black uppercase text-slate-400 tracking-widest">Bureau / Service</label>
                                <p class="text-lg font-black uppercase italic mt-1 text-slate-800 dark:text-slate-100">{{ $agent->bureau->nom ?? 'Non affecté' }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6 mt-12 pt-10 border-t border-slate-50 dark:border-slate-800/50">
                            <div>
                                <label class="text-[8px] font-black uppercase text-slate-400 block mb-1">Ville / Province</label>
                                <span class="text-xs font-bold uppercase">{{ $agent->ville }} / {{ $agent->province }}</span>
                            </div>
                            <div>
                                <label class="text-[8px] font-black uppercase text-slate-400 block mb-1">Coordination</label>
                                <span class="text-xs font-bold uppercase">{{ $agent->coordination ?? 'N/A' }}</span>
                            </div>
                            <div>
                                <label class="text-[8px] font-black uppercase text-slate-400 block mb-1">Unité</label>
                                <span class="text-xs font-bold uppercase">{{ $agent->unite ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-200 dark:border-slate-800 shadow-sm">
                            <h4 class="text-[10px] font-black uppercase tracking-widest mb-6 text-blue-600">Informations Personnelles</h4>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] text-slate-400 font-bold uppercase">Né(e) le</span>
                                    <span class="text-xs font-black">{{ $agent->date_naissance->format('d M Y') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] text-slate-400 font-bold uppercase">À</span>
                                    <span class="text-xs font-black uppercase">{{ $agent->lieu_naissance }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] text-slate-400 font-bold uppercase">État Civil</span>
                                    <span class="text-xs font-black uppercase">{{ $agent->etat_civil }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] text-slate-400 font-bold uppercase">Enfants</span>
                                    <span class="text-xs font-black">{{ $agent->nbre_enfant }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-200 dark:border-slate-800 shadow-sm">
                            <h4 class="text-[10px] font-black uppercase tracking-widest mb-6 text-indigo-500">Études & Diplômes</h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-[8px] text-slate-400 font-bold uppercase">Niveau d'étude</label>
                                    <p class="text-xs font-black uppercase">{{ $agent->niveau_etude }}</p>
                                </div>
                                <div>
                                    <label class="text-[8px] text-slate-400 font-bold uppercase">Domaine</label>
                                    <p class="text-xs font-black uppercase text-indigo-600">{{ $agent->domaine_etude }}</p>
                                </div>
                                <div>
                                    <label class="text-[8px] text-slate-400 font-bold uppercase">Institution</label>
                                    <p class="text-xs font-bold uppercase italic">{{ $agent->nom_institution }} ({{ $agent->annee_obtention }})</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-10 opacity-10">
                            <span class="material-symbols-outlined text-[120px]">folder_zip</span>
                        </div>

                        <div class="relative z-10">
                            <h4 class="text-[10px] font-black uppercase tracking-[0.4em] mb-10 text-slate-400">03. Archives Numérisées</h4>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach (['Diplôme' => 'Diplôme/Étude', 'Carte Bio' => 'Carte Biométrique', 'Acte' => 'Acte d\'affectation'] as $label => $dbType)
                                    @php $doc = $agent->documents->where('type', $dbType)->first(); @endphp
                                    <div class="flex items-center justify-between p-4 bg-white/5 border border-white/10 rounded-2xl hover:bg-white/10 transition-colors">
                                        <div class="flex items-center gap-3">
                                            <span class="material-symbols-outlined text-{{ $doc ? 'blue-400' : 'slate-600' }}">
                                                {{ $doc ? 'check_circle' : 'error_outline' }}
                                            </span>
                                            <span class="text-[10px] font-black uppercase tracking-widest">{{ $label }}</span>
                                        </div>
                                        @if($doc)
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="w-8 h-8 flex items-center justify-center bg-blue-600 rounded-lg hover:scale-110 transition-transform">
                                                <span class="material-symbols-outlined text-sm">visibility</span>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</x-app-layout>