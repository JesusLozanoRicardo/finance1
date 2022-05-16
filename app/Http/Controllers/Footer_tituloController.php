<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer_titulo;
class Footer_tituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer_titulo = Footer_titulo::first();
        return view("admin.footer_titulo",compact("footer_titulo"))->with('fireAlert', false);
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
        $footer_titulo = new Footer_titulo();
        $footer_titulo->titulo=$request->titulo;
        $footer_titulo->titulo1=$request->titulo1;
        $footer_titulo->descripcion=$request->descripcion;
        $footer_titulo->save();
        //return "111";
        return view("admin.footer_titulo",compact("footer_titulo"))->with('fireAlert', false);
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
        $footer_titulo = Footer_titulo::find($id);
        $footer_titulo->titulo=$request->titulo;
        $footer_titulo->titulo1=$request->titulo1;
        $footer_titulo->descripcion=$request->descripcion;
        $footer_titulo->save();
        return view("admin.footer_titulo",compact("footer_titulo"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer_titulo = Footer_titulo::query()->delete();
        $footer_titulo=null;
        return view("admin.footer_titulo",compact("footer_titulo"))->with('fireAlert', true);
    }
}
