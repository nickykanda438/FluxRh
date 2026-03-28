@props(['message'])
<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-slate-900/60">

    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-slate-500 border border-slate-800 rounded-3xl shadow-2xl overflow-hidden">

            <button type="button"
                class="absolute top-3 end-2.5 text-slate-500 bg-transparent hover:bg-slate-800 hover:text-white rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center transition-colors"
                data-modal-hide="popup-modal">
                <span class="material-symbols-outlined">close</span>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="p-6 md:p-8 text-center">
                <div
                    class="mx-auto mb-5 w-16 h-16 bg-red-500/10 rounded-full flex items-center justify-center text-red-500">
                    <span class="material-symbols-outlined text-4xl">warning</span>
                </div>

                <h3 class="mb-6 text-lg font-bold text-white leading-tight">
                    {{ $message }}
                </h3>

                <div class="flex items-center space-x-4 justify-center">
                    <form id="delete-form" action="" method="post">
                        @csrf
                        @method('DELETE')

                        <button data-modal-hide="popup-modal" type="submit"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-900/50 font-bold rounded-xl text-sm px-5 py-2.5 transition-all">
                            Oui, supprimer
                        </button>
                    </form>

                    <button data-modal-hide="popup-modal" type="button"
                        class="text-slate-300 bg-slate-800 border border-slate-700 hover:bg-slate-700 hover:text-white focus:ring-4 focus:ring-slate-700 font-bold rounded-xl text-sm px-5 py-2.5 transition-all">
                        Non, annuler
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function supprimer(event) {
        event.preventDefault();
        const url = event.currentTarget.getAttribute('data-url');
        const form = document.getElementById('delete-form');
        if (form && url) {
            form.setAttribute('action', url);
        }
    }
</script>
