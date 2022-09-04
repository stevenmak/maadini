@extends('layouts.app')

@section('title', 'AfficherCategorie')
@section('module')
    GESTION DES CATEGORIES
@endsection
@section('description')
    Module de Gestion des categories produits
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Affichage categorie</strong>
            </div>
            <div class="card-body">
                <div class="row row-sm">
                    <div class="form-group col-4">
                        <h5 class="mt-2">{{ $categories->designation }}</h5>
                    </div>
                    <div class="form-group col-4">
                        <h6 class="mt-2">{{ $categories->codecategorie }}</h6>
                    </div>
                    <div class="form-group col-4">
                        <h6 class="mt-2">Nombre article:  {{ $nbre=App\Article::where('categorie_id',$categories->id)->count() }}</h6>
                    </div>
                </div>
            </div>
    <hr>

@endsection
