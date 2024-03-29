<x-app-layout>
    <x-slot name="membre">
        {{$artist->firstname}}
    </x-slot>
    <h1>{{ $artist->firstname }} - {{ $artist->lastname }}</h1>
    <div class="bg-blue-200 w-fit p-1 rounded" ><a  href="{{ route('artist.edit', $artist->id) }}">Modifier</a></div>
    <form method="post" action="{{ route('artist.delete', $artist->id) }}">
        @csrf
        @method('DELETE')
        <button class="bg-red-400 my-1 rounded">Supprimer</button>
    </form>
    <nav><a class="underline" href="{{ route('artist.index') }}"> retour à l'index</a></nav>

</x-app-layout>
