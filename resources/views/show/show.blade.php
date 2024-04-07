<x-app-layout>
    <x-slot name="spectacle">
    </x-slot>
    <h1 class="text-2xl">{{$show->title}}</h1>
    @if($show->poster_url)
        <img src="{{$show->posterr_url}}">
    @endif
    <ul class="container flex gap-1">
        <li>{{$show->duration}} Minutes</li>
        <a class="button-modify" href="{{route('show.edit', $show->id)}}">modifier</a>
    </ul>
    <p class="">{{$show->description}}</p>

    <form action="{{route('show.delete', $show->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="button-cancel">supprimer</button>
    </form>
</x-app-layout>
