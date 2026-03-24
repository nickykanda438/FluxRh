<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mt-4">
        <label class="flex items-center">
            <input type="checkbox" name="is_admin" value="1" class="rounded border-gray-300">
            <span class="ml-2 text-sm text-gray-600">Définir comme Administrateur</span>
        </label>
    </div>

    <button type="submit" class="bg-primary text-white px-4 py-2 rounded">
        Créer l'utilisateur
    </button>
</form>
