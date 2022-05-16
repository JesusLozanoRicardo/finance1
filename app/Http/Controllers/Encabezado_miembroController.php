<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encabezado_miembro;
class Encabezado_miembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encabezado_miembros = Encabezado_miembro::first();
        return view("admin.encabezado_miembros",compact("encabezado_miembros"))->with('fireAlert', false);   
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
        $encabezado_miembros = new Encabezado_miembro();
        $encabezado_miembros->texto1=$request->texto1;
        $encabezado_miembros->texto2=$request->texto2;
        $encabezado_miembros->texto3=$request->texto3;
        $encabezado_miembros->save();
        return view("admin.encabezado_miembros",compact("encabezado_miembros"))->with('fireAlert', false);

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
        $encabezado_miembros = Encabezado_miembro::find($id);
        $encabezado_miembros->texto1=$request->texto1;
        $encabezado_miembros->texto2=$request->texto2;
        $encabezado_miembros->texto3=$request->texto3;
        $encabezado_miembros->save();
        return view("admin.encabezado_miembros",compact("encabezado_miembros"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encabezado_miembros = Encabezado_miembro::query()->delete();
        $encabezado_miembros=null;
        return view("admin.encabezado_miembros",compact("encabezado_miembros"))->with('fireAlert', true);

    }
}
