<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encabezados_dicen;
class Encabezados_dicenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encabezados_dicen = Encabezados_dicen::first();
        return view("admin.encabezados_dicen",compact("encabezados_dicen"))->with('fireAlert', false);   
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
        $encabezados_dicen = new encabezados_dicen();
        $encabezados_dicen->texto1=$request->texto1;
        $encabezados_dicen->texto2=$request->texto2;
        $encabezados_dicen->texto3=$request->texto3;
        $encabezados_dicen->save();
        return view("admin.encabezados_dicen",compact("encabezados_dicen"))->with('fireAlert', false);
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
        $encabezados_dicen = Encabezados_dicen::find($id);
        $encabezados_dicen->texto1=$request->texto1;
        $encabezados_dicen->texto2=$request->texto2;
        $encabezados_dicen->texto3=$request->texto3;
        $encabezados_dicen->save();
        return view("admin.encabezados_dicen",compact("encabezados_dicen"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encabezados_dicen = Encabezados_dicen::query()->delete();
        $encabezados_dicen=null;
        return view("admin.encabezados_dicen",compact("encabezados_dicen"))->with('fireAlert', true);
    }
}
