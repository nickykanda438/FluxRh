<div id="register-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-6xl max-h-full">
        <div
            class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800">

            {{-- HEADER --}}
            <div class="flex items-start justify-between p-6 border-b border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/20">
                        <span class="material-symbols-outlined text-white text-2xl">person_add</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-black tracking-tighter uppercase italic">FluxRh <span
                                class="text-blue-600">/</span> Enregistrement Stagiaire</h2>
                        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-1">Gestion des
                            stagiaires</p>
                    </div>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-800 dark:hover:text-white"
                    data-modal-hide="register-modal">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="{{ route('stagiaires.store') }}" method="POST"
                class="p-8 space-y-12 max-h-[70vh] overflow-y-auto">
                @csrf

                {{-- Affichage des erreurs globales --}}
                <x-form-errors :errors="$errors" />

                {{-- SECTION 1 : IDENTITÉ & INFORMATIONS PERSONNELLES --}}
                <x-form-section title="Identité & Informations Personnelles" number="01" color="blue">
                    <x-form-field name="nom" label="Nom" required="true" />
                    <x-form-field name="postnom" label="Postnom" />
                    <x-form-field name="prenom" label="Prénom" required="true" />
                    <x-form-field name="genre" label="Genre" type="select" :options="['M' => 'Masculin', 'F' => 'Féminin']" />
                    <x-form-field name="telephone" label="Téléphone" required="true" placeholder="+243..." />
                    <x-form-field name="email" label="Email" type="email" required="true"
                        placeholder="exemple@mail.com" />
                </x-form-section>

                {{-- SECTION 2 : DÉTAILS DU STAGE --}}
                <x-form-section title="Détails du Stage" number="02" color="green">
                    <x-form-field name="type_stagiaire" label="Type de Stage" type="select" :options="['Académique' => 'Académique', 'Professionnel' => 'Professionnel']" />
                    <x-form-field name="institution_provenance" label="Institution de provenance" cols="2"
                        required="true" placeholder="Ex: UNIKIN, ISTA, Kin-Emploi..." />
                    <x-form-field name="domaine_etude_ou_competence" label="Domaine d'étude ou Compétences"
                        cols="3" required="true" placeholder="Ex: Informatique de gestion, Marketing..." />
                    <x-form-field name="date_debut" label="Date de Début" type="date" required="true" />
                    <x-form-field name="date_fin" label="Date de Fin prévue" type="date" required="true" />
                    <x-form-field name="service_affectation" label="Service d'affectation"
                        placeholder="Ex: Informatique, RH..." />
                </x-form-section>

                {{-- ID de l'agent connecté --}}
                <input type="hidden" name="agent_id" value="{{ auth()->user()->id ?? '' }}">

                {{-- FOOTER --}}
                <x-form-actions cancel-action="data-modal-hide='register-modal'"
                    submit-text="Confirmer l'enregistrement" />
            </form>
        </div>
    </div>
</div>
