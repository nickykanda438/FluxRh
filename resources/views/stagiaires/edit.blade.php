<x-app-layout>
    <div class="py-8 px-4 mx-auto max-w-4xl">
        {{-- Retour --}}
        <div class="mb-6">
            <a href="{{ route('stagiaires.index') }}" class="flex items-center text-sm text-gray-600 hover:text-blue-600 dark:text-gray-400">
                <span class="material-symbols-outlined mr-1 text-base">arrow_back</span>
                Retour à la liste
            </a>
        </div>

        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Modifier le stagiaire : {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                </h3>
            </div>

            <form action="{{ route('stagiaires.update', $stagiaire) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                {{-- Erreurs de validation --}}
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
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
                        <input type="text" name="nom" value="{{ old('nom', $stagiaire->nom) }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postnom</label>
                        <input type="text" name="postnom" value="{{ old('postnom', $stagiaire->postnom) }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom', $stagiaire->prenom) }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                        <select name="genre" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            <option value="M" {{ old('genre', $stagiaire->genre) == 'M' ? 'selected' : '' }}>Masculin</option>
                            <option value="F" {{ old('genre', $stagiaire->genre) == 'F' ? 'selected' : '' }}>Féminin</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                        <input type="text" name="telephone" value="{{ old('telephone', $stagiaire->telephone) }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" value="{{ old('email', $stagiaire->email) }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de Stage</label>
                        <select name="type_stagiaire" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            <option value="Académique" {{ old('type_stagiaire', $stagiaire->type_stagiaire) == 'Académique' ? 'selected' : '' }}>Académique</option>
                            <option value="Professionnel" {{ old('type_stagiaire', $stagiaire->type_stagiaire) == 'Professionnel' ? 'selected' : '' }}>Professionnel</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution</label>
                        <input type="text" name="institution_provenance" value="{{ old('institution_provenance', $stagiaire->institution_provenance) }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domaine</label>
                        <input type="text" name="domaine_etude_ou_competence" value="{{ old('domaine_etude_ou_competence', $stagiaire->domaine_etude_ou_competence) }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Début</label>
                        <input type="date" name="date_debut" value="{{ old('date_debut', $stagiaire->date_debut ? $stagiaire->date_debut->format('Y-m-d') : '') }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Fin</label>
                        <input type="date" name="date_fin" value="{{ old('date_fin', $stagiaire->date_fin ? $stagiaire->date_fin->format('Y-m-d') : '') }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Affecté</label>
                        <input type="text" name="service_affectation" value="{{ old('service_affectation', $stagiaire->service_affectation) }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>
                </div>

                <div class="flex items-center space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 mt-6 pt-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Mettre à jour les informations
                    </button>
                    <a href="{{ route('stagiaires.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>