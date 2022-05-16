<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrusel_contacto;
class Carrusel_contactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrusel_contactos = Carrusel_contacto::first();
        return view("admin.carrusel_contactos",compact("carrusel_contactos"))->with('fireAlert', false);   
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
            $nombreimagen = "img_carrusel_contactos".".".$imagen->guessExtension();
            $ruta = public_path("images/carrusel_contactos/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $carrusel_contactos = new Carrusel_contacto();
            $carrusel_contactos->imagen = $nombreimagen;
            $carrusel_contactos->save();  
        return view("admin.carrusel_contactos",compact("carrusel_contactos"))->with('fireAlert', false);
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
        $carrusel_contactos = Carrusel_contacto::find(1);
        $carrusel_contactos->imagen = "";
        if($request->hasFile("imagen")){
            $request->validate([
                'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
            ]);    
           
            $imagen = $request->file("imagen");
            $nombreimagen = "img_carrusel_contactos".".".$imagen->guessExtension();
            $ruta = public_path("images/carrusel_contactos/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $carrusel_contactos->imagen = $nombreimagen;
            
        }
        $carrusel_contactos->save(); 
        return view("admin.carrusel_contactos",compact("carrusel_contactos"))->with('fireAlert', false);

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
