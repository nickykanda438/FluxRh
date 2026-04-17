<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-slate-900 font-sans text-slate-900 dark:text-slate-100 p-4 sm:p-6 lg:p-8 pb-20">
        <div class="max-w-7xl mx-auto">

            @if (session('success') || session('error'))
                <div class="mb-6 space-y-3">
                    @if (session('success'))
                        <div class="flex items-center p-4 text-green-800 border border-green-200 rounded-2xl bg-green-50 dark:bg-slate-900 dark:text-green-400 dark:border-green-900/50 shadow-sm animate-in fade-in slide-in-from-top-2">
                            <span class="material-symbols-outlined mr-3">check_circle</span>
                            <div class="text-xs sm:text-sm font-bold flex-1 uppercase tracking-tight">
                                {{ session('success') }}
                            </div>
                            <button onclick="this.parentElement.remove()" class="ml-auto p-1 hover:bg-green-100 dark:hover:bg-slate-800 rounded-lg">
                                <span class="material-symbols-outlined text-sm">close</span>
                            </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="flex items-center p-4 text-red-800 border border-red-200 rounded-2xl bg-red-50 dark:bg-slate-900 dark:text-red-400 dark:border-red-900/50 shadow-sm">
                            <span class="material-symbols-outlined mr-3">info</span>
                            <div class="text-xs sm:text-sm font-bold flex-1 uppercase tracking-tight">
                                {{ session('error') }}
                            </div>
                            <button onclick="this.parentElement.remove()" class="ml-auto p-1 hover:bg-red-100 dark:hover:bg-slate-800 rounded-lg">
                                <span class="material-symbols-outlined text-sm">close</span>
                            </button>
                        </div>
                    @endif
                </div>
            @endif

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-xl sm:text-2xl font-black tracking-tighter uppercase italic leading-none">
                        FluxRh <span class="text-blue-600">/</span> <span class="text-slate-500">Utilisateurs</span>
                    </h2>
                    <p class="text-slate-400 text-[9px] font-bold uppercase tracking-[0.2em] mt-2">
                        Gestion des accès système
                    </p>
                </div>

                <a href="{{ route('users.create') }}"
                    class="group inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-blue-600 text-white rounded-xl shadow-xl shadow-blue-500/20 transition-all hover:scale-105 active:scale-95">
                    <span class="material-symbols-outlined text-xl">person_add</span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Nouvel Utilisateur</span>
                </a>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 flex items-center gap-3">
                    <div class="w-10 h-10 bg-purple-50 dark:bg-purple-900/20 rounded-xl flex items-center justify-center text-purple-600 shrink-0">
                        <span class="material-symbols-outlined text-xl">admin_panel_settings</span>
                    </div>
                    <div class="min-w-0">
                        <div class="text-lg font-black italic leading-none">{{ $users->where('is_admin', 1)->count() }}</div>
                        <div class="text-[8px] font-bold uppercase text-slate-400 truncate">Admins</div>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-50 dark:bg-blue-900/20 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                        <span class="material-symbols-outlined text-xl">person</span>
                    </div>
                    <div class="min-w-0">
                        <div class="text-lg font-black italic leading-none">{{ $users->where('is_admin', 0)->count() }}</div>
                        <div class="text-[8px] font-bold uppercase text-slate-400 truncate">Utilisateurs</div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="hidden md:table-header-group">
                            <tr class="border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Nom & Email</th>
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Rôle</th>
                                <th class="p-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Date Création</th>
                                <th class="p-4 text-right text-[10px] font-black uppercase tracking-widest text-slate-400">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800 flex flex-col md:table-row-group">
                            @foreach ($users as $user)
                                <tr class="flex flex-col md:table-row group hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors p-4 md:p-0">
                                    
                                    <td class="md:p-4 mb-2 md:mb-0">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 shrink-0 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 font-bold text-[10px] border border-slate-200 dark:border-slate-700">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div class="overflow-hidden">
                                                <div class="text-xs font-black text-slate-800 dark:text-slate-100 uppercase truncate italic">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="text-[10px] text-slate-400 font-medium truncate">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="md:p-4 mb-3 md:mb-0">
                                        @if ($user->is_admin)
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-tighter bg-purple-50 text-purple-600 border border-purple-100 dark:bg-purple-900/30 dark:text-purple-400 dark:border-purple-800/50">
                                                <span class="w-1 h-1 rounded-full bg-purple-500 mr-1.5 animate-pulse"></span>
                                                Administrateur
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-tighter bg-slate-100 text-slate-500 border border-slate-200 dark:bg-slate-800 dark:text-slate-400 dark:border-slate-700">
                                                Utilisateur
                                            </span>
                                        @endif
                                    </td>

                                    <td class="md:p-4 mb-4 md:mb-0">
                                        <div class="flex flex-col md:flex-row md:items-center gap-1 md:gap-2">
                                            <span class="material-symbols-outlined text-slate-300 dark:text-slate-600 text-sm hidden md:inline">calendar_today</span>
                                            <span class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase">
                                                {{ $user->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="md:p-4 md:text-right border-t border-slate-100 dark:border-slate-800 pt-3 md:pt-4 md:border-none mt-auto">
                                        <div class="flex items-center md:justify-end gap-4">
                                            {{-- On ne permet pas de supprimer soi-même --}}
                                            @if($user->id !== auth()->id())
                                                <a data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                   onclick="supprimer(event)" data-url="{{ route('users.destroy', $user->id) }}"
                                                   class="flex items-center gap-2 text-[10px] font-black text-red-400 hover:text-red-600 uppercase transition-all group/btn cursor-pointer ml-auto md:ml-0">
                                                    <span class="md:hidden">Supprimer le compte</span>
                                                    <span class="material-symbols-outlined text-xl group-hover/btn:rotate-12 transition-transform">delete_forever</span>
                                                </a>
                                            @else
                                                <span class="text-[9px] font-bold text-slate-400 italic uppercase">C'est vous</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <x-confirm message="Voulez-vous supprimer cet utilisateur ? Cette action est irréversible." />
</x-app-layout>