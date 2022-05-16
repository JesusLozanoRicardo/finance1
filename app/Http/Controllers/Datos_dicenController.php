<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_dicen;
class Datos_dicenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos_dicen = null;
        $datos_dicen1 = Datos_dicen::all();
        return view("admin.datos_dicen",compact("datos_dicen","datos_dicen1"))->with('fireAlert',false);

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
        $datos_dicen = new Datos_dicen();
        $datos_dicen->texto1=$request->texto1;
        $datos_dicen->texto2=$request->texto2;
        $datos_dicen->texto3=$request->texto3;
        $datos_dicen->save();
        $datos_dicen = null;
        //$carrusel = null;
        $datos_dicen1 = Datos_dicen::all();
        return view("admin.datos_dicen",compact("datos_dicen","datos_dicen1"))->with('fireAlert', false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos_dicen = Datos_dicen::find($id);
        $datos_dicen1 = Datos_dicen::all();
        return view("admin.datos_dicen",compact("datos_dicen","datos_dicen1"))->with('fireAlert', false);

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
        $datos_dicen = Datos_dicen::find($id);

        $datos_dicen->texto1=$request->texto1;
        $datos_dicen->texto2=$request->texto2;
        $datos_dicen->texto3=$request->texto3;
        $datos_dicen->save();
        $datos_dicen1 = Datos_dicen::all();
        $datos_dicen = null;
        return view("admin.datos_dicen",compact("datos_dicen","datos_dicen1"))->with('fireAlert', false);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos_dicen = Datos_dicen::find($id);
        $datos_dicen->delete();
        $datos_dicen = null;
        $datos_dicen1 = Datos_dicen::all();
        return view("admin.datos_dicen",compact("datos_dicen","datos_dicen1"))->with('fireAlert',true);

    }
}
