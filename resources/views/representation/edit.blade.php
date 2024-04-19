<x-app-layout>
    <x-slot name="modify">
        Modifier
    </x-slot>
    <h2 class="text-xl font-bold my-4">Modifier une representation</h2>
    <form action="{{ route('representation.update', $representation->id) }}" method="post" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="show" class="block text-sm font-medium text-gray-700">Spectacle</label>
            <select id="show" name="show_id">
                <option value="">--Please choose an option--</option>
                @foreach($shows as $show)
                    <option value="{{$show->id}}">{{$show->title}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="designation" class="block text-sm font-medium text-gray-700">Salle</label>
            <select id="location" name="location_id">
                <option value="">--Please choose an option--</option>
                @foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->designation}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="time">Heure</label>
            <input name="schedule_time" id="time" type="time" value="{{old('schedule',date('H:i', strtotime($representation->schedule)))}}">
        </div>
        <div>
            <label for="date">Date</label>
            <input name="schedule_date" id="date" type="date" value="{{old('schedule',date('Y-m-d', strtotime($representation->schedule)))}}">
        </div>

        <button type="submit" class="button-validate">
            Ajouter
        </button>
        <a href="{{ route('representation.index', $representation->id) }}" class="button-cancel">
            Annuler
        </a>

    </form>

    @if ($errors->any())
        <div class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700">
            <h2 class="font-bold">Liste des erreurs de validation</h2>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('artist.index') }}" class="block mt-4 underline text-blue-600 hover:text-blue-800">Retour à l'index</a>
</x-app-layout>
