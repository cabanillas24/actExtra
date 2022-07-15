<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
            $alumnos = Alumno::all();
            return response([
                'total_data' => count($alumnos),
                'data' => $alumnos
            ]);
    }

    #diferentes gets mas vale prevenir 
    public function genero (Request $Request)
    {

        $M =  Alumno::where("genero","M")->count();
        $F =  Alumno::where("genero","F")->count();

        return response([
            'hombres'=>$M,
            'womas'=>$F,
        ]);
    }

    public function becados (Request $Request)
    {

        $becado =  Alumno::where("becado","si")->count();
        $sinbecado =  Alumno::where("becado","no")->count();

        return response([
            'si becado'=>$becado,
            'sin becado'=>$sinbecado,
        ]);
    }

    public function horario (Request $Request)
    {

        $matutino =  Alumno::where("horario","matutino")->count();
        $vespertino =  Alumno::where("horario","vespertino")->count();

        return response([
            'turno Matutino'=>$matutino,
            'turno vespertino'=>$vespertino,
        ]);
    }

    public function promedio (Request $Request)
    {
        $aprobados =  Alumno::where("calificacion_prepa",">=", 7)->count();
        $reprobados =  Alumno::where("calificacion_prepa","<=", 6)->count();
        

        return response([
            'reprobados' => $reprobados,
            'aprobados' => $aprobados,
        ]);
    }

    public function problemas_salud (Request $Request)
    {
        $problemas =  Alumno::where("problemas_salud","si")->count();
        $nprobelmas =  Alumno::where("problemas_salud","no")->count();
        

        return response([
            'sin_problemas_salud'=>$nprobelmas,
            'con_problemas_salud'=>$problemas,
        ]);
    }

    #en un solo get
    public function estadisticas (request $request)
    {
        $M =  Alumno::where("genero","M")->count();
        $F =  Alumno::where("genero","F")->count();
        $becado =  Alumno::where("becado","si")->count();
        $sinbecado =  Alumno::where("becado","no")->count();
        $matutino =  Alumno::where("horario","matutino")->count();
        $vespertino =  Alumno::where("horario","vespertino")->count();
        $aprobados =  Alumno::where("calificacion_prepa",">=", 7)->count();
        $reprobados =  Alumno::where("calificacion_prepa","<=", 6)->count();
        $problemas =  Alumno::where("problema_salud","si")->count();
        $nprobelmas =  Alumno::where("problema_salud","no")->count();
        
        return response([
            'hombres'=>$M,
            'womas'=>$F,
            'si becado'=>$becado,
            'sin becado'=>$sinbecado,
            'turno Matutino'=>$matutino,
            'turno vespertino'=>$vespertino,
            'reprobados' => $reprobados,
            'aprobados' => $aprobados,
            'sin_problemas_salud'=>$nprobelmas,
            'con_problemas_salud'=>$problemas,
        ]);


    }
    public function create(Request $Request)
    {
        $data =$this->rules($Request);
        Alumno::create($data);
        return response([
            'message' => 'se creo con exito'
        ]);
    }

    public function show($id)
    {
        $alumno = Alumno::where('_id',$id)->first();
        return response($alumno);
    }

    public function update($id, Request $Request)
    {
            $data = $this->rules($Request);
            Alumno::find($id)->fill($data)->save();
            return response([
                'message' => 'se modifico'
            ]);
    }

    public function delete($id)
    {
            Alumno::find($id)->delete();
            return response([
                'message' => 'Borrado'
            ]);
    }
    protected function rules($Request){
     return $this->validate($Request,[
            'nombre' => 'required',
            'edad' => 'required',
            'genero' => 'required',
            'carrera' => 'required',
            'etnia_indigena' => 'required',
            'horario' => 'required',
            'calificacion_prepa' => 'required',
            'becado' => 'required',
            'problemas_de_salud' => 'required',

        ]);
    }
}
