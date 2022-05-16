<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quien;
class QuienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quienes1=null;
        $quienes = Quien::first();
        return view("admin.quienes",compact("quienes","quienes1"))->with('fireAlert', false);     
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
        $quienes = new Quien();
        $quienes->texto1=$request->texto1;
        $quienes->texto2=$request->texto2;
        $quienes->texto3=$request->texto3;
        $quienes->texto4=$request->texto4;
        $quienes->save();
        //return "111";
        $quienes1 = Quien::all();
        return view("admin.quienes",compact("quienes","quienes1"))->with('fireAlert', false);
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
        $quienes = Quien::find($id);

        if($request->hasFile("imagen")){
                $request->validate([
                    'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
                ]);    
                $imagen = $request->file("imagen");
                $nombreimagen = $id."img_quienes".".".$imagen->guessExtension();
                $ruta = public_path("images/quienes/");
                copy($imagen->getRealPath(),$ruta.$nombreimagen);
                $quienes->imagen = $nombreimagen;
                $quienes->save();    
        }else{
            $quienes->texto1=$request->texto1;
            $quienes->texto2=$request->texto2;
            $quienes->texto3=$request->texto3;
            $quienes->texto4=$request->texto4;
            $quienes->save();
        }   
            $quienes1 = Quien::all();
            return view("admin.quienes",compact("quienes","quienes1"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quienes = Quien::find($id);
        $quienes->delete();
        $quienes = null;
        $quienes1 = null;
        return view("admin.quienes",compact("quienes","quienes1"))->with('fireAlert',true);
    }
}
