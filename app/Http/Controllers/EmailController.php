<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Contact;
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail=Email::find(1);
        $contacts=Contact::all();
        return view("admin.email",compact("mail","contacts"))->with('fireAlert', false);
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
        $mail= new Email();
        $mail->mail=$request->mail;
        $mail->save();
        return redirect()->back();
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
        $mail= Email::find(1);
        $request->validate([
            'mail' => 'email|max:255'
        ]);
        $mail->mail=$request->mail;
        $mail->save();
        $mail=Email::find(1);
        $contacts=Contact::all();
        return view("admin.email",compact("mail","contacts"))->with('fireAlert', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts = Contact::find($id);
        $contacts->delete();
        $mail=Email::find(1);
        $contacts=Contact::all();
        return view("admin.email",compact("mail","contacts"))->with('fireAlert', true);
    }
}
