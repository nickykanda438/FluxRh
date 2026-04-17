<div x-show="sidebarOpen" 
     @click="sidebarOpen = false" 
     x-cloak
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 lg:hidden">
</div>
<aside 
    :class="[
        sidebarOpen ? 'translate-x-0' : '-translate-x-full',
        isCollapsed ? 'lg:w-20' : 'lg:w-72'
    ]"
    class="w-72 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex flex-col fixed h-full z-50 transition-all duration-300 transform lg:translate-x-0">

    <div class="p-4 flex items-center h-16 shrink-0 border-b border-transparent">
        <div class="flex items-center gap-3 w-full overflow-hidden">
            <div @click="isCollapsed = !isCollapsed" class="p-1.5 bg-primary/10 rounded-lg shrink-0">
                <img src="{{ asset('back_auth/assets/img/logo.png') }}" alt="Logo" class="w-7 h-7">
            </div>
             <h1 
                class="text-primary dark:text-white font-bold text-lg truncate transition-opacity duration-300">
              SENASEM
            </h1>
           
        </div>
    </div>

    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
        @php
            $navItems = [
                ['route' => 'dashboard', 'icon' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'agents.index', 'icon' => 'group', 'label' => 'Agents'],
                ['route' => 'stagiaires.index', 'icon' => 'school', 'label' => 'Stagiaires'],
            ];
            if (auth()->user()->is_admin == 1) {
                $navItems[] = ['route' => 'users.index', 'icon' => 'person', 'label' => 'Utilisateurs'];
            }
        @endphp

        @foreach ($navItems as $item)
            <a href="{{ route($item['route']) }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all group {{ request()->routeIs($item['route'])
                   ? 'bg-primary text-white shadow-lg shadow-primary/30'
                   : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}"
               title="{{ $item['label'] }}">
                <span class="material-symbols-outlined shrink-0">{{ $item['icon'] }}</span>
                <span x-show="!isCollapsed" class="text-sm font-medium whitespace-nowrap">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="p-4 border-t border-slate-100 dark:border-slate-800">
        <div class="flex items-center gap-3" :class="isCollapsed ? 'justify-center' : ''">
            <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 shrink-0 flex items-center justify-center text-slate-500">
                <span class="material-symbols-outlined">account_circle</span>
            </div>
            <div x-show="!isCollapsed" class="overflow-hidden flex-1 transition-opacity">
                <p class="text-sm font-bold text-slate-900 dark:text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-slate-500 uppercase tracking-wider">Admin</p>
            </div>
            <form x-show="!isCollapsed" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="p-1.5 text-slate-400 hover:text-red-500 transition-colors">
                    <span class="material-symbols-outlined text-xl">logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
<div class="lg:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/90 dark:bg-slate-900/90 backdrop-blur-lg border-t border-slate-200 dark:border-slate-800 px-6 py-3">
    <div class="flex items-center justify-between">
        @foreach (array_slice($navItems, 0, 3) as $item)
            <a href="{{ route($item['route']) }}" 
               class="flex flex-col items-center gap-1 {{ request()->routeIs($item['route']) ? 'text-primary' : 'text-slate-400' }}">
                <span class="material-symbols-outlined text-2xl">{{ $item['icon'] }}</span>
                <span class="text-[10px] font-bold uppercase tracking-tighter">{{ explode(' ', $item['label'])[0] }}</span>
            </a>
        @endforeach
        
        <button @click="sidebarOpen = true" class="flex flex-col items-center gap-1 text-slate-400">
            <span class="material-symbols-outlined text-2xl">menu</span>
            <span class="text-[10px] font-bold uppercase">Plus</span>
        </button>
    </div>
</div>