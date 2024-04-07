<x-app-layout>
    <x-slot name='create'>

    </x-slot>
    <h1 class="text-3xl">Ajouter un spectacle</h1>
    <form method="post" action="{{route('show.store')}}">
        @csrf
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-input @error('title') is-invalid @enderror">
            @error('title')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" class="@error('description') is-invalid @enderror"></textarea>
            @error('description')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="post_url">Lien</label>
            <input type="text" name="poster_url" id="post_url" class="@error('poster_url')  @enderror">
                @error('poster_url')
                    <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
                @enderror
        </div>
        <div>
            <label for="duration">Durée</label>
            <input type="number" name="duration" id="duration" class="@error('duration') is-invalid @enderror">
            @error('duration')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>



        <button class="button-validate">Ajouter</button>
        <a href="{{ route('show.index') }}" class="button-cancel">Retour à l'index</a>

    </form>

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-lg w-fit">
            <h2 class="">Erreurs de validation</h2>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif

    <a href="{{ route('show.index') }}">Retour à l'index</a>

</x-app-layout>
