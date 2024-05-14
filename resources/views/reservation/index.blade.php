<x-app-layout>
    <div class="p-5">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Mes réservations</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Spectacle</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Date</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Salle</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">action</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach($representationReservations as $rr)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4">
                            <a class="underline" href="{{ route('show.show', $rr->representation->show->id) }}">
                                {{ $rr->representation->show->title }}
                            </a>
                        </td>
                        <td class="py-3 px-4">{{ $rr->representation->schedule }}</td>
                        <td class="py-3 px-4">
                            <a class='underline' href="{{ route('location.show', $rr->representation->location->id) }}">
                                {{ $rr->representation->location->designation }}
                            </a>
                        </td>
                        <td>
                            <form method="post" action="{{route('reservation.destroy', $rr->reservation->id )}}">
                                @csrf
                                @method('DELETE')
                                <button class="button-cancel">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
