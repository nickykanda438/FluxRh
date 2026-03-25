<div id="status-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-md bg-slate-900/40 dark:bg-slate-950/70">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div
            class="relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-[2rem] shadow-2xl overflow-hidden transition-colors duration-300">

            <button type="button"
                class="absolute top-4 end-4 text-slate-400 dark:text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white rounded-full text-sm w-10 h-10 inline-flex justify-center items-center transition-all"
                data-modal-hide="status-modal">
                <span class="material-symbols-outlined">close</span>
            </button>

            <div class="p-8 text-center">
                <div
                    class="mx-auto mb-6 w-20 h-20 bg-indigo-50 dark:bg-indigo-500/10 rounded-3xl flex items-center justify-center text-indigo-600 dark:text-indigo-500 rotate-3 hover:rotate-0 transition-transform duration-300">
                    <span class="material-symbols-outlined text-5xl">person_edit</span>
                </div>

                <h3 class="mb-2 text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    Statut de l'agent
                </h3>
                <p class="mb-8 text-slate-500 dark:text-slate-400 text-sm px-4">
                    Veuillez définir la situation actuelle de l'agent dans les registres.
                </p>
                <form id="status-form" action="" method="POST" class="text-left">
                    @csrf
                    @method('PUT')

                    <label
                        class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 ml-1">
                        Nouveau Statut
                    </label>

                    <div class="relative group mb-8">
                        <select name="status" id="status-select" onchange="updateSelectColor(this)"
                            class="appearance-none block w-full pl-11 pr-10 py-4 text-sm font-bold text-slate-900 dark:text-white bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all cursor-pointer">

                            <option value="actif">actif</option>
                            <option value="deserteur">déserteur</option>
                            <option value="decede">décédé</option>
                            <option value="retraite">retraité</option>
                        </select>

                        <div id="status-indicator"
                            class="absolute left-4 top-1/2 -translate-y-1/2 w-3 h-3 rounded-full bg-green-500 shadow-[0_0_10px_rgba(34,197,94,0.4)] transition-all duration-300">
                        </div>

                        <div
                            class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400 dark:text-slate-500">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button data-modal-hide="status-modal" type="button" class="...">
                            Annuler
                        </button>
                        <button type="submit" class="...">
                            Confirmer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function preparerStatus(event) {
        alert('')
        const url = event.currentTarget.getAttribute('data-url');
        const form = document.getElementById('status-form');
        if (form && url) {
            form.setAttribute('action', url);
        }
    }
</script>
