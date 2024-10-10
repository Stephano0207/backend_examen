<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=Usuarios::all();
            return response()->json($usuarios);


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
       $usuario= new Usuarios();
       $usuario->email=$request->email;
       $usuario->contra=$request->contra;
       $usuario->save();
       return response()->json($usuario,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        try{
            $usuario=Usuarios::findOrFail($id);
            $usuario->email=$request->email;
            $usuario->contra=$request->contra;
        }catch(ModelNotFoundException $ex){
            return response()->json($ex,500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
        $usuario= Usuarios::findOrFail($id);
        $usuario->delete();
        return response()->json(['success'=>true],300);
        }catch(ModelNotFoundException $ex){
            return response()->json($ex,500);
        }

    }
}
