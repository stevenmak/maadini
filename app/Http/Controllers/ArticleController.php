<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $articles = Article::orderBy('id','DESC')->paginate(10);
        return view('articles.index',compact('articles'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*request()->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'codeAgent' => 'required',
            'matriculeAgent' => 'required',
            'genre' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'courriel' => 'required',
            'titreAgent' => 'required',
            'profession' => 'required',
            'niveauEtude' => 'required',
            'etatCivil' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'pays' => 'required',
        ]);*/
        Article::create($request->all());
        return redirect()->route('articles.index')
                        ->with('success','Article enregistré coorectement.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $articles = Article::find($id);
        return view('articles.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $articles = Article::find($id);
        return view('articles.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        /*request()->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'codeAgent' => 'required',
            'matriculeAgent' => 'required',
            'genre' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'courriel' => 'required',
            'titreAgent' => 'required',
            'profession' => 'required',
            'niveauEtude' => 'required',
            'etatCivil' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'pays' => 'required',
        ]);*/
        $articles = Article::find($id);
        $articles->update($request->all());
        return redirect()->route('articles.index')
                        ->with('success','Article modifié coorectement.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("articles")->where('id',$id)->delete();
        return redirect()->route('articles.index')->with('success','Article supprimé avec succès');
    }
}
