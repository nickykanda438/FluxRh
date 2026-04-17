<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-slate-900 font-sans text-slate-900 dark:text-slate-100 p-4 sm:p-6 lg:p-8 pb-20">
        <div class="max-w-7xl mx-auto">

            {{-- ALERTES HARMONISÉES --}}
            @if (session('success'))
                <div class="mb-6 flex items-center p-4 text-green-800 border border-green-200 rounded-2xl bg-green-50 dark:bg-slate-900 dark:text-green-400 dark:border-green-900/50 shadow-sm animate-in fade-in slide-in-from-top-2">
                    <span class="material-symbols-outlined mr-3 text-xl">check_circle</span>
                    <div class="text-[11px] font-black uppercase tracking-tight flex-1">
                        {{ session('success') }}
                    </div>
                    <button onclick="this.parentElement.remove()" class="p-1 hover:bg-green-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
                        <span class="material-symbols-outlined text-sm">close</span>
                    </button>
                </div>
            @endif

            {{-- HEADER STYLE FLUXRH --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-xl sm:text-2xl font-black tracking-tighter uppercase italic leading-none">
                        FluxRh <span class="text-blue-600">/</span> <span class="text-slate-500">Stagiaires</span>
                    </h2>
                    <p class="text-slate-400 text-[9px] font-bold uppercase tracking-[0.2em] mt-2">
                        Suivi des périodes de stage
                    </p>
                </div>

                <button data-modal-target="register-modal" data-modal-toggle="register-modal"
                    class="group inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-blue-600 text-white rounded-xl shadow-xl shadow-blue-500/20 transition-all hover:bg-blue-700 active:scale-95">
                    <span class="material-symbols-outlined text-xl">add</span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Nouveau Stagiaire</span>
                </button>
            </div>

            {{-- GRID STATS : 1 col (mobile), 2 col (sm), 4 col (lg) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                {{-- Total --}}
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
                    <div class="w-11 h-11 bg-blue-50 dark:bg-blue-900/20 rounded-xl flex items-center justify-center text-blue-600">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <div>
                        <div class="text-xl font-black italic leading-none">{{ $stats['total'] }}</div>
                        <div class="text-[9px] font-bold uppercase text-slate-400 mt-1 uppercase">Total</div>
                    </div>
                </div>
                {{-- En Cours --}}
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
                    <div class="w-11 h-11 bg-emerald-50 dark:bg-emerald-900/20 rounded-xl flex items-center justify-center text-emerald-600">
                        <span class="material-symbols-outlined animate-pulse">pending_actions</span>
                    </div>
                    <div>
                        <div class="text-xl font-black italic leading-none">{{ $stats['en_cours'] }}</div>
                        <div class="text-[9px] font-bold uppercase text-slate-400 mt-1 uppercase">En cours</div>
                    </div>
                </div>
                {{-- Terminés --}}
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
                    <div class="w-11 h-11 bg-red-50 dark:bg-red-900/20 rounded-xl flex items-center justify-center text-red-600">
                        <span class="material-symbols-outlined">event_available</span>
                    </div>
                    <div>
                        <div class="text-xl font-black italic leading-none">{{ $stats['termines'] }}</div>
                        <div class="text-[9px] font-bold uppercase text-slate-400 mt-1 uppercase">Terminés</div>
                    </div>
                </div>
                {{-- Académiques --}}
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
                    <div class="w-11 h-11 bg-purple-50 dark:bg-purple-900/20 rounded-xl flex items-center justify-center text-purple-600">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <div>
                        <div class="text-xl font-black italic leading-none">{{ $stats['academique'] }}</div>
                        <div class="text-[9px] font-bold uppercase text-slate-400 mt-1 uppercase">Académiques</div>
                    </div>
                </div>
            </div>

            {{-- FILTRES HARMONISÉS --}}
            <div class="bg-white dark:bg-slate-800/80 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm mb-6">
                <form action="{{ route('stagiaires.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-4">
                        <label class="text-[10px] font-black uppercase text-slate-400 mb-2 block tracking-widest">Recherche</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl py-2.5 pl-10 text-xs focus:ring-2 focus:ring-blue-500" placeholder="Nom, institution...">
                        </div>
                    </div>

                    <div class="md:col-span-4 grid grid-cols-2 gap-2">
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 mb-2 block tracking-widest">Début</label>
                            <input type="date" name="debut" value="{{ request('debut') }}"
                                class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl py-2 text-xs focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 mb-2 block tracking-widest">Fin</label>
                            <input type="date" name="fin" value="{{ request('fin') }}"
                                class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl py-2 text-xs focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-[10px] font-black uppercase text-slate-400 mb-2 block tracking-widest">État</label>
                        <select name="etat" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-xl py-2.5 text-xs focus:ring-2 focus:ring-blue-500">
                            <option value="">Tous</option>
                            <option value="en_cours" {{ request('etat') == 'en_cours' ? 'selected' : '' }}>En cours</option>
                            <option value="termine" {{ request('etat') == 'termine' ? 'selected' : '' }}>Terminé</option>
                        </select>
                    </div>

                    <div class="md:col-span-2 flex gap-2">
                        <button type="submit" class="flex-1 bg-slate-900 dark:bg-blue-600 text-white font-bold text-[10px] uppercase py-3 rounded-xl hover:opacity-90 transition-opacity">Filtrer</button>
                        @if (request()->anyFilled(['search', 'debut', 'fin', 'etat']))
                            <a href="{{ route('stagiaires.index') }}" class="px-3 bg-slate-100 dark:bg-slate-700 flex items-center justify-center rounded-xl text-slate-500">
                                <span class="material-symbols-outlined text-sm">restart_alt</span>
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- DATA TABLE RESPONSIVE --}}
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="hidden md:table-header-group bg-slate-50/50 dark:bg-slate-800/50">
                            <tr class="border-b border-slate-100 dark:border-slate-800">
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Stagiaire</th>
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Institution</th>
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Période</th>
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800 flex flex-col md:table-row-group">
                            @forelse($stagiaires as $stagiaire)
                                <tr class="flex flex-col md:table-row group hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors p-4 md:p-0">
                                    {{-- Identité & Statut (Badge) --}}
                                    <td class="md:p-4 mb-2 md:mb-0">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 shrink-0 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-blue-600 font-bold text-[10px] border border-blue-100 dark:border-blue-800/50">
                                                {{ strtoupper(substr($stagiaire->nom, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="text-xs font-black text-slate-800 dark:text-slate-100 uppercase italic truncate">
                                                    {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                                                </div>
                                                <div class="mt-1">
                                                    @if ($stagiaire->est_termine)
                                                        <span class="text-[8px] font-black uppercase px-2 py-0.5 rounded-full bg-red-50 text-red-500 border border-red-100 dark:bg-red-900/20 dark:border-red-800/50">Terminé</span>
                                                    @else
                                                        <span class="text-[8px] font-black uppercase px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-100 dark:bg-emerald-900/20 dark:border-emerald-800/50">En cours</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Institution --}}
                                    <td class="md:p-4 mb-2 md:mb-0">
                                        <div class="text-[11px] font-bold text-slate-600 dark:text-slate-300">
                                            <span class="md:hidden text-[9px] text-slate-400 uppercase mr-1">Provenant de:</span>
                                            {{ $stagiaire->institution_provenance }}
                                        </div>
                                    </td>

                                    {{-- Période --}}
                                    <td class="md:p-4 mb-4 md:mb-0">
                                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-100 dark:border-slate-700">
                                            <span class="material-symbols-outlined text-[14px] text-slate-400">calendar_month</span>
                                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-tighter">
                                                {{ $stagiaire->date_debut->format('d/m/y') }} → {{ $stagiaire->date_fin->format('d/m/y') }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Actions --}}
                                    <td class="md:p-4 md:text-right border-t border-slate-100 dark:border-slate-800 pt-3 md:pt-0 md:border-none">
                                        <div class="flex items-center md:justify-end gap-5">
                                            <a href="{{ route('stagiaires.edit', $stagiaire) }}" class="flex items-center gap-1 text-[10px] font-black text-slate-400 hover:text-blue-600 uppercase transition-colors">
                                                <span class="material-symbols-outlined text-lg">edit_note</span>
                                                <span class="md:hidden">Modifier</span>
                                            </a>
                                            <form action="{{ route('stagiaires.destroy', $stagiaire) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce stagiaire ?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="flex items-center gap-1 text-[10px] font-black text-slate-400 hover:text-red-500 uppercase transition-colors">
                                                    <span class="material-symbols-outlined text-lg text-red-400/70">delete_sweep</span>
                                                    <span class="md:hidden">Supprimer</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-12 text-center text-slate-400 text-xs font-bold uppercase tracking-widest">Aucun stagiaire trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($stagiaires->hasPages())
                    <div class="p-4 border-t border-slate-100 dark:border-slate-800 bg-slate-50/30">
                        {{ $stagiaires->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('stagiaires.create')

    {{-- Script Réouverture Modale --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modalElement = document.getElementById('register-modal');
                if (modalElement) {
                    const modal = new Modal(modalElement);
                    modal.show();
                }
            });
        </script>
    @endif
</x-app-layout>