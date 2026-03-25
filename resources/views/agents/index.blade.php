<x-app-layout>
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

    <div x-data="{
        showModal: false,
        showStatusModal: false,
        selectedAgent: { name: '', id: '' },
        newStatus: ''
    }"
        class="min-h-screen bg-slate-50 dark:bg-black font-sans text-slate-900 dark:text-slate-100">

        <header
            class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-30 shadow-sm">
            <div
                class="max-w-[1600px] mx-auto px-4 lg:px-8 py-5 flex flex-col md:flex-row items-center justify-between gap-4">
                <div>
                    <h2
                        class="text-2xl font-black text-slate-900 dark:text-white tracking-tighter flex items-center gap-3">
                        <div class="p-2 bg-primary rounded-xl">
                            <span class="material-symbols-outlined text-white block">badge</span>
                        </div>
                        FLUX-RH PRO
                    </h2>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative group">
                        <span
                            class="material-symbols-outlined absolute left-3 top-3 text-slate-400 text-sm">search</span>
                        <input type="text" placeholder="Recherche matricule ou nom..."
                            class="pl-10 pr-4 py-3 bg-slate-100 dark:bg-slate-800 border-none rounded-2xl text-xs w-72 focus:ring-2 focus:ring-primary/20 transition-all font-medium">
                    </div>
                    <button @click="showModal = true"
                        class="px-6 py-3 bg-primary text-white text-xs font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-primary/30 hover:bg-primary/90 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">person_add</span>
                        Nouvel Agent
                    </button>
                </div>
            </div>
        </header>

        <main class="p-6 lg:p-8 max-w-[1600px] mx-auto space-y-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-green-500/50 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-green-50 dark:bg-green-500/10 text-green-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined">check_circle</span>
                        </div>
                        <span
                            class="text-[10px] font-black text-green-600 bg-green-50 dark:bg-green-900/30 px-2 py-1 rounded-md uppercase">En
                            poste</span>
                    </div>
                    <h4 class="text-3xl font-black tracking-tighter">{{ $stats['countActifs'] }}</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Agents Actifs</p>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-amber-500/50 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-amber-50 dark:bg-amber-500/10 text-amber-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined">directions_run</span>
                        </div>
                        <span
                            class="text-[10px] font-black text-amber-600 bg-amber-50 dark:bg-amber-900/30 px-2 py-1 rounded-md uppercase">Alerte</span>
                    </div>
                    <h4 class="text-3xl font-black tracking-tighter">{{ $stats['countDeserteurs'] }}</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Desertersw</p>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-blue-500/50 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-blue-50 dark:bg-blue-500/10 text-blue-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined">elderly</span>
                        </div>
                        <span
                            class="text-[10px] font-black text-blue-600 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded-md uppercase">Retraite</span>
                    </div>
                    <h4 class="text-3xl font-black tracking-tighter">{{ $stats['countRetraite'] }}</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Agents Âgés</p>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-200 dark:border-slate-800 shadow-sm hover:border-red-500/50 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-red-50 dark:bg-red-500/10 text-red-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined">heart_broken</span>
                        </div>
                        <span
                            class="text-[10px] font-black text-red-600 bg-red-50 dark:bg-red-900/30 px-2 py-1 rounded-md uppercase">Inactif</span>
                    </div>
                    <h4 class="text-3xl font-black tracking-tighter">{{ $stats['countDecedes'] }}</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Décédés</p>
                </div>
            </div>

            <div
                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-[2.5rem] shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-0">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50">
                                <th
                                    class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">
                                    Matricule
                                </th>
                                <th
                                    class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">
                                    Agent
                                </th>
                                <th
                                    class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800">
                                    Affectation
                                </th>
                                <th
                                    class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800 text-center">
                                    Statut
                                </th>
                                <th
                                    class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100 dark:border-slate-800 text-right">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @if ($agents->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-8 py-6 text-center text-slate-500 dark:text-slate-400">
                                        Aucun agent trouvé.
                                    </td>
                                </tr>
                            @else
                                @foreach ($agents as $agent)
                                    <tr class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-all">
                                        <td class="px-8 py-6 text-sm font-black text-primary italic uppercase">
                                            {{ $agent->matricule }}
                                        </td>

                                        <td class="px-8 py-6">
                                            <p class="text-sm font-black uppercase tracking-tight">
                                                {{ $agent->nom }} {{ $agent->postnom }} {{ $agent->prenom }}
                                            </p>
                                            <p class="text-[10px] text-slate-400 font-bold uppercase mt-1">
                                                {{ $agent->fonction ?? 'Agent' }}
                                            </p>
                                        </td>

                                        <td class="px-8 py-6">
                                            <div class="flex flex-col gap-1">
                                                <span
                                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-lg text-[10px] font-black uppercase w-fit">
                                                    {{ $agent->bureau->nom ?? 'N/A' }}
                                                </span>
                                                <span class="text-[9px] text-slate-400 font-bold px-1 uppercase">
                                                    {{ $agent->bureau->division->nom ?? 'Direction' }}
                                                </span>
                                            </div>
                                        </td>

                                        <td class="px-8 py-6 text-center">
                                            @php
                                                $statusClasses =
                                                    $agent->status === 'ACTIF'
                                                        ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400'
                                                        : 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400';
                                            @endphp
                                            <button data-modal-target="status-modal" data-modal-toggle="status-modal"
                                                data-url="{{ route('agents.update', $agent->id) }}"
                                                onclick="preparerStatus(event)"
                                                class="px-5 py-2 rounded-full text-[10px] font-black {{ $statusClasses }} uppercase tracking-widest hover:ring-4 ring-offset-0 transition-all">
                                                {{ $agent->status }}
                                            </button>
                                        </td>

                                        <td class="px-8 py-6">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('agents.show', $agent->id) }}" title="Voir Fiche"
                                                    class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white transition-all">
                                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                                </a>

                                                <a href="{{ route('agents.edit', $agent->id) }}" title="Modifier"
                                                    class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white transition-all">
                                                    <span class="material-symbols-outlined text-lg">edit_note</span>
                                                </a>
                                                <a data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                    onclick="supprimer(event)"
                                                    data-url="{{ route('agents.destroy', $agent->id) }}"
                                                    class="w-9 h-9 flex items-center justify-center rounded-xl bg-red-50 text-red-500 cursor-pointer">
                                                    <span
                                                        class="material-symbols-outlined text-lg">delete_forever</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <div x-show="showModal" x-transition.opacity
            class="fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-slate-900/90 backdrop-blur-xl" @click="showModal = false"></div>

            <div
                class="relative bg-white dark:bg-slate-900 w-full max-w-6xl rounded-[3rem] shadow-2xl flex flex-col max-h-[95vh] overflow-hidden border border-white/10">
                <div
                    class="px-12 py-8 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between bg-white/50 dark:bg-slate-900/50 backdrop-blur-md sticky top-0 z-10">
                    <div>
                        <h3
                            class="text-3xl font-black text-slate-900 dark:text-white uppercase tracking-tighter italic">
                            Nouveau Dossier Agent</h3>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Saisie complète des
                            données administratives et de carrière</p>
                    </div>
                    <button @click="showModal = false"
                        class="w-14 h-14 flex items-center justify-center bg-slate-50 dark:bg-slate-800 rounded-[1.5rem] hover:bg-red-500 hover:text-white transition-all group">
                        <span class="material-symbols-outlined group-hover:rotate-90 transition-transform">close</span>
                    </button>
                </div>

                <form id="fullAgentForm" action="{{ route('agents.store') }}" method="POST"
                    class="p-12 overflow-y-auto bg-slate-50/30 dark:bg-slate-900/30 space-y-12"
                    enctype="multipart/form-data">
                    @csrf

                    <section class="space-y-6">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-primary tracking-[0.4em]">01. Identité & État
                                Civil</h4>
                            <div class="h-[1px] flex-1 bg-primary/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Matricule</label>
                                <input type="text" name="matricule" required
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="Ex: AG-2026-000">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Nom</label>
                                <input type="text" name="nom" required
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Postnom</label>
                                <input type="text" name="postnom"
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Prénom</label>
                                <input type="text" name="prenom" required
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Date de
                                    naissance</label>
                                <input type="date" name="date_naissance" required
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Lieu de
                                    naissance</label>
                                <input type="text" name="lieu_naissance" required
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Genre</label>
                                <select name="genre"
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">État Civil</label>
                                <select name="etat_civil"
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Marié(e)">Marié(e)</option>
                                    <option value="Veuf(ve)">Veuf(ve)</option>
                                    <option value="Divorcé(e)">Divorcé(e)</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Nombre
                                    d'enfants</label>
                                <input type="number" name="nbre_enfant" value="0" min="0"
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-6">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-amber-500 tracking-[0.4em]">02. Coordonnées &
                                Adresse</h4>
                            <div class="h-[1px] flex-1 bg-amber-500/20"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Téléphone</label>
                                <input type="tel" name="telephone" required
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm"
                                    placeholder="+243...">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Email</label>
                                <input type="email" name="email" required
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm"
                                    placeholder="agent@fluxrh.cd">
                            </div>
                            <div class="md:col-span-1">
                                <label class="text-[10px] font-black uppercase text-slate-400 ml-1">Bureau
                                    d'affectation</label>
                                <select name="bureau_id" required
                                    class="w-full mt-2 px-5 py-3 bg-white dark:bg-slate-800 border-none rounded-2xl shadow-sm text-sm">
                                    @foreach ($bureaus as $bureau)
                                        <option value="{{ $bureau->id }}">{{ $bureau->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>

                    <section class="space-y-8">
                        <div class="flex items-center gap-4">
                            <h4 class="text-xs font-black uppercase text-slate-900 dark:text-white tracking-[0.4em]">
                                06. Documents & Biométrie
                            </h4>
                            <div class="h-[1px] flex-1 bg-slate-200 dark:bg-slate-800"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div
                                class="p-8 bg-white dark:bg-slate-800 rounded-[2.5rem] border-2 border-dashed border-slate-200 dark:border-slate-700 hover:border-primary transition-all group shadow-sm">
                                <div
                                    class="w-14 h-14 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined text-3xl">school</span>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <p
                                            class="text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest text-center">
                                            Diplôme Académique</p>
                                        <input type="file" name="doc_diplome"
                                            class="block w-full text-[10px] text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-primary file:text-white hover:file:bg-primary/90 cursor-pointer">
                                    </div>

                                    <div
                                        class="grid grid-cols-1 gap-2 pt-4 border-t border-slate-100 dark:border-slate-700">
                                        <input type="text" name="ref_diplome" placeholder="N° Réf / Matricule"
                                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-[11px] focus:ring-2 focus:ring-primary/20">
                                        <input type="date" name="date_diplome"
                                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-[11px] text-slate-500">
                                        <input type="hidden" name="type_diplome" value="Diplôme">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="p-8 bg-white dark:bg-slate-800 rounded-[2.5rem] border-2 border-dashed border-slate-200 dark:border-slate-700 hover:border-amber-500 transition-all group shadow-sm">
                                <div
                                    class="w-14 h-14 bg-amber-500/10 text-amber-500 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined text-3xl">fingerprint</span>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <p
                                            class="text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest text-center">
                                            Carte Biométrique</p>
                                        <input type="file" name="doc_biometrie"
                                            class="block w-full text-[10px] text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-amber-500 file:text-white hover:file:bg-amber-600 cursor-pointer">
                                    </div>

                                    <div
                                        class="grid grid-cols-1 gap-2 pt-4 border-t border-slate-100 dark:border-slate-700">
                                        <input type="text" name="ref_biometrie" placeholder="N° de Carte"
                                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-[11px] focus:ring-2 focus:ring-amber-500/20">
                                        <input type="date" name="date_biometrie"
                                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-[11px] text-slate-500">
                                        <input type="hidden" name="type_biometrie" value="Carte Biométrique">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="p-8 bg-white dark:bg-slate-800 rounded-[2.5rem] border-2 border-dashed border-slate-200 dark:border-slate-700 hover:border-purple-500 transition-all group shadow-sm">
                                <div
                                    class="w-14 h-14 bg-purple-500/10 text-purple-500 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined text-3xl">description</span>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <p
                                            class="text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest text-center">
                                            Acte d'affectation</p>
                                        <input type="file" name="doc_affectation"
                                            class="block w-full text-[10px] text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-purple-500 file:text-white hover:file:bg-purple-600 cursor-pointer">
                                    </div>

                                    <div
                                        class="grid grid-cols-1 gap-2 pt-4 border-t border-slate-100 dark:border-slate-700">
                                        <input type="text" name="ref_affectation" placeholder="Référence Acte"
                                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-[11px] focus:ring-2 focus:ring-purple-500/20">
                                        <input type="date" name="date_affectation"
                                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-[11px] text-slate-500">
                                        <input type="hidden" name="type_affectation" value="Acte d'affectation">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>

                <div
                    class="px-12 py-8 border-t border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900 flex justify-end gap-6 items-center">
                    <button @click="showModal = false"
                        class="text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-colors">Abandonner</button>
                    <button type="submit" form="fullAgentForm"
                        class="px-14 py-4 bg-primary text-white text-xs font-black uppercase tracking-[0.2em] rounded-[1.5rem] shadow-2xl shadow-primary/40 hover:scale-105 active:scale-95 transition-all">Valider
                        l'enregistrement</button>
                </div>
            </div>
        </div>
    </div>
    <x-status />
    <x-confirm />

</x-app-layout>
