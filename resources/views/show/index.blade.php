<x-app-layout>
    <x-slot name="index">
        index
    </x-slot>

    <h1 class="text-2xl">Liste de nos spectacles</h1>

    @foreach($shows as $show )
        <h1 class="text-xl underline"><a href="{{route('show.show', $show->id)}}">{{$show->title}}</a></h1>
       <ul>
           @if($show->bookable )
                <li>Il reste de la place</li>
           @else
               <li>Il n'y a plus de place</li>
           @endif
           <li>Prix : {{$show->price}}</li>
       </ul>
        <p> Description : {{$show->description}}</p>
    @endforeach

    <div class="text-blue-700">
        <a class="underline" href="{{route('show.create')}}">Ajouter un nouveau spectacle</a>
    </div>

</x-app-layout>
