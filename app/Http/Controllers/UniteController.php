<?php

namespace App\Http\Controllers;

use App\Unite;
use Illuminate\Http\Request;

class UniteController extends Controller
{


    // Ajout permission
    function __construct()
    {

         $this->middleware('permission:unite-list|unite-create|unite-edit|unite-delete', ['only' => ['index','show']]);
         $this->middleware('permission:unite-create', ['only' => ['create','store']]);
         $this->middleware('permission:unite-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:unite-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $unites = Unite::orderBy('id','DESC')->paginate(10);
        return view('unite.index',compact('unites'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('unite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $unite= new Unite;
        $unite->abreviation =$request->abreviation;
        $unite->designation =$request->designation;
        $unite->save();
        return redirect()->route('unite.index')
                        ->with('success','Unite enregistré correctement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function show(Unite $unite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit(Unite $unite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unite $unite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unite $unite)
    {
        //
    }
}
