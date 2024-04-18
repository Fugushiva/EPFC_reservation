<x-app-layout>
    <x-slot name="index">
    </x-slot>
    <h1 class="text-4xl font-bold">Liste des représentations</h1>
    <div class="">
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
                    Localisation
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($representations as $representation)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <!--Date-->
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                       <!--Heure-->
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <!--localisation-->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
