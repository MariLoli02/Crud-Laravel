<x-app-layout>
    <div class="container h-screen max-w-full">
        <div class="m-auto my-28 w-96 max-w-lg items-center justify-center overflow-hidden rounded-2xl bg-slate-200 shadow-xl">
            <div class="h-24 bg-white"></div>
            <div class="-mt-20 flex justify-center">
                <img class="h-32 rounded-full" src="{{ Storage::url($course->image) }}" />
            </div>
            <div class="mt-5 mb-1 px-3 text-center text-lg">{{ $course->nombre }}</div>
            <div class="mb-5 px-3 text-center text-sky-500">{{ $course->descripcion }}</div>
            <blockquote>
                <p class="mx-2 mb-7 text-center text-base">Activo: {{ $course->activo }}</p>
                @foreach ($categorias as $categoria)
                    @if ($categoria->id == $course->category_id)
                        <p class="mx-2 mb-7 text-center text-base">{{ $categoria->nombre }}</p>
                    @endif
                @endforeach
            </blockquote>
            <a href="{{route('courses.index')}}" class="mx-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-backward"></i> Volver
            </a>
        </div>
    </div>
</x-app-layout>
