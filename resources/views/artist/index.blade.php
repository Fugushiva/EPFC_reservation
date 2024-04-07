<x-app-layout>
    <x-slot name="liste">
        liste
    </x-slot>
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Liste des {{ $ressource }}</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Prénom
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($artists as $artist)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $artist->firstname }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $artist->lastname }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('artist.show', $artist->id) }}" class="text-indigo-600 hover:text-indigo-900">Voir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <ul class="mt-4">
        <li>
            <a href="{{ route('artist.create') }}" class="button-validate">Ajouter un artiste</a>
        </li>
    </ul>
</x-app-layout>
