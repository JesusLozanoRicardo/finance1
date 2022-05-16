<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer_util;
class Footer_utilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer_utiles = null;
        $footer_utiles1 = Footer_util::all();
        return view("admin.footer_utiles",compact("footer_utiles","footer_utiles1"))->with('fireAlert',false);
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
        $footer_utiles = new Footer_util();
        $footer_utiles->nombre=$request->nombre;
        $footer_utiles->link=$request->link;
        $footer_utiles->save();

        //$carrusel = null;
        $footer_utiles1 = Footer_util::all();
        $footer_utiles = null;
        return view("admin.footer_utiles",compact("footer_utiles","footer_utiles1"))->with('fireAlert', false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer_utiles = Footer_util::find($id);
        $footer_utiles1 = Footer_util::all();
        return view("admin.footer_utiles",compact("footer_utiles","footer_utiles1"))->with('fireAlert', false);

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
        $footer_utiles = Footer_util::find($id);
        $footer_utiles->nombre=$request->nombre;
        $footer_utiles->link=$request->link;
        $footer_utiles->save();
        $footer_utiles1 = Footer_util::all();
        $footer_utiles = null;
        return view("admin.footer_utiles",compact("footer_utiles","footer_utiles1"))->with('fireAlert', false);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer_utiles = Footer_util::find($id);
        $footer_utiles->delete();
        $footer_utiles = null;
        $footer_utiles1 = Footer_util::all();
        return view("admin.footer_utiles",compact("footer_utiles","footer_utiles1"))->with('fireAlert',true);

    }
}
