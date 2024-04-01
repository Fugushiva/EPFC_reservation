<x-app-layout>
    <x-slot name="create">
        create
    </x-slot>
    <h1 class="text-3xl">Ajouter une salle</h1>
    <form method="post" , action="{{route('location.store')}}">
        @csrf
        <div>
            <label for="designation">nom</label>
            <input type="text" name="designation" id="designation" class="@error('designation') text-red-700 @enderror">
            @error('designation')
            <div class="bg-red-600 rounded w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" class="@error('address') text-red-700 @enderror">
            @error('designation')
            <div class="bg-red-600 rounded w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="website">Site web</label>
            <input type="text" name="website" id="website" class="@error('website') text-red-700 @enderror">
            @error("website")
            <div class="bg-red-600 rounded w-fit">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="phone" id="phone" class="@error('phone') text-red-700 @enderror">
            @error('phone')
            <div class="bg-red-600 rounded w-fit">{{$message}}</div>
            @enderror
        </div>
        <div class="container flex gap-2">
            <button class="bg-green-500 rounded w-fit p-1">créer</button>
            <a class="bg-red-600 rounded w-fit p-1 text-white" href="{{route('location.index')}}">retour à l'index</a>
        </div>
    </form>

    @if($errors->any())
        <div>
            <h2 class="text-2xl text-red-700"></h2>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
</x-app-layout>
