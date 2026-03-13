<div @click="sidebarOpen = false" class="fixed inset-0 bg-slate-900/50 z-40 lg:hidden" x-show="sidebarOpen"
    x-transition.opacity></div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="w-72 bg-white dark:bg-background-dark border-r border-slate-200 dark:border-slate-800 flex flex-col fixed h-full z-50 transition-transform duration-300 transform lg:translate-x-0">

    <div class="p-6 flex items-center gap-3">
        <div
            class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white shadow-lg shadow-primary/30">
            <span class="material-symbols-outlined">corporate_fare</span>
        </div>
        <div>
            <h1 class="text-primary font-bold text-lg leading-tight">SENASEM</h1>
        </div>
    </div>

    <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-3 py-2.5 {{ request()->routeIs('dashboard') ? 'bg-primary/10 text-primary font-semibold' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} rounded-lg transition-colors">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-sm">Tableau de bord</span>
        </a>
        <a href="{{ route('agents.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 {{ request()->routeIs('agents.*') ? 'bg-primary/10 text-primary font-semibold' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} rounded-lg transition-colors">
            <span class="material-symbols-outlined">group</span>
            <span class="text-sm font-medium">Gestion des Agents</span>
        </a>

        <a href="{{ route('stagiaires.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 {{ request()->routeIs('stagiaires.*') ? 'bg-primary/10 text-primary font-semibold' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} rounded-lg transition-colors">
            <span class="material-symbols-outlined">school</span>
            <span class="text-sm font-medium">Stagiaires</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2.5 {{ request()->routeIs('users.*') ? 'bg-primary/10 text-primary font-semibold' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }} rounded-lg transition-colors"
            href="#">
            <span class="material-symbols-outlined text-xl">person_add</span>
            <span class="text-sm font-semibold">User Management</span>
        </a>
    </nav>

    <div class="p-4 border-t border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/20">
        <div class="flex items-center gap-3 p-2">
            <div
                class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center text-primary border border-primary/20">
                <span class="material-symbols-outlined text-xl">account_circle</span>
            </div>
            <div class="overflow-hidden">
                <p class="text-sm font-bold truncate text-slate-900 dark:text-white">
                    {{ Auth::user()->name ?? 'Utilisateur' }}</p>
                <p class="text-[10px] text-slate-500 truncate uppercase tracking-tighter">Administrateur</p>
            </div>
        </div>
    </div>
</aside>
