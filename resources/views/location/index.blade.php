<x-app-layout>
    <x-slot name="index">
        index
    </x-slot>
    <h1 class="text-3xl">Location</h1>

    @foreach($locations as $location)
        <h1 class="text-2xl underline"><a href="{{route('location.show', $location->id)}}">{{$location->designation}}</a></h1>
    @endforeach

    <a href="{{route('location.create')}}">Ajouter une salle</a>
</x-app-layout>
