<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="bg-gray-300 rounded-2xl border shadow-x1 p-10 max-w-lg">
            <div class="flex flex-col items-center">
                <x-form action="{{ route('courses.update', $course)}}" enctype="multipart/form-data">
                    <x-form-input name="nombre" label="Nombre:" value="{{$course->nombre}}" class="rounded" />
                    <x-form-textarea  name="descripcion" label="Descripcion:" default="{{$course->descripcion}}" class="rounded" style="height: 146px;"/>
                    <x-form-group name="activo" label="Activo:" inline>
                        @if($course->activo =='si') 
                        <x-form-radio name="activo" value="si"  label="Si" checked/>
                        <x-form-radio name="activo" value="no" label="No" />
                        @else
                        <x-form-radio name="activo" value="si"  label="Si"/>
                        <x-form-radio name="activo" value="no" label="No" checked/>
                        @endif

                    </x-form-group>


                    <x-form-select label="Categoria:" name="category_id" class="rounded">
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}" @if ($categoria->id == $course->category_id) selected @endif>
                            {{$categoria->nombre}}</option>
                        @endforeach
                    </x-form-select>
                    <x-form-input type="file" id="img" name="image" label="Imagen:" accept="image/*"/>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <div class="flex items-center justify-center w-full mb-4 ">
                            <img id="image" src="{{Storage::url($course->image)}}" class="rounded" />
                        </div>
                    </div>

                    <x-form-submit class="bg-green-600 hover:bg-green-800">
                        <span><i class="fas fa-save"></i> Guardar</span>
                    </x-form-submit>
                </x-form>
            </div>
        </div>
    </div>
    <script>
        //Cambiar imagen 
        document.getElementById("img").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload=(event)=>{
                document.getElementById("image").setAttribute('src', event.target.result)
            };
            reader.readAsDataURL(file);
        }
    </script>
</x-app-layout>