<x-app-layout>
    <x-slot name="modify">
    </x-slot>
    <h2 class="text-xl font-bold my-4">Modifier un spectacle</h2>
    <form action="{{route('show.update', $show->id)}} " method="post" class="space-y-4 w-2/12">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" id="title"
            @if(old('title'))
                value="{{old('title')}}"
            @else
                value="{{$show->title}}"
            @endif
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500  @error('title') text-red-500 @enderror">
            @error('title')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Desription</label>
            <textarea id="description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('description') text-red-700 @enderror">
                @if(old('description'))
                    {{old('description')}}
                @else
                    {{$show->description}}
                @endif
            </textarea>
            @error('description')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="poster_url" class="block text-sm font-medium text-gray-700">image</label>
            <input type="text" name="poster_url" id="poster_url" oninput="updateImagePreview(this.value)"
                   @if(old('title'))
                       value="{{old('poster_url')}}"
                   @else
                       value="{{$show->poster_url}}"
                   @endif
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('poster_url') text-red-700 @enderror">
            @error('poster_url')
            <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
            <img id="poster_url" src="{{ asset($show->poster_url) }}" alt="Aperçu de l'image" class="mt-4 h-48 w-full object-cover">
        </div>
        <div>
            <label for="duration" class="block text-sm font-medium text-gray-700">Durée</label>
            <input type="number" name="duration" id="duration"
                   @if(old('duration'))
                       value="{{old('duration')}}"
                   @else
                       value="{{$show->duration}}"
                   @endif
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('duration') text-red-700 @enderror">
            @error('price')
            <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>

        <div class="container flex gap-1"></div>
        <button class="button-validate">Mise à jour</button>
        <a href="{{route('show.show', $show->id)}}" class="button-cancel" >Annuler</a>

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

    <script>
        function updateImagePreview(value) {
            document.getElementById('imagePreview').src = value;
        }
    </script>
</x-app-layout>
