<x-app-layout>
    <x-slot name="spectacle">
    </x-slot>

    <h1 class="text-4xl font-bold text-gray-800 mb-4">{{$show->title}}</h1>
    <div class="max-w-4xl mx-auto px-4 py-8 flex gap-5">
        @if($show->poster_url)
            <img src="{{ $show->poster_url }}" alt="{{ $show->title }}"
                 class="max-w-full h-auto rounded-lg shadow-md mb-4">
        @endif
        <div class="self-center">
            <p class="text-gray-700 mb-4"><span class="font-bold">Description : </span>{{$show->description}}</p>
            <p class="font-medium text-gray-600 self"><span class="font-bold">Durée : </span>{{$show->duration}} Minutes
            </p>
        </div>


    </div>

    @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
        <div class="my-6 text-center">
            <a href="{{ route('show.create') }}" class="button-validate">
                Ajouter un nouveau spectacle
            </a>
        </div>
    @endif
</x-app-layout>
