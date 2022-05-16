<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = Header::first();
        return view("admin.header",compact("header"))->with('fireAlert', false);
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
        $header = new Header();
        $header->horario=$request->horario;
        $header->telefono=$request->telefono;
        $header->nombre=$request->nombre;
        $header->texto1=$request->texto1;
        $header->texto2=$request->texto2;
        $header->texto3=$request->texto3;
        $header->texto4=$request->texto4;
        $header->texto5=$request->texto5;
        $header->texto1_contacto=$request->texto1_contacto;
        $header->texto2_contacto=$request->texto2_contacto;
        $header->texto1_nosotros=$request->texto1_nosotros;
        $header->texto2_nosotros=$request->texto2_nosotros;
        $header->texto1_servicios=$request->texto1_servicios;
        $header->texto2_servicios=$request->texto2_servicios;
        $header->save();
        //return "111";
        return view("admin.header",compact("header"))->with('fireAlert', false);
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
        $header = Header::find($id);
        $header->horario=$request->horario;
        $header->telefono=$request->telefono;
        $header->nombre=$request->nombre;
        $header->texto1=$request->texto1;
        $header->texto2=$request->texto2;
        $header->texto3=$request->texto3;
        $header->texto4=$request->texto4;
        $header->texto5=$request->texto5;
        $header->texto1_contacto=$request->texto1_contacto;
        $header->texto2_contacto=$request->texto2_contacto;
        $header->texto1_nosotros=$request->texto1_nosotros;
        $header->texto2_nosotros=$request->texto2_nosotros;
        $header->texto1_servicios=$request->texto1_servicios;
        $header->texto2_servicios=$request->texto2_servicios;

        $header->save();
        return view("admin.header",compact("header"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $header = Header::query()->delete();
        $header=null;
        return view("admin.header",compact("header"))->with('fireAlert', true);
    }
}
