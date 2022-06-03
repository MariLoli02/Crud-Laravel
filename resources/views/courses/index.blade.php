<x-app-layout>
    <!-- component -->
    <section class="antialiased bg-gray-100 text-gray-600 px-4">
        <div class="flex flex-col justify-center h-full">
            <div class="flex flex-row-reverse w-5/6 mb-2">
                <x-jet-button class="bg-blue-500 hover:bg-blue-800">
                    <a href="{{ route('courses.create') }}"><i class="fas fa-plus"></i> Nueva</a>
                </x-jet-button>
            </div>
            <!-- Table -->
            <div class="mx-auto bg-white w-3/4 shadow-lg rounded-sm border border-gray-200">
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Nombre</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Descripcion</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Activo</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Acciones</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @foreach ($courses as $item)
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="font-medium-text-gray-800">
                                                <div class="flex items-center">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{Storage::url($item->image)}}"/>
                                                    <div class="mx-4">{{ $item->nombre }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-left">{{ $item->descripcion }}</div>
                                        </td>
                                        <td class="p-2">
                                            <div
                                                class="text-center @if ($item->activo == 'Si') text-green-400 @else text-red-400 @endif">
                                                {{ $item->activo }}</div>
                                        </td>

                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">
                                                <form action="{{ route('courses.destroy', $item) }}" method="POST">
                                                    <!-- LOS DOS @ SE NECESITAN PARA QUE LARAVEL FUNCIONE -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('courses.edit', $item) }}"
                                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fas fa-edit"></i></a>
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fas fa-trash"></i></button>
                                                    <a href="{{ route('courses.show', $item) }}"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fas fa-info"></i></a>
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
                {{ $courses->links() }}
            </div>
        </div>
    </section>

</x-app-layout>
