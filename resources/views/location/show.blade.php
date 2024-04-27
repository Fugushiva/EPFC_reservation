<x-app-layout>
    <x-slot name="show">
        index
    </x-slot>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">
            <a href="{{$location->website}}" class="underline text-blue-600 hover:text-blue-800">
                {{$location->designation}}
            </a>
        </h1>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="{{ asset($location->picture_url) }}" alt="{{ $location->designation }}"
                 class="w-full h-48 object-cover">
            <div class="p-4">
                <p class="text-xl mb-2">Adresse: {{$location->address}}, {{$location->locality->postal_code}} {{$location->locality->name}}</p>
                <p class="text-xl mb-2">Numéro de téléphone: <a class='underline'
                                                                href="tel:{{$location->phone}}">{{$location->phone}}</a>
                </p>
            </div>
        </div>
        @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
            <div class="flex gap-4 justify-center mt-6">
                <a href="{{route('location.edit', $location->id)}}"
                   class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </a>
                <form method="post" action="{{route('location.destroy', $location->id)}}">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Supprimer
                    </button>
                </form>
            </div>
            <div class="text-center mt-6">
                <a href="{{route('location.index')}}" class="text-blue-600 hover:text-blue-800 underline">Retour à
                    l'index</a>
            </div>
        @endif
    </div>
</x-app-layout>
