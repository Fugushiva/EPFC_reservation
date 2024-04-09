<x-app-layout>
    <x-slot name="create">
        create
    </x-slot>
    <div class="max-w-2xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Ajouter une salle</h1>
        <form method="post" action="{{ route('location.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="designation" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="designation" id="designation" class="input-text @error('designation') border-red-500 @enderror">
                @error('designation')
                <div class="mt-1 text-sm text-white bg-red-600 rounded p-2">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                <input type="text" id="address" name="address" class="input-text @error('address') border-red-500 @enderror">
                @error('address')
                <div class="mt-1 text-sm text-white bg-red-600 rounded p-2">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="website" class="block text-sm font-medium text-gray-700">Site web</label>
                <input type="text" name="website" id="website" class="input-text @error('website') border-red-500 @enderror">
                @error('website')
                <div class="mt-1 text-sm text-white bg-red-600 rounded p-2">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                <input type="text" name="phone" id="phone" class="input-text @error('phone') border-red-500 @enderror">
                @error('phone')
                <div class="mt-1 text-sm text-white bg-red-600 rounded p-2">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="picture_url" class="block text-sm font-medium text-gray-700">URL de l'image</label>
                <input type="text" name="picture_url" id="picture_url" oninput="updateImagePreview(this.value)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('picture_url') border-red-500 @enderror">
                @error('picture_url')
                <div class="mt-1 text-sm text-white bg-red-600 rounded p-2">{{$message}}</div>
                @enderror
            </div>
            @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
                <div class="flex gap-4">
                    <button type="submit" class="button-validate">Créer</button>
                    <a href="{{ route('location.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Retour à l'index</a>
                </div>
            @endif
        </form>
    </div>

</x-app-layout>
