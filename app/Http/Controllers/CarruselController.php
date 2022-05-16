<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrusel;
class CarruselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrusel = null;
        $carrusel1 = Carrusel::all();
        return view("admin.new_carrusel",compact("carrusel","carrusel1"))->with('fireAlert',false);
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
        $carrusel = new Carrusel();
        $carrusel->texto1=$request->texto1;
        $carrusel->texto2=$request->texto2;
        $carrusel->texto3=$request->texto3;
        $carrusel->imagen=$request->imagen;
        $carrusel->save();

        //$carrusel = null;
        $carrusel1 = Carrusel::all();
        return view("admin.new_carrusel",compact("carrusel","carrusel1"))->with('fireAlert', false);
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
      $carrusel = Carrusel::find($id);
      $carrusel1 = Carrusel::all();
      return view("admin.new_carrusel",compact("carrusel","carrusel1"))->with('fireAlert', false);
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
        $carrusel = Carrusel::find($id);

    if($request->hasFile("imagen")){
            $request->validate([
                'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
            ]);
            $imagen = $request->file("imagen");
            $nombreimagen = $id."img_carrusel".".".$imagen->guessExtension();
            $ruta = public_path("images/carrusel/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $carrusel->imagen = $nombreimagen;
            $carrusel->save();
    }else{
        $carrusel->texto1=$request->texto1;
        $carrusel->texto2=$request->texto2;
        $carrusel->texto3=$request->texto3;
        $carrusel->save();
    }
        $carrusel1 = Carrusel::all();
        $carrusel = null;
     //   $carrusel=$carrusel1;
        return view("admin.new_carrusel",compact("carrusel","carrusel1"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrusel = Carrusel::find($id);
        $carrusel->delete();
        $carrusel = null;
        $carrusel1 = Carrusel::all();
        return view("admin.new_carrusel",compact("carrusel","carrusel1"))->with('fireAlert',true);
    }
}
