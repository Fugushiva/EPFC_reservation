<x-app-layout>
    <x-slot name="index">
        index
    </x-slot>
    <x-search-location-form>

    </x-search-location-form>
    <h1 class="text-3xl font-bold text-center my-8">Nos salles partenaires</h1>

    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($locations as $location)
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="{{ asset($location->picture_url) }}" alt="{{ $location->designation }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <p class="text-xl font-semibold"><a href="{{ route('location.show', $location->id) }}" class="text-blue-600 hover:text-blue-800">{{ $location->designation }}</a></p>
                </div>
            </div>
        @endforeach
    </div>
    @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
        <div class="text-center my-8">
            <a href="{{route('location.create')}}" class="button-validate">
                Ajouter une salle
            </a>
        </div>
    @endif
</x-app-layout>
