<x-app-layout>
    <!-- component -->
    <section class="antialiased bg-gray-100 text-gray-600 px-4">
        <div class="flex flex-col justify-center h-full">
            <div class="flex flex-row-reverse w-3/4 mb-2">
                <x-jet-button class="bg-blue-500 hover:bg-blue-800">
                    <a href="{{ route('categories.create') }}"><i class="fas fa-plus"></i> Nueva</a>
                </x-jet-button>
            </div>
            <!-- Table -->
            <div class="mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">ID</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Nombre</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Descripcion</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Acciones</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @foreach ($categories as $item)
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="font-medium-text-gray-800">
                                                <div class="flex items-center">
                                                    <div>{{ $item->id }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="font-medium-text-gray-800">
                                                <div class="flex items-center">
                                                    <div>{{ $item->nombre }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{ $item->descripcion }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">
                                                <form action="{{ route('categories.destroy', $item) }}" method="POST">
                                                    <!-- LOS DOS @ SE NECESITAN PARA QUE LARAVEL FUNCIONE -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('categories.edit', $item) }}"
                                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fas fa-edit"></i></a>
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-2 mx-auto">
                {{ $categories->links() }}
            </div>
        </div>
    </section>

</x-app-layout>
