<x-app-layout>
    <x-slot name="index">index</x-slot>
    <x-search-show-form>

    </x-search-show-form>
    <h1 class="text-3xl font-bold text-gray-800 my-6 text-center">Liste de nos spectacles</h1>

    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($shows as $show)
            <div class="border border-gray-300 rounded-lg shadow-lg p-4 flex flex-col items-center">
                <div class="w-25 h-25 overflow-hidden ">
                    <img src="{{ asset($show->poster_url) }}" alt="{{ $show->title }}"
                         class="object-cover w-full h-full">
                </div>
                <h2 class="text-xl font-bold mt-4">
                    <a href="{{ route('show.show', $show->id) }}" class="hover:underline">{{ $show->title }}</a>
                </h2>
                <p class="text-gray-600 my-2 text-center">{{ $show->description }}</p>
                <p class="font-semibold">{{ $show->location }}</p>
                <p>{{ $show->price }} €</p>
                <p>{{ $show->date }}</p>
            </div>
        @endforeach
    </div>

    @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
        <div class="my-6 text-center">
            <a href="{{ route('show.create') }}" class="button-validate">
                Ajouter un nouveau spectacle
            </a>
        </div>
    @endif
</x-app-layout>
