<div @click="sidebarOpen = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 lg:hidden"
    x-show="sidebarOpen" x-transition.opacity>
</div>

<aside x-data="{ isCollapsed: false }"
    :class="[
        sidebarOpen ? 'translate-x-0' : '-translate-x-full',
        isCollapsed ? 'lg:w-20' : 'lg:w-72'
    ]"
    class="w-72 bg-white dark:bg-background-dark border-r border-slate-200 dark:border-slate-800 flex flex-col fixed h-full z-50 transition-all duration-300 transform lg:translate-x-0">

    <div class="p-4 mb-2 flex items-center justify-between overflow-hidden">
        <div class="flex items-center gap-3 shrink-0">
            <button @click="isCollapsed = !isCollapsed"
                class="hidden lg:flex p-1.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400 transition-colors">
                <div
                    class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white shadow-lg shadow-primary/30 shrink-0">
                    <span class="material-symbols-outlined"
                        :class="isCollapsed ? 'rotate-180' : ''">corporate_fare</span>
                </div>
            </button>

            <h1 x-show="!isCollapsed" x-transition.opacity
                class="text-primary dark:text-white font-bold text-lg leading-tight truncate">
                SENASEM
            </h1>
        </div>
    </div>

    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto overflow-x-hidden">
        @php
            $navItems = [
                ['route' => 'dashboard', 'icon' => 'dashboard', 'label' => 'Tableau de bord'],
                ['route' => 'agents.index', 'icon' => 'group', 'label' => 'Gestion des Agents'],
                ['route' => 'stagiaires.index', 'icon' => 'school', 'label' => 'Stagiaires'],
                ['route' => 'users.index', 'icon' => 'person', 'label' => 'Utilisateurs'],
            ];
            '';
        @endphp

        @foreach ($navItems as $item)
            <a href="{{ route($item['route']) }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors group {{ request()->routeIs($item['route'])
                    ? 'bg-primary/10 text-primary dark:bg-primary/20 dark:text-white font-semibold'
                    : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white' }}"
                title="{{ $item['label'] }}">
                <span class="material-symbols-outlined shrink-0 text-xl">{{ $item['icon'] }}</span>
                <span x-show="!isCollapsed" x-transition.opacity class="text-sm truncate">{{ $item['label'] }}</span>
            </a>
        @endforeach

    </nav>

    <div class="p-4 border-t border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-900/40">
        <div class="flex items-center gap-3 p-1" :class="isCollapsed ? 'justify-center' : 'justify-between'">
            <div class="flex items-center gap-3 overflow-hidden">
                <div class="w-9 h-9 rounded-full bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary dark:text-primary border border-primary/20 shrink-0"
                    title="{{ Auth::user()->name }}">
                    <span class="material-symbols-outlined text-xl">account_circle</span>
                </div>
                <div x-show="!isCollapsed" x-transition.opacity class="overflow-hidden">
                    <p class="text-sm font-bold truncate text-slate-900 dark:text-white">
                        {{ Auth::user()->name ?? 'Utilisateur' }}
                    </p>
                    <p class="text-[10px] text-slate-500 dark:text-slate-500 truncate uppercase tracking-tighter">
                        Administrateur</p>
                </div>
            </div>

            <form x-show="!isCollapsed" method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit"
                    class="p-2 text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded-lg transition-colors"
                    title="Déconnexion">
                    <span class="material-symbols-outlined text-xl">logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
