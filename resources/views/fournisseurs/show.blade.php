@extends('layouts.app')

@section('title', 'AfficherFournisseur')
@section('module')
    GESTION DES FOURNISSEURS
@endsection
@section('description')
    Module de Gestion des fournisseurs produits
@endsection

@section('content')
    <div class="col-lg-12">
        
        <div class="card">
            <div class="card-header">
                <strong>Information sur le fournisseur</strong>
            </div>
            <div class="card-body">
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <h5 class="mt-2">{{ $fournisseurs->nom }}</h5>
                        <h6 class="mt-2">Téléphone: {{ $fournisseurs->telephone }}</h6>
                        <h6 class="mt-2">Email: {{ $fournisseurs->email }}</h6>
                        <h6 class="mt-2">Adresse: {{ $fournisseurs->adresse }}</h6>
                    </div>
                    <div class="form-group col-6">
                        <h5 class="mt-2">Nombre article:  {{ $nbre=App\Article::where('fournisseur_id',$fournisseurs->id)->count() }}</h5>
                    </div>
                </div>
            </div>
    <hr>
            <div class="card-header">
                <strong>Liste des articles du fournisseur: {{ $fournisseurs->nom }}</strong>
            </div>
            <div class="card-body">
                <div class="row row-sm">
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                <th>N°</th>
                                <th>CODE ARTICLE</th>
                                <th>DESIGNATION</th>
                                <th>PRIX</th>
                                <th>UNITE</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($fournisseurArt=App\Article::where('fournisseur_id',$fournisseurs->id)->get() as $key => $article)
                                @if(count($fournisseurArt) > 0)
                                    <tr class=" " data-id="17">
                                        <td class="flex">{{ ++$key }}</td>
                                        <td class="flex">{{ $article->codeArticle }}</td>
                                        <td class="flex">{{ $article->designation }}</td>
                                        <td class="flex">{{ $article->prix }}</td>
                                        <td class="flex">{{ $article->unite }}</td>
                                    </tr>
                                @else
                                Aucun article disponible pour ce fournisseur
                                @endif
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
@endsection
