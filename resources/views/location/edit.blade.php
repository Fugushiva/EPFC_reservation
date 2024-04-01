<x-app-layout>
    <x-slot name="edit">
        edit
    </x-slot>
    <form action="{{route('location.update', $location->id)}}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="designation">Salle</label>
            <input type="text" name="designation" id="designation" class="@error('designation') text-red-700 @enderror"
                   @if(old('designation'))
                       value="{{old('designation')}}"
                   @else
                       value="{{$location->designation}}"
                   @endif>
            @error('designation')
            <div class="g-red-500 text-white p-4 rounded-lg w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" class="@error("address") text-red-700 @enderror"
                   @if(old('address'))
                       value="{{old('address')}}"
                   @else
                       value="{{$location->address}}"
                   @endif>
            @error('address')
            <div class="g-red-500 text-white p-4 rounded-lg w-fit">{{$location->address}}</div>
            @enderror
        </div>
        <div>
            <label for="website">Site web</label>
            <input type="text" name="website" id="website" class="@error("website") text-red-700 @enderror"
                   @if(old('website'))
                       value="{{old('website')}}"
                   @else
                       value="{{$location->website}}"
                   @endif>
            @error('website')
                <div class="g-red-500 text-white p-4 rounded-lg w-fit">{{$location->website}}</div>
            @enderror
        </div>
        <div>
            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="phone" id="phone" class="@error("phone") text-red-700 @enderror"
                   @if(old('phone'))
                       value="{{old('website')}}"
                   @else
                       value="{{$location->phone}}"
                   @endif>
            @error('phone')
                <div class="g-red-500 text-white p-4 rounded-lg w-fit">{{$location->phone}}</div>
            @enderror
        </div>
        <div class="container flex gap-2">
            <button class="bg-green-500 w-fit p-1 rounded ">Mettre à jour</button>
            <a href="{{route('location.show', $location->id)}}">annuler</a>
        </div>
    </form>

    @if($errors->any())
        <div>
            <h2 class="text-2xl text-red-700">Liste des erreurs</h2>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
</x-app-layout>
