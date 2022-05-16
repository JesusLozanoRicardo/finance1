<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dato;
class DatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = null;
        $datos1 = Dato::all();
        return view("admin.datos_crecimiento",compact("datos","datos1"))->with('fireAlert',false);
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
        $datos = new Dato();
        $datos->texto1=$request->texto1;
        $datos->texto2=$request->texto2;
        $datos->save();

        //$carrusel = null;
        $datos1 = Dato::all();
        $datos=null;
        return view("admin.datos_crecimiento",compact("datos","datos1"))->with('fireAlert', false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $datos = Dato::find($id);
      $datos1 = Dato::all();
      return view("admin.datos_crecimiento",compact("datos","datos1"))->with('fireAlert', false);
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
        $datos = Dato::find($id);
        $datos->texto1=$request->texto1;
        $datos->texto2=$request->texto2;
        $datos->save();
        $datos1 = Dato::all();
        $datos = null;
        return view("admin.datos_crecimiento",compact("datos","datos1"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = Dato::find($id);
        $datos->delete();
        $datos = null;
        $datos1 = Dato::all();
        return view("admin.datos_crecimiento",compact("datos","datos1"))->with('fireAlert',true);
    }
}
