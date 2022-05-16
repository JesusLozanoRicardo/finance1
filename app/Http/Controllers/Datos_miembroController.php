<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_miembro;
class Datos_miembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos_miembros = null;
        $datos_miembros1 = Datos_miembro::all();
        return view("admin.datos_miembros",compact("datos_miembros","datos_miembros1"))->with('fireAlert',false);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos_miembros = new Datos_miembro();
        $datos_miembros->texto1=$request->texto1;
        $datos_miembros->texto2=$request->texto2;
        $datos_miembros->texto3=$request->texto3;
        $datos_miembros->save();

        //$carrusel = null;
        $datos_miembros1 = Datos_miembro::all();
        return view("admin.datos_miembros",compact("datos_miembros","datos_miembros1"))->with('fireAlert', false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos_miembros = Datos_miembro::find($id);
        $datos_miembros1 = Datos_miembro::all();
        return view("admin.datos_miembros",compact("datos_miembros","datos_miembros1"))->with('fireAlert', false);

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
        $datos_miembros = Datos_miembro::find($id);

        if($request->hasFile("imagen")){
            $request->validate([
                'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
            ]);
            $imagen = $request->file("imagen");
            $nombreimagen = $id."img_miembros".".".$imagen->guessExtension();
            $ruta = public_path("images/miembros/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $datos_miembros->imagen = $nombreimagen;
            $datos_miembros->save();
    }else{
        $datos_miembros->texto1=$request->texto1;
        $datos_miembros->texto2=$request->texto2;
        $datos_miembros->texto3=$request->texto3;
        $datos_miembros->save();
     }
        $datos_miembros1 = Datos_miembro::all();
        $datos_miembros = null;
        return view("admin.datos_miembros",compact("datos_miembros","datos_miembros1"))->with('fireAlert', false);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos_miembros = Datos_miembro::find($id);
        $datos_miembros->delete();
        $datos_miembros = null;
        $datos_miembros1 = Datos_miembro::all();
        return view("admin.datos_miembros",compact("datos_miembros","datos_miembros1"))->with('fireAlert',true);

    }
}
