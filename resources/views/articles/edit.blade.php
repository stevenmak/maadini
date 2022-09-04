@extends('layouts.app')
@section('title', 'IndexArticles')
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
                <strong>AJOUTER UN NOUVEL ARTICLE</strong>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger dismiss">
                        <strong>Whoops!</strong>Veillez verifié les données saisies<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($articles, ['method' => 'PATCH','route' => ['articles.update', $articles->id]]) !!}
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>CODE ARTICLE</label>
                        {!! Form::text('codeArticle', null, array('placeholder' => 'CODE ARTICLE','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>DESIGNATION</label>
                        {!! Form::text('designation', null, array('placeholder' => 'DESIGNATION','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>PRIX (CDF)</label>
                        {!! Form::text('prix', null, array('placeholder' => 'PRIX','class' => 'form-control','step' => '0.00')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>PRIX DE VENTE</label>
                        {!! Form::text('prix_ventes', null, array('placeholder' => 'PRIX DE VENTE','class' => 'form-control','step' => '0.00')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>STOCK MIN</label>
                        {!! Form::number('qteMin', null, array('placeholder' => 'STOCK MIN','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>STOCK INITIAL</label>
                        {!! Form::number('qteInitial', null, array('placeholder' => 'STOCK INITIAL','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>STOCK ACTUEL</label>
                        {!! Form::number('qteActuelle', null, array('placeholder' => 'STOCK ACTUEL','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>UNITE ARTICLE</label>
                        {!! Form::select('unite',App\Unite::pluck('designation','abreviation'), null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>DATE EXPIRATION</label>
                        {!! Form::date('date_expiration', null, array('placeholder' => 'DATE EXPIRATION','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>DESCRIPTION</label>
                        {!! Form::text('description', null, array('placeholder' => 'DESCRIPTION','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>CATEGORIE</label>
                        {!! Form::select('categorie_id',App\Categorie::pluck('designation','id'), null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Fournisseur</label>
                        {!! Form::select('fournisseur_id',App\Fournisseur::pluck('nom','id'), null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <input type="hidden" class="form-control"  name="user_id" required value="{{ auth()->user()->id }}">
                    </div>
                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-primary">Enregistrez</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
