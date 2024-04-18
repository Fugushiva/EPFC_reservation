<x-app-layout>
    <!-- Header Slot pour les éléments spécifiques à la page -->
    <x-slot name="header">
    </x-slot>

    <!-- Titre de la page avec style centralisé et audacieux -->
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">{{$show->title}}</h1>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col md:flex-row items-center gap-8">
        <!-- Affichage de l'affiche du spectacle avec interaction au survol -->
        @if($show->poster_url)
            <img src="{{ $show->poster_url }}" alt="Affiche de {{$show->title}}" class="w-full md:w-1/3 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
        @endif

        <div class="flex-1">
            <!-- Description du spectacle -->
            <p class="text-lg text-gray-700 mb-4">
                <span class="font-semibold">Description :</span> {{$show->description}}
            </p>

            <!-- Durée du spectacle -->
            <p class="text-lg text-gray-600">
                <span class="font-semibold">Durée :</span> {{$show->duration}} minutes
            </p>

            <!-- Liste des représentations avec date et lieu -->
            <div class="mt-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Représentations :</h3>
                @foreach($show->representations as $representation)
                    <p class="text-gray-600">
                        {{$representation->location->designation}} le {{date('d-m-Y à H:i', strtotime($representation->schedule))}}
                    </p>
                    @if(Auth::user())
                        <form method="post" action="{{route('reservation.post')}}">
                            @csrf
                            <button class="button-validate">Réserver</button>
                        </form>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Lien de modification visible uniquement par les administrateurs -->
    @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
        <div class="my-6 text-center">
            <a href="{{ route('show.edit', $show->id) }}" class="button-modify hover:bg-blue-600 transition-colors">
                Modifier
            </a>
        </div>
    @endif
</x-app-layout>
