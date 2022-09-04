@extends('layouts.app')

@section('title', 'CreerFournisseur')
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
                <strong>AJOUTER UN NOUVEAU FOURNISSEUR</strong>
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
                {!! Form::open(array('route' => 'fournisseurs.store','method'=>'POST')) !!}
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>NOM</label>
                        {!! Form::text('nom', null, array('placeholder' => 'Nom Fournisseur','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>TELEPHONE</label>
                        {!! Form::text('telephone', null, array('placeholder' => 'Telephone fournisseur','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>EMAIL</label>
                        {!! Form::text('email', null, array('placeholder' => 'Email fournisseur','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>ADRESSE FOURNISSEUR</label>
                        {!! Form::text('adresse', null, array('placeholder' => 'Adresse fournisseur','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
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
