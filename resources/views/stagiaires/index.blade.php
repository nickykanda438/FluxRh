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
    <div class="py-8 px-4 mx-auto max-w-7xl">

        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Gestion des Stagiaires</h2>

        {{-- Section Statistiques --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Stagiaires</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div
                        class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Académiques</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $stats['academique'] }}</p>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div
                        class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57c0 .542-.312 1.034-.792 1.262l-6.708 3.18a1 1 0 01-.9 0L.792 12.832A1.397 1.397 0 010 11.57V8a2 2 0 012-2h4zm6 0V5a1 1 0 00-1-1H9a1 1 0 00-1 1v1h4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Professionnels</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $stats['professionnel'] }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div
                        class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Actuellement en cours</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $stats['en_cours'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modale d'enregistrement --}}
        <div id="register-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-4xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Enregistrer un nouveau stagiaire
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="register-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('stagiaires.store') }}" method="POST" class="p-6">
                        @csrf

                        {{-- Affichage des erreurs de validation --}}
                        @if ($errors->any())
                            <div
                                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                <input type="text" name="nom" value="{{ old('nom') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postnom</label>
                                <input type="text" name="postnom" value="{{ old('postnom') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                                <input type="text" name="prenom" value="{{ old('prenom') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre
                                    (Sexe)</label>
                                <select name="genre"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                                    <option value="M" {{ old('genre') == 'M' ? 'selected' : '' }}>Masculin
                                    </option>
                                    <option value="F" {{ old('genre') == 'F' ? 'selected' : '' }}>Féminin
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                                <input type="text" name="telephone" value="{{ old('telephone') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de
                                    Stage</label>
                                <select name="type_stagiaire"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                                    <option value="Académique"
                                        {{ old('type_stagiaire') == 'Académique' ? 'selected' : '' }}>Académique
                                    </option>
                                    <option value="Professionnel"
                                        {{ old('type_stagiaire') == 'Professionnel' ? 'selected' : '' }}>Professionnel
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution</label>
                                <input type="text" name="institution_provenance"
                                    value="{{ old('institution_provenance') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domaine</label>
                                <input type="text" name="domaine_etude_ou_competence"
                                    value="{{ old('domaine_etude_ou_competence') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                    Début</label>
                                <input type="date" name="date_debut" value="{{ old('date_debut') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                    Fin</label>
                                <input type="date" name="date_fin" value="{{ old('date_fin') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service
                                    Affecté</label>
                                <input type="text" name="service_affectation"
                                    value="{{ old('service_affectation') }}"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                        </div>
                        <div
                            class="flex items-center space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 mt-6 pt-4">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
                            <button data-modal-hide="register-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Bouton Nouveau Stagiaire --}}
        <div class="mb-6">
            <button data-modal-target="register-modal" data-modal-toggle="register-modal"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                + Nouveau Stagiaire
            </button>
        </div>

        {{-- Tableau des Stagiaires --}}
        <section class="bg-gray-50 dark:bg-gray-900">
            <div
                class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nom Complet</th>
                                <th scope="col" class="px-4 py-3">Sexe</th>
                                <th scope="col" class="px-4 py-3">Institution</th>
                                <th scope="col" class="px-4 py-3">Service Affecté</th>
                                <th scope="col" class="px-4 py-3">Période</th> {{-- AJOUTÉ --}}
                                <th scope="col" class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stagiaires as $stagiaire)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $stagiaire->nom }} {{ $stagiaire->postnom }} {{ $stagiaire->prenom }}
                                    </th>
                                    <td class="px-4 py-3">{{ $stagiaire->genre }}</td>
                                    <td class="px-4 py-3 font-semibold">{{ $stagiaire->institution_provenance }}</td>
                                    <td class="px-4 py-3 italic">{{ $stagiaire->service_affectation }}</td>
                                    <td class="px-4 py-3">Du {{ $stagiaire->date_debut->format('d/m/Y') }} au
                                        {{ $stagiaire->date_fin->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end space-x-3">
                                        <a href="{{ route('stagiaires.edit', $stagiaire) }}"
                                            class="text-blue-600 hover:underline font-bold">Modifier</a>
                                        <form action="{{ route('stagiaires.destroy', $stagiaire) }}" method="POST"
                                            onsubmit="return confirm('Confirmer la suppression ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:underline font-bold">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucun stagiaire
                                        trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    {{-- Script pour rouvrir la modale si erreurs --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('register-modal');
                if (modal) {
                    // Utilisation de l'API Flowbite pour afficher la modale
                    const modalInstance = new Modal(modal);
                    modalInstance.show();
                }
            });
        </script>
    @endif
</x-app-layout>
