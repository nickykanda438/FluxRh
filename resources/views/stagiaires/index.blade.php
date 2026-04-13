<x-app-layout>
    {{-- Alertes de session --}}
    @if (session('success'))
        <div id="alert-success"
            class="flex items-center p-4 mb-4 text-green-800 border border-green-300 rounded-2xl bg-green-50 dark:bg-slate-900 dark:text-green-400 dark:border-green-800 transition-all duration-300"
            role="alert">
            <span class="material-symbols-outlined mr-2">check_circle</span>
            <div class="text-sm font-medium flex-1"><span class="font-bold">Succès !</span> {{ session('success') }}</div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-transparent text-green-500 rounded-lg p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                onclick="this.parentElement.remove()">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>
        </div>
    @endif

    <div class="py-8 px-4 mx-auto max-w-7xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Gestion des Stagiaires</h2>

            <button data-modal-target="register-modal" data-modal-toggle="register-modal"
                class="flex items-center px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-xl text-sm shadow-lg shadow-blue-500/20 transition-all">
                <span class="material-symbols-outlined mr-2">add</span>
                Nouveau Stagiaire
            </button>
        </div>

        {{-- Statistiques --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            {{-- Total --}}
            <div class="p-4 bg-white rounded-xl border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:bg-blue-500/20">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>
            {{-- En Cours --}}
            <div class="p-4 bg-white rounded-xl border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:bg-green-500/20">
                        <span class="material-symbols-outlined">pending_actions</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">En cours</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $stats['en_cours'] }}</p>
                    </div>
                </div>
            </div>
            {{-- Terminés --}}
            <div class="p-4 bg-white rounded-xl border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:bg-red-500/20">
                        <span class="material-symbols-outlined">event_available</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Terminés</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $stats['termines'] }}</p>
                    </div>
                </div>
            </div>
            {{-- Académiques --}}
            <div class="p-4 bg-white rounded-xl border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full dark:bg-purple-500/20">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Académiques</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $stats['academique'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filtres --}}
        <div class="bg-white dark:bg-gray-800 p-4 rounded-t-xl border border-gray-200 dark:border-gray-700 shadow-sm">
            <form action="{{ route('stagiaires.index') }}" method="GET"
                class="flex flex-col md:flex-row gap-4 items-end">
                <div class="w-full md:w-1/3">
                    <label class="text-xs font-semibold uppercase text-gray-500 mb-1 block">Recherche</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="block w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                        placeholder="Nom, prénom, email...">
                </div>

                <div class="flex gap-2 w-full md:w-auto">
                    <div class="flex-1">
                        <label class="text-xs font-semibold uppercase text-gray-500 mb-1 block">Début</label>
                        <input type="date" name="debut" value="{{ request('debut') }}"
                            class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                    </div>
                    <div class="flex-1">
                        <label class="text-xs font-semibold uppercase text-gray-500 mb-1 block">Fin</label>
                        <input type="date" name="fin" value="{{ request('fin') }}"
                            class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                    </div>
                </div>

                <div class="w-full md:w-40">
                    <label class="text-xs font-semibold uppercase text-gray-500 mb-1 block">État</label>
                    <select name="etat"
                        class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <option value="">Tous</option>
                        <option value="en_cours" {{ request('etat') == 'en_cours' ? 'selected' : '' }}>En cours</option>
                        <option value="termine" {{ request('etat') == 'termine' ? 'selected' : '' }}>Terminé</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2">Filtrer</button>
                    @if (request()->anyFilled(['search', 'debut', 'fin', 'etat']))
                        <a href="{{ route('stagiaires.index') }}"
                            class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-4 py-2">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Tableau --}}
        <div
            class="bg-white dark:bg-gray-800 relative shadow-md rounded-b-xl overflow-hidden border-x border-b border-gray-200 dark:border-gray-700">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                        <tr>
                            <th class="px-4 py-4">Nom Complet</th>
                            <th class="px-4 py-4">Institution</th>
                            <th class="px-4 py-4">Statut</th>
                            <th class="px-4 py-4">Période</th>
                            <th class="px-4 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stagiaires as $stagiaire)
                            <tr
                                class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-4 py-3 font-bold text-gray-900 dark:text-white">
                                    {{ $stagiaire->nom }} {{ $stagiaire->postnom }} {{ $stagiaire->prenom }}
                                </td>
                                <td class="px-4 py-3">{{ $stagiaire->institution_provenance }}</td>
                                <td class="px-4 py-3">
                                    @if ($stagiaire->est_termine)
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-bold px-2.5 py-0.5 rounded-full dark:bg-red-900/30 dark:text-red-400">Terminé</span>
                                    @else
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-0.5 rounded-full dark:bg-green-900/30 dark:text-green-400">En
                                            cours</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    Du {{ $stagiaire->date_debut->format('d/m/Y') }}<br>Au
                                    {{ $stagiaire->date_fin->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('stagiaires.edit', $stagiaire) }}"
                                        class="text-blue-600 hover:underline">Editer</a>
                                    <form action="{{ route('stagiaires.destroy', $stagiaire) }}" method="POST"
                                        class="inline ml-2" onsubmit="return confirm('Supprimer ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500">Aucun résultat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{ $stagiaires->links() }}
            </div>
        </div>
    </div>

    @include('stagiaires.create')

    {{-- Script Flowbite pour rouvrir la modale en cas d'erreur --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modalElement = document.getElementById('register-modal');
                if (modalElement) {
                    // Si vous utilisez Flowbite en JS pur
                    const modal = new Modal(modalElement);
                    modal.show();
                }
            });
        </script>
    @endif
</x-app-layout>
