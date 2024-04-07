<x-app-layout>

    <h1 class="text-3xl font-bold text-gray-900 mb-4">Ajouter un artiste</h1>

    <form action="{{ route('artist.store') }}" method="post" class="flex flex-col gap-4 w-full max-w-md">
        @csrf
        <div>
            <label for="firstname" class="block text-sm font-medium text-gray-700">Prénom</label>
            <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('firstname') border-red-500 @enderror">
            @error('firstname')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="lastname" class="block text-sm font-medium text-gray-700">Nom</label>
            <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('lastname') border-red-500 @enderror">
            @error('lastname')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex gap-3">
            <button class="button-validate">
                Ajouter
            </button>
            <a href="{{ route('artist.index') }}" class="button-cancel">
                Annuler
            </a>
        </div>
    </form>

    @if($errors->any())
        <div class="mt-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
            <h2 class="font-bold">Liste des erreurs de validation</h2>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('artist.index') }}" class="mt-4 inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
        Retour à l'index
    </a>
</x-app-layout>
