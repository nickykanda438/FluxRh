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

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Gestion des Utilisateurs</h2>

            <a href="{{ route('users.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl transition-all shadow-lg shadow-blue-500/20">
                Nouvel Utilisateur
            </a>
        </div>

        <div class="bg-white dark:bg-slate-900 shadow-md rounded-xl overflow-hidden border border-gray-200 dark:border-slate-800">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-slate-800">
                <thead class="bg-gray-50 dark:bg-slate-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-400 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-400 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-400 uppercase tracking-wider">Rôle</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-400 uppercase tracking-wider">Date Création</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-slate-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-slate-800">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-slate-400">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($user->is_admin)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400">
                                        Administrateur
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-slate-800 dark:text-slate-400">
                                        Utilisateur
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-slate-400">
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="flex justify-end gap-3">
                                    <a data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        onclick="supprimer(event)" data-url="{{ route('users.destroy', $user->id) }}"
                                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 cursor-pointer">
                                        <span class="material-symbols-outlined text-lg">delete_forever</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-confirm message="Voulez-vous supprimer cet utilisateur ?" />
</x-app-layout>