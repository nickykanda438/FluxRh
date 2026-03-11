<x-app-layout>

    <!-- Header -->
    <header
        class="flex items-center justify-between p-4 lg:px-8 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 sticky top-0 z-10">
        <div class="flex items-center gap-4 lg:hidden">
            <span class="material-symbols-outlined text-slate-600">menu</span>
            <h2 class="font-bold text-lg">HR Dashboard</h2>
        </div>
        <div class="hidden lg:block">
            <h2 class="text-2xl font-bold">Good morning, HR Manager</h2>
            <p class="text-slate-500 text-sm">Here's what's happening today.</p>
        </div>
        <div class="flex items-center gap-4">
            <button
                class="relative p-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full">
                <span class="material-symbols-outlined">notifications</span>
                <span
                    class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
            </button>
        </div>
    </header>

    <div class="p-4 lg:p-8 space-y-8">
        <section>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Quick Actions</h3>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <button
                    class="flex flex-col items-center gap-2 p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:border-primary transition-all group">
                    <div
                        class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">person_add</span>
                    </div>
                    <span class="text-sm font-semibold">Add Agent</span>
                </button>
                <button
                    class="flex flex-col items-center gap-2 p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:border-primary transition-all group">
                    <div
                        class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <span class="text-sm font-semibold">New Intern</span>
                </button>
                <button
                    class="flex flex-col items-center gap-2 p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:border-primary transition-all group">
                    <div
                        class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">assignment</span>
                    </div>
                    <span class="text-sm font-semibold">Create Report</span>
                </button>
                <button
                    class="flex flex-col items-center gap-2 p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:border-primary transition-all group">
                    <div
                        class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">calendar_month</span>
                    </div>
                    <span class="text-sm font-semibold">Schedule Review</span>
                </button>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div
                class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-xl p-6 shadow-sm border border-slate-200 dark:border-slate-800">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-slate-500 text-sm font-medium">Total Agents</h3>
                        <p class="text-3xl font-bold">1,240</p>
                    </div>
                    <span
                        class="text-green-600 bg-green-100 dark:bg-green-900/30 px-2 py-1 rounded text-xs font-bold">+12%
                        vs last month</span>
                </div>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-medium text-slate-600 dark:text-slate-400">Active</span>
                            <span class="font-bold">980 (79%)</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="bg-primary h-full" style="width: 79%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-medium text-slate-600 dark:text-slate-400">Inactive</span>
                            <span class="font-bold">185 (15%)</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="bg-slate-400 h-full" style="width: 15%"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <div
                            class="p-4 rounded-lg bg-red-50 dark:bg-red-900/10 border border-red-100 dark:border-red-900/20">
                            <p class="text-xs text-red-600 dark:text-red-400 font-bold uppercase tracking-wider">
                                Deserters</p>
                            <p class="text-xl font-bold text-red-700 dark:text-red-300">62</p>
                        </div>
                        <div
                            class="p-4 rounded-lg bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800">
                            <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Deceased</p>
                            <p class="text-xl font-bold text-slate-700 dark:text-slate-300">13</p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-slate-900 rounded-xl p-6 shadow-sm border border-slate-200 dark:border-slate-800">
                <h3 class="text-slate-500 text-sm font-medium mb-1">Total Interns</h3>
                <p class="text-3xl font-bold mb-6">450</p>
                <div class="flex flex-col gap-6 items-center py-4">
                    <div class="relative w-40 h-40">
                        <svg class="w-full h-full rotate-[-90deg]" viewBox="0 0 36 36">
                            <circle class="stroke-slate-100 dark:stroke-slate-800" cx="18" cy="18"
                                fill="none" r="16" stroke-width="4"></circle>
                            <circle class="stroke-primary" cx="18" cy="18" fill="none" r="16"
                                stroke-dasharray="65, 100" stroke-width="4"></circle>
                            <circle class="stroke-indigo-300" cx="18" cy="18" fill="none" r="16"
                                stroke-dasharray="35, 100" stroke-dashoffset="-65" stroke-width="4"></circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center flex-col">
                            <span class="text-xs text-slate-400 font-medium uppercase">Active</span>
                            <span class="text-lg font-bold">100%</span>
                        </div>
                    </div>
                    <div class="w-full space-y-3">
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-primary"></span>
                                <span class="text-slate-600 dark:text-slate-400">Academic</span>
                            </div>
                            <span class="font-bold">292 (65%)</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-indigo-300"></span>
                                <span class="text-slate-600 dark:text-slate-400">Professional</span>
                            </div>
                            <span class="font-bold">158 (35%)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer for Mobile Navigation -->
        <nav
            class="lg:hidden sticky bottom-0 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 flex items-center justify-around py-2">
            <a class="flex flex-col items-center gap-1 text-primary" href="#">
                <span class="material-symbols-outlined">home</span>
                <span class="text-[10px] font-bold uppercase">Home</span>
            </a>
            <a class="flex flex-col items-center gap-1 text-slate-400" href="#">
                <span class="material-symbols-outlined">group</span>
                <span class="text-[10px] font-bold uppercase">Agents</span>
            </a>
            <a class="flex flex-col items-center gap-1 text-slate-400" href="#">
                <span class="material-symbols-outlined">school</span>
                <span class="text-[10px] font-bold uppercase">Interns</span>
            </a>
            <a class="flex flex-col items-center gap-1 text-slate-400" href="#">
                <span class="material-symbols-outlined">settings</span>
                <span class="text-[10px] font-bold uppercase">Settings</span>
            </a>
        </nav>
</x-app-layout>
