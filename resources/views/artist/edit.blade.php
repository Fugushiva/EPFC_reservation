<x-app-layout>
    <x-slot name="modify">
        Modifier
    </x-slot>
    <h2 class="text-xl font-bold my-4">Modifier un artiste</h2>
    <form action="{{ route('artist.update', $artist->id) }}" method="post" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="firstname" class="block text-sm font-medium text-gray-700">Prénom</label>
            <input id="firstname" type="text" name="firstname" value="{{ old('firstname', $artist->firstname) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('firstname') border-red-500 @enderror">
            @error('firstname')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="lastname" class="block text-sm font-medium text-gray-700">Nom</label>
            <input id="lastname" type="text" name="lastname" value="{{ old('lastname', $artist->lastname) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('lastname') border-red-500 @enderror">
            @error('lastname')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="button-validate">
            Modifier
        </button>
        <a href="{{ route('artist.show', $artist->id) }}" class="button-cancel">
            Annuler
        </a>
    </form>

    @if ($errors->any())
        <div class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700">
            <h2 class="font-bold">Liste des erreurs de validation</h2>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('artist.index') }}" class="block mt-4 underline text-blue-600 hover:text-blue-800">Retour à l'index</a>
</x-app-layout>
