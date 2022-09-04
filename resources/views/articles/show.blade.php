@extends('layouts.app')
@section('title', 'ShowArticles')
@section('module')
    GESTION DES ARTICLES
@endsection
@section('description')
    Module de Gestion des articles
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Fiche Produit:{{ $articles->codeArticle }} </strong>
        </div>
        <div class="card-body">
            <div class="row row-sm">
                <div class="form-group col-6">
                    <h5 class="mt-2">{{ $articles->designation }}</h5>
                </div>
                <div class="form-group col-6">
                </div>
                <div class="form-group col-6">
                    Categorie produit: {{ $categorie=App\Categorie::where('id',$articles->categorie_id)->value('designation')}}
                </div>
                <div class="form-group col-6">
                    <label>Prix: </label>
                    {{$articles->prix}} FC
                </div>
                <div class="form-group col-6">
                    <label>Stock Minimal: </label>
                    {{ $articles->qteMin }} {{ $articles->unite }}
                </div>
                <div class="form-group col-6">
                    <label>Prix de vente</label>
                    {{ $articles->prix_ventes }} FC
                </div>
                <div class="form-group col-6">
                    <label>Stock Initial: </label>
                    {{ $articles->qteInitial }} {{ $articles->unite }}
                </div>
                <div class="form-group col-6">
                    <label>Date d'expiration: </label>
                    {{ $articles->date_expiration }}
                </div>
                <div class="form-group col-6">
                    <label>Stock Actuel: </label>
                    {{ $articles->qteActuelle }} {{ $articles->unite }}
                </div>
                <div class="form-group col-6">
                    <label>Description: </label>
                    {{ $articles->description }}
                </div>
                <hr>
                <p></p>
            </div>
        </div>
@endsection
