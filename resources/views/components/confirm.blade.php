@props(['message'])

<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-md bg-slate-900/40 dark:bg-slate-950/70">

    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-[2rem] shadow-2xl overflow-hidden">

            <button type="button"
                class="absolute top-4 end-4 text-slate-400 dark:text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full text-sm w-10 h-10 inline-flex justify-center items-center transition-all"
                data-modal-hide="popup-modal">
                <span class="material-symbols-outlined">close</span>
            </button>

            <div class="p-8 text-center">
                <div class="mx-auto mb-6 w-16 h-16 bg-red-50 dark:bg-red-500/10 rounded-2xl flex items-center justify-center text-red-600 dark:text-red-500">
                    <span class="material-symbols-outlined text-4xl">delete_forever</span>
                </div>

                <h3 class="mb-2 text-xl font-black text-slate-900 dark:text-white uppercase tracking-tighter italic leading-none">
                    FluxRh <span class="text-red-600">/</span> Danger
                </h3>
                
                <p class="mb-8 text-slate-500 dark:text-slate-400 text-[10px] font-bold uppercase tracking-widest px-4">
                    {{ $message ?? "Cette action est irréversible. Voulez-vous continuer ?" }}
                </p>

                <div class="grid grid-cols-2 gap-4">
                    <button data-modal-hide="popup-modal" type="button"
                        class="py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                        Non, annuler
                    </button>

                    <form id="delete-form" action="" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full py-4 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-xl shadow-lg shadow-red-600/20 hover:bg-red-700 transition-colors">
                            Oui, supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function supprimer(event) {  
        const url = event.currentTarget.getAttribute('data-url');
        const form = document.getElementById('delete-form');
        
        if (form && url) {
            form.setAttribute('action', url);

        }
    }
</script>