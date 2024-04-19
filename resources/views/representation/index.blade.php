<x-app-layout>
    <x-slot name="index">
    </x-slot>
    <h1 class="text-4xl font-bold">Liste des représentations</h1>
    <div class=" flex flex-col gap-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Spectacle
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Heure
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Salle de spectacle
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>

            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($representations as $representation)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a class="underline"
                           href="{{route('show.show', $representation->show->id)}}">{{$representation->show->title}}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{date('d-m-Y',strtotime($representation->schedule))}}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        {{date('H:i',strtotime($representation->schedule))}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a class="underline"
                           href="{{route('location.show', $representation->location->id)}}">{{$representation->location->designation}}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap flex gap-3">

                        <a href="{{route('representation.show', $representation->id)}}"><i
                                class="fa-solid fa-eye button-validate"></i></a>
                        @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
                            <form method="post" action="{{route('representation.destroy', $representation->id)}}">
                                @csrf
                                @method('DELETE')
                                <button><i class="fa-solid fa-trash button-cancel"></i></button>

                            </form>
                            <a href="{{route('representation.edit', $representation->id)}}"><i
                                    class="fa-solid fa-pencil button-modify"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(Auth::user() && Auth::user()->roles->contains('role', 'admin'))
            <div class="self-center">
                <a class="button-validate" href="{{route('representation.create')}}">Ajouter une nouvelle representation</a>
            </div>
        @endif
    </div>
</x-app-layout>
