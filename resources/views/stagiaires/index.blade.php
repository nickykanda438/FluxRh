<x-app-layout>
    <div class="py-8 px-4 mx-auto max-w-7xl">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Gestion des Stagiaires</h2>
            <button data-modal-target="register-modal" data-modal-toggle="register-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                + Nouveau Stagiaire
            </button>
        </div>

        <div id="register-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-4xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Enregistrer un nouveau stagiaire
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="register-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <form action="#" method="POST" class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                <input type="text" name="nom" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postnom</label>
                                <input type="text" name="postnom" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                                <input type="text" name="prenom" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre (Sexe)</label>
                                <select name="genre" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                                <input type="text" name="telephone" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white" required>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de Stage</label>
                                <select name="type_stagiaire" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                                    <option>Académique</option>
                                    <option>Professionnel</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution</label>
                                <input type="text" name="institution_provenance" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domaine</label>
                                <input type="text" name="domaine_etude" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Début</label>
                                <input type="date" name="date_debut" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Fin</label>
                                <input type="date" name="date_fin" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Affecté</label>
                                <input type="text" name="service_affectation" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 mt-6 pt-4">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
                            <button data-modal-hide="register-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Rechercher par nom">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600" type="button">
                            Filtrer
                        </button>
                        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-white">Sexe</h6>
                            <ul class="space-y-2 text-sm mb-4">
                                <li class="flex items-center"><input type="checkbox" class="w-4 h-4 rounded text-blue-600"><label class="ml-2 text-gray-300">Masculin</label></li>
                                <li class="flex items-center"><input type="checkbox" class="w-4 h-4 rounded text-blue-600"><label class="ml-2 text-gray-300">Féminin</label></li>
                            </ul>
                            <h6 class="mb-3 text-sm font-medium text-white">Institut</h6>
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-center"><input type="checkbox" class="w-4 h-4 rounded text-blue-600"><label class="ml-2 text-gray-300">UNIKIN</label></li>
                                <li class="flex items-center"><input type="checkbox" class="w-4 h-4 rounded text-blue-600"><label class="ml-2 text-gray-300">ISP</label></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nom</th>
                                <th scope="col" class="px-4 py-3">Sexe</th>
                                <th scope="col" class="px-4 py-3">Institut</th>
                                <th scope="col" class="px-4 py-3">Service Affecté</th>
                                <th scope="col" class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-bold text-gray-900 whitespace-nowrap dark:text-white">MUKENDI KABAMBA Jean</th>
                                <td class="px-4 py-3">M</td>
                                <td class="px-4 py-3 font-semibold">UNIKIN</td>
                                <td class="px-4 py-3 italic">Maintenance IT</td>
                                <td class="px-4 py-3 flex items-center justify-end space-x-3">
                                    <button class="text-blue-600 hover:underline font-bold">Modifier</button>
                                    <button class="text-red-600 hover:underline font-bold">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>