<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="bg-gray-300 rounded-2xl border shadow-x1 p-10 max-w-lg">
            <div class="flex flex-col items-center">
                <x-form action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    <x-form-input name="nombre" label="Nombre:" class="rounded" />
                    <x-form-textarea name="descripcion" label="Descripcion:" class="rounded" />
                    <x-form-group name="activo" label="Activo:" inline>
                        <x-form-radio name="activo" value="si" label="Si" />
                        <x-form-radio name="activo" value="no" label="No" />
                    </x-form-group>


                    <x-form-select label="Categoria:" name="category_id" class="rounded">
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </x-form-select>
                    <x-form-input type="file" name="image" label="Imagen:" accept="image/*"/>

                    <x-form-submit class="bg-green-600 hover:bg-green-800">
                        <span><i class="fas fa-save"></i> Guardar</span>
                    </x-form-submit>
                </x-form>
            </div>
        </div>
    </div>
</x-app-layout>
