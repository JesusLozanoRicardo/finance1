<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = null;
        $locations1 = Location::all();
        return view("admin.locations",compact("locations","locations1"))->with('fireAlert',false);

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
        $locations = new Location();
        $locations->texto1=$request->texto1;
        $locations->texto2=$request->texto2;
        $locations->texto3=$request->texto3;
        $locations->save();

        //$carrusel = null;
        $locations1 = Location::all();
        return view("admin.locations",compact("locations","locations1"))->with('fireAlert', false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locations = location::find($id);
        $locations1 = location::all();
        return view("admin.locations",compact("locations","locations1"))->with('fireAlert', false);

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
        $locations = Location::find($id);

        if($request->hasFile("imagen")){
            $request->validate([
                'imagen' => 'required|image|mimes:png,jpg,jpeg,gif,svg,tiff|max:5000',
            ]);
            $imagen = $request->file("imagen");
            $nombreimagen = $id."img_location".".".$imagen->guessExtension();
            $ruta = public_path("images/location/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $locations->imagen = $nombreimagen;
            $locations->save();
    }else{
        $locations->texto1=$request->texto1;
        $locations->texto2=$request->texto2;
        $locations->texto3=$request->texto3;
        $locations->save();
     }
        $locations1 = Location::all();
        $locations = null;
        return view("admin.locations",compact("locations","locations1"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locations = Location::find($id);
        $locations->delete();
        $locations = null;
        $locations1 = Location::all();
        return view("admin.locations",compact("locations","locations1"))->with('fireAlert',true);

    }
}
