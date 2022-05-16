<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicio = null;
        $servicio1 = Servicio::all();
        return view("admin.servicio",compact("servicio","servicio1"))->with('fireAlert',false);
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
        $servicio = new Servicio();
        $servicio->texto1=$request->texto1;
        $servicio->texto2=$request->texto2;
        $servicio->imagen=$request->imagen;
        $servicio->save();

        //$carrusel = null;
        $servicio1 = Servicio::all();
        return view("admin.servicio",compact("servicio","servicio1"))->with('fireAlert', false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);
        $servicio1 = Servicio::all();
        return view("admin.servicio",compact("servicio","servicio1"))->with('fireAlert', false);
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
        $servicio = Servicio::find($id);

        if($request->hasFile("imagen")){
                $request->validate([
                    'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
                ]);
                $imagen = $request->file("imagen");
                $nombreimagen = $id."img_servicio".".".$imagen->guessExtension();
                $ruta = public_path("images/servicio/");
                copy($imagen->getRealPath(),$ruta.$nombreimagen);
                $servicio->imagen = $nombreimagen;
                $servicio->save();
        }else{
            $servicio->texto1=$request->texto1;
            $servicio->texto2=$request->texto2;
            $servicio->save();
        }
            $servicio1 = Servicio::all();
            $servicio = null;
            return view("admin.servicio",compact("servicio","servicio1"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        $servicio = null;
        $servicio1 = Servicio::all();
        return view("admin.servicio",compact("servicio","servicio1"))->with('fireAlert',true);
    }
}
