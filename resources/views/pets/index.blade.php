<!--Siempre iniciamos los componentes con x-->
<x-layout>
    <x-slot:heading>
       Mascotas
    </x-slot:heading>
    <section class="min-w-full m-4 flex justify-end">
        <a href="/pet/create" class="text-lg hover:text-green-800 ">Registrar Mascota <i class="fa-solid fa-plus"></i></a>
    </section>
    @if (isset($pets))
        <table
            class=" m-4 min-w-full divide-y divide-gray-200 border border-gray-300 rounded-xl shadow-md overflow-hidden">
            <thead class="dark:bg-gray-800">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-sm font-semibold text-gray-100 uppercase tracking-wider">Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-sm font-semibold text-gray-100 uppercase tracking-wider">Specie
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-sm font-semibold text-gray-100 uppercase tracking-wider">Adopted
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-sm font-semibold text-gray-100 uppercase tracking-wider">Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($pets as $pet)
                    <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $pet->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $pet->specie->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $pet->adopted ? 'Yes' : 'No' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <a href="/pet/{{ $pet->id }}" class="text-lg hover:text-green-800"><i class="fa-solid fa-eye"></i></a>
                        <a href="/pet/{{ $pet->id }}" class="text-lg hover:text-green-800"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $pets->links() }}
        </div>
    @else
        <p>No hay mascotas registradas</p>
    @endif
    <div>
    </div>
</x-layout>
