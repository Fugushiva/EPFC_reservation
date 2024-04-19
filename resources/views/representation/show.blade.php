<x-app-layout>
    <x-slot name="index">
    </x-slot>
    <div class="px-8 py-4">
        <h2 class="text-3xl font-bold text-center my-4">{{$representation->show->title}}</h2>
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
            <p class="text-lg"><span class="font-bold">Description : </span>{{$representation->show->description}}</p>
            <p class="text-lg"><span class="font-bold">Date de représentation : </span>{{date('d/m/Y',strtotime($representation->schedule))}}</p>
            <p class="text-lg"><span class="font-bold">Heure de représentation : </span>{{date('H:i', strtotime($representation->schedule))}}h</p>
            <p class="text-lg"><span class="font-bold">Salle de représentation : </span>{{$representation->location->designation}}, {{$representation->location->address}}</p>
        </div>
    </div>
</x-app-layout>
