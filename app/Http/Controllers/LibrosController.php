<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros=Libros::all();
        return response()->json($libros);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro= new Libros();
        $libro->titulo=$request->titulo;
        $libro->editorial=$request->editorial;
        $libro->ano_publicacion=$request->ano_publicacion;
        $libro->cantidad=$request->cantidad;
        $libro->estado=1;
        $libro->save();

        return response()->json($libro,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $libro= Libros::findOrFail($id);
       return response()->json($libro,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      try{  $libro= Libros::findOrFail($id);
        $libro->titulo=$request->titulo;
        $libro->editorial=$request->editorial;
        $libro->ano_publicacion=$request->ano_publicacion;
        $libro->cantidad=$request->cantidad;
        $libro->estado=1;
        $libro->save();

        return response()->json($libro,200);
    }catch(ModelNotFoundException $ex){
        return response()->json($ex,500);
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

            $libro= Libros::findOrFail($id);
            $libro->delete();
           return 204;

    }
}
