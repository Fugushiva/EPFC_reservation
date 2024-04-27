<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">{{$show->title}}</h1>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col md:flex-row items-center gap-8">
        @if($show->poster_url)
            <img src="{{ $show->poster_url }}" alt="Affiche de {{$show->title}}"
                 class="w-full md:w-1/3 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
        @endif

        <div class="flex-1">
            <p class="text-lg text-gray-700 mb-4">
                <span class="font-semibold">Description :</span> {{$show->description}}
            </p>
            <p class="text-lg text-gray-600">
                <span class="font-semibold">Durée :</span> {{$show->duration}} minutes
            </p>

            <h3 class="text-lg font-semibold text-gray-800 mb-2">Représentations :</h3>
            @foreach($show->representations as $representation)
                <div class="mb-4">
                    <p class="text-gray-600">
                        {{$representation->location->designation}}
                        le {{ date('d-m-Y à H:i', strtotime($representation->schedule)) }}
                    </p>
                    @foreach($representation->representationReservations as $repReservation)
                        <p>Prix: {{$repReservation->price->price}} €</p>
                    @endforeach
                    @if(Auth::user())
                        <form method="post" action="{{route('stripe.checkout')}}">
                            @csrf
                            <input type="hidden" name="representation_id" value="{{ $representation->id }}">
                            <input type="hidden" name="price_id" value="{{ $repReservation->price->id }}">
                            <label for="places">Nombre de places</label>
                            <input type="number" name="quantity" id="places">
                            <button class="button-validate">Réserver</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>



    @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
        <div class="my-6 text-center flex gap-3">
            <a href="{{ route('show.edit', $show->id) }}" class="button-modify hover:bg-blue-600 transition-colors">
                Modifier
            </a>
            <form action="{{route('show.delete', $show->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="button-cancel">Supprimer</button>
            </form>
        </div>
    @endif
</x-app-layout>
