<x-app-layout>
    <x-slot name="show">
        index
    </x-slot>
    <h1 class="text-2xl underline">{{$location->designation}}</h1>
    <div>
        <p>slug :{{$location->slug}}</p>
        <p> Adresse :{{$location->address}}</p>
        @if($location->website)
            <p> site :{{$location->website}}</p>
        @else
            <p>Aucun site internet</p>
        @endif
        <p> Numéro de téléphone : {{$location->phone}}</p>
    </div>
    <div class="container flex gap-2">
        <a class="bg-amber-300 p-1 rounded w-fit" href="{{route('location.edit', $location->id)}}">Modifier</a>
        <form method="post" action="{{route('location.destroy', $location->id)}}">
            @csrf
            @method('DELETE')

            <button class="bg-red-600 text-white rounded p-1 w-fit">Supprimer</button>
        </form>
    </div>
    <a href="{{route('location.index')}}" class="underline">Retour à l'index</a>
</x-app-layout>
