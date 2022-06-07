<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(5);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::orderBy('id')->get();
        return view('courses.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'unique:courses,nombre'],
            'descripcion'=>['required', 'string', 'min:5'],
            'activo'=>['required'],
            'category_id'=>['required'],
            'image'=>['required', 'image', 'max:2048']
        ]);

        $imagen = $request->image->store('img');

        Course::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'activo'=>$request->activo,
            'category_id'=>$request->category_id,
            'image'=>$imagen
        ]);

        return redirect()->route('courses.index')->with('info', 'Curso creado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $categorias = Category::orderBy('id')->get();
        return view('courses.show', compact('course', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categorias = Category::orderby('id')->get();
        return view('courses.edit', compact('course', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
         $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'unique:courses,nombre,'.$course->id],
            'descripcion'=>['required', 'string', 'min:5'],
            'activo'=>['required'], 
            'category_id'=>['required'], 
            'image'=>['nullable', 'image', 'max:2048']
        ]);

        $imagen = $course->image;

        if($request->image){
            Storage::delete($course->image);
            $imagen = $request->image->store('img');
        }

        $course->update([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'activo'=>$request->activo,
            'category_id'=>$request->category_id,
            'image'=>$imagen
        ]);

        return redirect()->route('courses.index')->with('info', 'Curso Actualizado con Éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $imagen = $course->image;
        
        Storage::delete($imagen);

        $course->delete();

        return redirect()->route('courses.index')->with('info', 'Curso Eliminado con Éxito');
    }

    public function cambiarActivo(Course $course){
        $activo = $course->activo;
        if($course->activo =='Si'){
            $activo = 2;
        }
        if($course->activo == 'No'){
            $activo = 1;
        }

        $course->update([
            'activo'=>$activo
        ]);

        return redirect()->route('courses.index')->with('info', 'Estado del Curso Actualizado con Éxito');
    }
}
