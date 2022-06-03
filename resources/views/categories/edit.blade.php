<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="bg-gray-300 rounded-2xl border shadow-x1 p-10 max-w-lg">
            <div class="flex flex-col items-center">
                <p class="text-gray-700">EDITAR CATEGORÍA</p>
                <x-form action="{{route('categories.update', $category)}}" method="PUT">
                    <x-form-input name="nombre" label="Nombre" default="{{$category->nombre}}"/>
                    <x-form-textarea name="descripcion" label="Descripcion" default="{{$category->descripcion}}"/>

                    <a href="{{route('categories.index')}}" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3"><i class="fas fa-backward"></i> Volver</a>
                    <x-jet-button type="submit" class="bg-green-400 hover:bg-green-700 rounded mt-3"><i class="fas fa-save"></i>Guardar</x-jet-button>
                </x-form>
            </div>
        </div>
    </div>
</x-app-layout>