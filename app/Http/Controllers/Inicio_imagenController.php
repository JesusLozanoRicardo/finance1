<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inicio_imagen;
class Inicio_imagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inicio_imagenes = Inicio_imagen::first();
        return view("admin.inicio_imagenes",compact("inicio_imagenes"))->with('fireAlert', false);
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
        if($request->hasFile("imagen")){
            $request->validate([
                'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
            ]);
            $imagen = $request->file("imagen");
            $nombreimagen = "img_inicio".".".$imagen->guessExtension();
            $ruta = public_path("images/inicio/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $inicio_imagenes = new Inicio_imagen();
            $inicio_imagenes->imagen = $nombreimagen;
            $inicio_imagenes->save();
        return view("admin.inicio_imagenes",compact("inicio_imagenes"))->with('fireAlert', false);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $inicio_imagenes = Inicio_imagen::find($id);
        $inicio_imagenes->imagen = "";
        if($request->hasFile("imagen")){
            $request->validate([
                'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
            ]);
            $imagen = $request->file("imagen");
            $nombreimagen = "img_inicio".".".$imagen->guessExtension();
            $ruta = public_path("images/inicio/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $inicio_imagenes->imagen = $nombreimagen;
        }
        $inicio_imagenes->save();
        return view("admin.inicio_imagenes",compact("inicio_imagenes"))->with('fireAlert', false);
       
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
