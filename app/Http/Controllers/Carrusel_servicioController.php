<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrusel_servicio;
class Carrusel_servicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrusel_servicios = Carrusel_servicio::first();
        return view("admin.carrusel_servicios",compact("carrusel_servicios"))->with('fireAlert', false);   

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
            $nombreimagen = "img_carrusel_servicios".".".$imagen->guessExtension();
            $ruta = public_path("images/carrusel_servicios/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $carrusel_servicios = new Carrusel_servicio();
            $carrusel_servicios->imagen = $nombreimagen;
            $carrusel_servicios->save();  
        return view("admin.carrusel_servicios",compact("carrusel_servicios"))->with('fireAlert', false);
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
        $carrusel_servicios = Carrusel_servicio::find($id);
        
        $carrusel_servicios->imagen = "";
        if($request->hasFile("imagen")){
            $request->validate([
                'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
            ]);    
            $imagen = $request->file("imagen");
            $nombreimagen = "img_carrusel_servicios".".".$imagen->guessExtension();
            $ruta = public_path("images/carrusel_servicios/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $carrusel_servicios->imagen = $nombreimagen;
         }
         $carrusel_servicios->save();  
         return view("admin.carrusel_servicios",compact("carrusel_servicios"))->with('fireAlert', false);
         
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
