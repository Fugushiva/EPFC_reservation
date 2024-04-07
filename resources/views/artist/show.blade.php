<x-app-layout>
    <x-slot name="membre">
        {{ $artist->firstname }}
    </x-slot>
    <h1 class="text-xl font-bold my-4">{{ $artist->firstname }} - {{ $artist->lastname }}</h1>
    <a href="{{ route('artist.edit', $artist->id) }}" class="button-validate mb-2">
        Modifier
    </a>
    <form method="post" action="{{ route('artist.delete', $artist->id) }}" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="button-cancel">
            Supprimer
        </button>
    </form>
    <nav class="mt-4">
        <a href="{{ route('artist.index') }}" class="underline text-blue-600 hover:text-blue-800">Retour à l'index</a>
    </nav>
</x-app-layout>
