<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encabezado;
class EncabezadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encabezado = Encabezado::first();
        return view("admin.encabezado_crecimiento",compact("encabezado"))->with('fireAlert', false);   
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
        $encabezado = new Encabezado();
        $encabezado->texto1=$request->texto1;
        $encabezado->texto2=$request->texto2;
        $encabezado->texto3=$request->texto3;
        $encabezado->texto4=$request->texto4;
        $encabezado->save();
        return view("admin.encabezado_crecimiento",compact("encabezado"))->with('fireAlert', false);
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
        $encabezado = Encabezado::find($id);
        $encabezado->texto1=$request->texto1;
        $encabezado->texto2=$request->texto2;
        $encabezado->texto3=$request->texto3;
        $encabezado->texto4=$request->texto4;
        $encabezado->save();
        return view("admin.encabezado_crecimiento",compact("encabezado"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $encabezado = Encabezado::query()->delete();
                $encabezado=null;
                return view("admin.encabezado_crecimiento",compact("encabezado"))->with('fireAlert', true);
    }
}
