<x-app-layout>
    <x-slot name="membre">
        {{$artist->firstname}}
    </x-slot>
    <h1>{{ $artist->firstname }} - {{ $artist->lastname }}</h1>
    <a class="button-modify" href="{{ route('artist.edit', $artist->id) }}">Modifier</a>
    <form method="post" action="{{ route('artist.delete', $artist->id) }}">
        @csrf
        @method('DELETE')
        <button class="button-cancel">Supprimer</button>
    </form>
    <nav><a class="underline" href="{{ route('artist.index') }}" > retour à l'index</a></nav>

</x-app-layout>
