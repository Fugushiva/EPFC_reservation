<x-app-layout>
    <x-slot name='create'>

    </x-slot>
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Ajouter un spectacle</h1>
    <form method="post" action="{{route('show.store')}}" class="flex flex-col gap-4 w-full max-w-md">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('title') is-invalid @enderror">
            @error('title')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('description') is-invalid @enderror"></textarea>
            @error('description')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="post_url" class="block text-sm font-medium text-gray-700">Lien</label>
            <input type="text" name="poster_url" id="post_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('poster_url')  @enderror">
                @error('poster_url')
                    <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
                @enderror
        </div>
        <div>
            <label for="duration" class="block text-sm font-medium text-gray-700">Durée</label>
            <input type="number" name="duration" id="duration" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('duration') is-invalid @enderror">
            @error('duration')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>


        <div class="flex gap-4">
            <button class="button-validate">Ajouter</button>
            <a href="{{ route('show.index') }}" class="button-cancel ">Retour à l'index</a>
        </div>

    </form>

    @if($errors->any())
        <div class="mt-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
            <h2 class="">Erreurs de validation</h2>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif



</x-app-layout>
