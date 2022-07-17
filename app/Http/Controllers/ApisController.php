<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\User;
use App\Models\Genero;
use App\Models\Alquiler;
class ApisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pelicula::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function users(Request $request){
        $users=User::all();
        return response()->json($users);
    }
    public function peliculas(Request $request){
        $peliculas=Pelicula::all();
        return response()->json($peliculas);
    }
    public function alquileres(Request $request){
        $alquileres=Alquiler::all();
        return response()->json($alquileres);
    }
    public function generos(Request $request){
        $generos=Genero::all();
        return response()->json($generos);
    }
    public function socios(Request $request){
        $peliculas = Pelicula::all();
        $generos = Genero::all();
        $data = [];
        foreach($generos as $genero){
            $data['label'][] = $genero->gen_nombre;
            $data['dataP'][] = Pelicula::all()->where('gen_id',$genero->id)->count();
        }
        
        return response()->json($data);
    }



 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
