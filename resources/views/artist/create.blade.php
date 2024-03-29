

@section('title', 'Ajouter un artiste')

@section('content')
    <h2>Ajouter un artiste</h2>
    <!--On lui précise que ça devra être la route update qui devra être appelée lors de l'envoi-->
    <form action="{{ route('artist.store') }}" method="post">
        @csrf
        <div>
            <label for="firstname">Prénom</label>
            <input id="firstname" type="text" name="firstname"
            @if(old('firstname'))
                value="{{ old('firstname') }}"
            @endif
            class="@error('firstname') is-invalid @enderror" >
            @error('firstname')
                <div class="alert alert-danger"> {{ $message }}</div>
            @enderror

        </div>
        <div>
            <label for="lastname">Nom</label>
            <input id="lastname" type="text" name="lastname"
                   @if(old("lastname"))
                       value="{{old('lastname')}}"
                   @endif
                   class="@error('lastname') is-invalid @enderror">

            @error('lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button>Ajouter</button>
        <a href="{{route('artist.index')}}">Annuler</a>
    </form>

    @if($errors->any())
        <div class="alert alert-danger">
            <h2>Liste des erreurs de validation</h2>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('artist.index') }}">Retour à l'index</a>
@endsection
