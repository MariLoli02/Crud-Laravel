<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $categorias = [
            'Programacion'=>'Esto es un curso de programacion orientado a objetos',
            'Bases de Datos'=>'Esto es un curso orientado a saber el funcionamiento de las bbdd',
            'Sistemas'=>'Esto es un curso orientado a saber el funcionamiento de los sistemas operativos',
            'Diseño'=>'Esto es un curso orientado al aprendizaje sobre el diseño de paginas web responsive',
            'Redes'=>'Esto es un curso orientado al aprendizaje sobre las redes'
        ];


        foreach($categorias as $k=>$v){
            Category::create([
                'nombre'=> $k,
                'descripcion'=>$v
            ]);
        }
    }
}
