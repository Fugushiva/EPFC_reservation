<x-app-layout>
    <x-slot name="create">
    </x-slot>

    <form action="{{route('show.update', $show->id)}} " method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title"
            @if(old('title'))
                value="{{old('title')}}"
            @else
                value="{{$show->title}}"
            @endif
            class="@error('title') text-red-700 @enderror">
            @error('title')
                <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="description">Desription</label>
            <textarea id="description" name="description" class="@error('description') text-red-700 @enderror">
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
            <label for="link">Lien</label>
            <input type="text" name="link" id="link"
                   @if(old('title'))
                       value="{{old('poster_url')}}"
                   @else
                       value="{{$show->poster_url}}"
                   @endif
                   class="@error('poster_url') text-red-700 @enderror">
            @error('poster_url')
            <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="duration">Durée</label>
            <input type="number" name="duration" id="duration"
                   @if(old('duration'))
                       value="{{old('duration')}}"
                   @else
                       value="{{$show->duration}}"
                   @endif
                   class="@error('duration') text-red-700 @enderror">
            @error('price')
            <div class="bg-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div class="container flex gap-1"></div>
        <button class="bg-green-500 rounded w-fit">Mise à jour</button>
        <a href="{{route('show.show', $show->id)}}" class="bg-red-600 rounded w-fit" >Annuler</a>

        @if($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg w-fit">
                <h2 class="text-2xl">Liste des erreurs</h2>
                <ul>
                    @foreach($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</x-app-layout>
