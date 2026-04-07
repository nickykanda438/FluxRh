<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-black font-sans text-slate-900 dark:text-slate-100 pb-20">

        <header
            class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-30 shadow-sm">
            <div
                class="max-w-[1200px] mx-auto px-4 lg:px-8 py-6 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-6">
                    <a href="{{ route('agents.index') }}"
                        class="w-12 h-12 flex items-center justify-center rounded-2xl bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white transition-all">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </a>
                    <div>
                        <h2 class="text-3xl font-black tracking-tighter uppercase italic">Fiche Agent</h2>
                        <p class="text-[10px] font-black text-primary tracking-[0.3em] uppercase">ID:
                            {{ $agent->matricule }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="#"
                        class="px-6 py-3 bg-red-500 text-white text-xs font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-red-500/20 hover:bg-red-600 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                        Télécharger PDF
                    </a>
                    <a href="{{ route('agents.edit', $agent->id) }}"
                        class="px-6 py-3 bg-slate-900 dark:bg-white dark:text-black text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">edit</span>
                        Modifier
                    </a>
                </div>
            </div>
        </header>

        <main class="max-w-[1200px] mx-auto mt-12 px-4 lg:px-8 space-y-10">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div
                    class="lg:col-span-1 bg-white dark:bg-slate-900 rounded-[3rem] p-10 border border-slate-200 dark:border-slate-800 shadow-sm text-center">
                    <div class="w-32 h-32 bg-primary/10 rounded-[2.5rem] mx-auto flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-6xl text-primary">person</span>
                    </div>
                    <h3 class="text-2xl font-black uppercase tracking-tight leading-none">{{ $agent->nom }}
                        {{ $agent->postnom }}</h3>
                    <p class="text-sm font-bold text-slate-400 mt-2 italic">{{ $agent->prenom }}</p>

                    <div class="mt-8 pt-8 border-t border-slate-100 dark:border-slate-800 flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-black uppercase text-slate-400">Statut</span>
                            <span
                                class="px-4 py-1 rounded-full text-[9px] font-black bg-green-100 text-green-700 uppercase tracking-widest">
                                {{ $agent->status ?? 'ACTIF' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-black uppercase text-slate-400">Genre</span>
                            <span
                                class="text-xs font-black uppercase">{{ $agent->genre == 'M' ? 'Masculin' : 'Féminin' }}</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-8">
                    <div
                        class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-center gap-4 mb-8">
                            <h4 class="text-xs font-black uppercase text-primary tracking-[0.4em]">01. Carrière &
                                Affectation</h4>
                            <div class="h-[1px] flex-1 bg-primary/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400">Fonction Actuelle</label>
                                <p class="text-sm font-black uppercase mt-1">{{ $agent->fonction ?? 'Non définie' }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400">Bureau</label>
                                <p class="text-sm font-black uppercase mt-1">{{ $agent->bureau->nom ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400">Division /
                                    Direction</label>
                                <p class="text-sm font-black uppercase mt-1 text-slate-500">
                                    {{ $agent->bureau->division->nom ?? 'Direction Générale' }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400">Date d'engagement</label>
                                <p class="text-sm font-black uppercase mt-1">{{ $agent->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-center gap-4 mb-8">
                            <h4 class="text-xs font-black uppercase text-amber-500 tracking-[0.4em]">02. État Civil &
                                Contact</h4>
                            <div class="h-[1px] flex-1 bg-amber-500/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400">Téléphone</label>
                                <p class="text-sm font-black mt-1">{{ $agent->telephone }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400">Email</label>
                                <p class="text-sm font-black mt-1 lowercase">{{ $agent->email }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400">Enfants</label>
                                <p class="text-sm font-black mt-1">{{ $agent->nbre_enfant }} enfant(s)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="flex items-center gap-4 mb-10">
                    <h4 class="text-xs font-black uppercase text-slate-900 dark:text-white tracking-[0.4em]">03. Archive
                        Numérique</h4>
                    <div class="h-[1px] flex-1 bg-slate-100 dark:bg-slate-800"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                        // On définit la correspondance entre ton label et le 'type' stocké en base de données
                        $typesRecherches = [
                            'Diplôme' => 'Diplôme/Étude',
                            'Carte Bio' => 'Carte Biométrique',
                            'Acte' => 'Acte d\'affectation', // Ajuste selon tes types réels
                        ];
                    @endphp

                    @foreach ($typesRecherches as $label => $dbType)
                        @php
                            // On cherche si un document de ce type existe pour cet agent
                            $doc = $agent->documents->where('type', $dbType)->first();
                        @endphp

                        <div
                            class="p-6 bg-slate-50 dark:bg-slate-800/50 rounded-2xl flex items-center justify-between group">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-white dark:bg-slate-900 rounded-xl flex items-center justify-center shadow-sm">
                                    <span
                                        class="material-symbols-outlined {{ $doc ? 'text-primary' : 'text-slate-300' }} italic text-xl">
                                        {{ $doc ? 'file_present' : 'description' }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase text-slate-400 leading-none">
                                        {{ $label }}</p>
                                    <p class="text-[11px] font-black mt-1">
                                        {{ $doc ? 'Disponible' : 'Non fourni' }}
                                    </p>
                                </div>
                            </div>

                            @if ($doc)
                                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-primary hover:text-white transition-all">
                                    <span class="material-symbols-outlined text-lg">open_in_new</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
