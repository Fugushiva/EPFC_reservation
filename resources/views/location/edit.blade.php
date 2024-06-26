<x-app-layout>
    <x-slot name="edit">
        edit
    </x-slot>
    <div class="max-w-4xl mx-auto p-8">
        <form action="{{route('location.update', $location->id)}}" method="post" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="designation" class="block text-sm font-medium text-gray-700">Salle</label>
                <input type="text" name="designation" id="designation" value="{{ old('designation', $location->designation) }}" class="input-text @error('designation') border-red-500 @enderror">
                @error('designation')
                <div class="text-sm text-white bg-red-500 p-2 rounded-lg mt-2">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                <input type="text" name="address" id="address" value="{{ old('address', $location->address) }}" class="input-text @error('address') border-red-500 @enderror">
                @error('address')
                <div class="text-sm text-white bg-red-500 p-2 rounded-lg mt-2">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="website" class="block text-sm font-medium text-gray-700">Site web</label>
                <input type="text" name="website" id="website" value="{{ old('website', $location->website) }}" class="input-text @error('website') border-red-500 @enderror">
                @error('website')
                <div class="text-sm text-white bg-red-500 p-2 rounded-lg mt-2">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $location->phone) }}" class="input-text @error('phone') border-red-500 @enderror">
                @error('phone')
                <div class="text-sm text-white bg-red-500 p-2 rounded-lg mt-2">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="picture_url" class="block text-sm font-medium text-gray-700">URL de l'image</label>
                <input type="text" name="picture_url" id="picture_url" oninput="updateImagePreview(this.value)" value="{{ old('picture_url', $location->picture_url) }}" class="input-text @error('picture_url') border-red-500 @enderror">
                @error('picture_url')
                <div class="text-sm text-white bg-red-500 p-2 rounded-lg mt-2">{{$message}}</div>
                @enderror
                <img id="imagePreview" src="{{ asset($location->picture_url) }}" alt="Aperçu de l'image" class="mt-4 h-48 w-full object-cover">
            </div>

            <div class="flex gap-4">
                <button class="button-validate">Mettre à jour</button>
                <a href="{{route('location.show', $location->id)}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Annuler</a>
            </div>
            @if($errors->any())
                <div class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700">
                    <h2 class="font-bold">Liste des erreurs</h2>
                    <ul class="list-disc pl-5">
                        @foreach($errors as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
    <script>
        function updateImagePreview(value) {
            document.getElementById('imagePreview').src = value;
        }
    </script>
</x-app-layout>
