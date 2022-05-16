<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacto = Contacto::first();
        return view("admin.contacto",compact("contacto"))->with('fireAlert', false);    
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
        $contacto = new Contacto();
        $contacto->texto1=$request->texto1;
        $contacto->texto2=$request->texto2;
        $contacto->texto3=$request->texto3;
        $contacto->save();
        $contacto1 = Contacto::all();
        return view("admin.contacto",compact("contacto","contacto1"))->with('fireAlert', false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = Contacto::find($id);
        $contacto1 = Contacto::all();
        return view("admin.contacto",compact("contacto","contacto1"))->with('fireAlert', false);
  
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
        $contacto = Contacto::find($id);
        $contacto->texto1=$request->texto1;
        $contacto->texto2=$request->texto2;
        $contacto->texto3=$request->texto3;
        $contacto->save();
        $contacto1 = Contacto::all();
        return view("admin.contacto",compact("contacto","contacto1"))->with('fireAlert', false);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = Contacto::find($id);
        $contacto->delete();
        $contacto = null;
        $contacto1 = Contacto::all();
        return view("admin.contacto",compact("contacto","contacto1"))->with('fireAlert',true);

    }
}
