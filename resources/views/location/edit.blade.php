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
                <label for="image_url" class="block text-sm font-medium text-gray-700">URL de l'image</label>
                <input type="text" name="image_url" id="image_url" oninput="updateImagePreview(this.value)" value="{{ old('image_url', $location->image_url) }}" class="input-text @error('image_url') border-red-500 @enderror">
                @error('image_url')
                <div class="text-sm text-white bg-red-500 p-2 rounded-lg mt-2">{{$message}}</div>
                @enderror
                <img id="imagePreview" src="{{ asset($location->picture_url) }}" alt="Aperçu de l'image" class="mt-4 h-48 w-full object-cover">
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Mettre à jour</button>
                <a href="{{route('location.show', $location->id)}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Annuler</a>
            </div>
        </form>
    </div>
    <script>
        function updateImagePreview(value) {
            document.getElementById('imagePreview').src = value;
        }
    </script>
</x-app-layout>
