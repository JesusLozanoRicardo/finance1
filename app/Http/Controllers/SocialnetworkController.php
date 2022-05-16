<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socialnetwork;
class SocialnetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialnetwork = Socialnetwork::first();
        return view("admin.socialnetwork",compact("socialnetwork"))->with('fireAlert', false);
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
        $socialnetwork = new Socialnetwork();
        $socialnetwork->facebook=$request->facebook;
        $socialnetwork->twitter=$request->twitter;
        $socialnetwork->be=$request->be;
        $socialnetwork->dribbble=$request->dribbble;
        $socialnetwork->github=$request->github;
        $socialnetwork->save();
        $socialnetwork1 = Socialnetwork::all();
        return view("admin.socialnetwork",compact("socialnetwork","socialnetwork1"))->with('fireAlert', false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socialnetwork = Socialnetwork::find($id);
        $socialnetwork1 = Socialnetwork::all();
        return view("admin.socialnetwork",compact("socialnetwork","socialnetwork1"))->with('fireAlert', false);

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
        $socialnetwork = Socialnetwork::find($id);
        $socialnetwork->facebook=$request->facebook;
        $socialnetwork->twitter=$request->twitter;
        $socialnetwork->be=$request->be;
        $socialnetwork->dribbble=$request->dribbble;
        $socialnetwork->github=$request->github;
        $socialnetwork->save();
        $socialnetwork1 = Socialnetwork::all();
        return view("admin.socialnetwork",compact("socialnetwork","socialnetwork1"))->with('fireAlert', false);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialnetwork = Socialnetwork::find($id);
        $socialnetwork->delete();
        $socialnetwork = null;
        $socialnetwork1 = Socialnetwork::all();
        return view("admin.socialnetwork",compact("socialnetwork","socialnetwork1"))->with('fireAlert',true);

    }
}
