<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrusel_nosotro;
class Carrusel_nosotroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrusel_nosotros = Carrusel_nosotro::first();
        return view("admin.carrusel_nosotros",compact("carrusel_nosotros"))->with('fireAlert', false);
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
           // return "imagen";
            $request->validate([
                'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
            ]);
            
            $imagen1 = $request->file("imagen1");
            $nombreimagen1 = "img_carrusel_nosotros1".".".$imagen->guessExtension();
            $ruta = public_path("images/carrusel_nosotros/");
            copy($imagen1->getRealPath(),$ruta.$nombreimagen1);
            $carrusel_nosotros = new Carrusel_nosotro();
            $carrusel_nosotros->imagen1 = $nombreimagen1;
            $carrusel_nosotros->save();
        return view("admin.carrusel_nosotros",compact("carrusel_nosotros"))->with('fireAlert', false);
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
        $carrusel_nosotros = Carrusel_nosotro::find(1);
        if($id==1){
            $carrusel_nosotros->imagen ="";
            if($request->hasFile("imagen")){
                $request->validate([
                    'imagen' => 'image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
                ]);
              
                $imagen = $request->file("imagen");
                $nombreimagen = "img_carrusel_nosotros".".".$imagen->guessExtension();
                $ruta = public_path("images/carrusel_nosotros/");
                copy($imagen->getRealPath(),$ruta.$nombreimagen);
                $carrusel_nosotros->imagen = $nombreimagen;
            }
        }else if($id==2){
            
            $carrusel_nosotros->imagen1 ="";
            if($request->hasFile("imagen1")){
                $request->validate([
                    'imagen' => 'image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
                ]);
                $imagen = $request->file("imagen1");
                $nombreimagen = "img_carrusel_nosotros1".".".$imagen->guessExtension();
                $ruta = public_path("images/carrusel_nosotros/");
                copy($imagen->getRealPath(),$ruta.$nombreimagen);
                $carrusel_nosotros->imagen1 = $nombreimagen;
            }
        }
        $carrusel_nosotros->save();
        return view("admin.carrusel_nosotros",compact("carrusel_nosotros"))->with('fireAlert', false);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrusel_nosotros = Carrusel_nosotro::query()->delete();
        $carrusel_nosotros=null;
        return view("admin.carrusel_nosotros",compact("carrusel_nosotros"))->with('fireAlert', true);
    }
}
