<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $fournisseurs = Fournisseur::orderBy('id','DESC')->paginate(10);
        return view('fournisseurs.index',compact('fournisseurs'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fournisseurs.create');
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
        Fournisseur::create($request->all());
        return redirect()->route('fournisseurs.index')
                        ->with('success','Fournisseur enregistré coorectement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fournisseurs = Fournisseur::find($id);
        return view('fournisseurs.show', compact('fournisseurs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $fournisseurs = Fournisseur::find($id);
        return view('fournisseurs.edit', compact('fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $fournisseur = Fournisseur::find($id);
        $fournisseur->update($request->all());
        return redirect()->route('fournisseurs.index')
                        ->with('success','Fournisseur modifiée coorectement.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("fournisseurs")->where('id',$id)->delete();
        return redirect()->route('fournisseurs.index')
        ->with('success','Fournisseur supprimée avec succès');
    }
}
