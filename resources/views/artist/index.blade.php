





<x-app-layout>
    <x-slot name="liste">
       liste
    </x-slot>
    <h1>liste des {{$ressource}}</h1>
        <ul>
            <li><a href="{{ route('artist.create') }}" class="button-validate">Ajouter</a></li>
        </ul>
        <table>
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artists as $artist)
                    <tr>
                        <td>{{ $artist->firstname }}</td>
                        <td>
                            <a href="{{route('artist.show', $artist->id)}}">{{ $artist->lastname }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</x-app-layout>
