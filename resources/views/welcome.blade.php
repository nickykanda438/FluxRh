<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400&display=swap" />
    <title>FluxRh - Bienvenue</title>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-blue-100/50 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[40%] h-[40%] bg-indigo-100/50 rounded-full blur-3xl"></div>
    </div>

    <div
        class="relative z-10 max-w-sm w-full bg-white rounded-[2rem] shadow-xl shadow-blue-900/5 p-10 border border-slate-100">
        <div class="flex justify-center mb-6">
            <div class="size-16 bg-blue-900 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-900/20">
                <span class="material-symbols-outlined text-white text-4xl">bubble_chart</span>
            </div>
        </div>

        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Flux<span
                    class="text-blue-900">Rh</span></h1>
            <p class="text-slate-500 text-sm leading-relaxed">
                Simplifiez la gestion de vos agents et de vos stagiaires en un seul clic.
            </p>
        </div>

        <div class="space-y-3">
            <a href="{{ route('login') }}"
                class="group relative flex items-center justify-center w-full bg-blue-900 text-white py-4 px-6 rounded-2xl font-bold hover:bg-blue-800 transition-all active:scale-[0.98]">
                Connexion
                <span
                    class="material-symbols-outlined absolute right-4 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all text-sm">arrow_forward</span>
            </a>

            <a href="{{ route('register') }}"
                class="flex items-center justify-center w-full bg-white text-slate-700 py-4 px-6 rounded-2xl font-bold border-2 border-slate-100 hover:border-blue-900/10 hover:bg-slate-50 transition-all active:scale-[0.98]">
                Créer un compte
            </a>
        </div>

        <div class="mt-12 text-center">
            <p class="text-xs text-slate-400 font-medium uppercase tracking-widest italic">
                ///////////////////
            </p>
        </div>
    </div>
</body>

</html>
