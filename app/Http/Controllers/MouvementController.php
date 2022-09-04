<?php

namespace App\Http\Controllers;

use App\Ligne;
use App\Article;
use App\Mouvement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MouvementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $mouvements = Mouvement::orderBy('id','DESC')->paginate(10);
        return view('mouvements.index',compact('mouvements'))->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mouvements.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        //Inserer un mouvement
        $mouvement=Mouvement::create($request->mouvements);
        //inserer des multiples lignes mouvements
        for($i=0; $i < count($request->article_id) ; $i++)
        {
            if(isset($request->quantite[$i]) && isset($request->unite[$i]))
            {
                Ligne::create(
                    [
                        'mouvement'=> $mouvement->id,
                        'article_id'=>$request->article_id[$i],
                        'quantite' => $request->quantite[$i],
                        'prix' => $request->prix[$i],
                        'unite' => $request->unite[$i],
                    ]
                );
            }
            //type=1 donc ont fait les entrees

            if($mouvement->type_id==1)
            {
                $article=Article::find($request->article_id[$i]);
                $article->qteActuelle += $request->quantite[$i];
                $article->save();


            }
            //type=2 donc ont fait les sorties
            if($mouvement->type_id==2)
            {
                $article=Article::find($request->article_id[$i]);
                $article->qteActuelle -= $request->quantite[$i];
                $article->save();
            }

            //type=3 donc ont fait les ajustements
            if($mouvement->type_id==3)
            {
                $article=Article::find($request->article_id[$i]);
                $article->qteActuelle=$request->quantite[$i];
                $article->save();


            }

        }
        return redirect()->route('mouvements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mouvement  $mouvement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mouvement = Mouvement::find($id);
        return view('mouvements.show', compact('mouvement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mouvement  $mouvement
     * @return \Illuminate\Http\Response
     */
    public function edit(Mouvement $mouvement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mouvement  $mouvement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mouvement $mouvement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mouvement  $mouvement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mouvement $mouvement)
    {
        //
    }

    public function getDetailMateriel(Request $request)
    {
        $data=DB::table('unites')
        ->join('articles','unites.id','=','articles.unite_id')
        ->select('articles.id','articles.designation','articles.prix','unites.abreviation')
        ->where('articles.id','=',$request->id)
        ->get();
        return response()->json($data);

    }

    public function ventes()
    {
        //
        return view('mouvements.ventes');

    }

    public function save(Request $request, Article $article)
    {
        //Inserer un mouvement
        $mouvement=Mouvement::create($request->mouvements);
        //inserer des multiples lignes mouvements
        for($i=0; $i < count($request->article_id) ; $i++)
        {
            if(isset($request->quantite[$i]) && isset($request->unite[$i]))
            {
                Ligne::create(
                    [
                        'mouvement'=> $mouvement->id,
                        'article_id'=>$request->article_id[$i],
                        'quantite' => $request->quantite[$i],
                        'prix' => $request->prix[$i],
                        'unite' => $request->unite[$i],
                    ]
                );
            }
            //type=1 donc ont fait les entrees

            if($mouvement->type_id==1)
            {
                $article=Article::find($request->article_id[$i]);
                $article->qteActuelle += $request->quantite[$i];
                $article->save();


            }
            //type=2 donc ont fait les sorties
            if($mouvement->type_id==2)
            {
                $article=Article::find($request->article_id[$i]);
                $article->qteActuelle -= $request->quantite[$i];
                $article->save();
            }

            //type=3 donc ont fait les ajustements
            if($mouvement->type_id==3)
            {
                $article=Article::find($request->article_id[$i]);
                $article->qteActuelle=$request->quantite[$i];
                $article->save();


            }

        }
        return redirect()->route('mouvements.index');
    }
}
