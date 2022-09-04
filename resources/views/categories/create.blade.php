@extends('layouts.app')

@section('title', 'IndexAgent')
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
                <strong>AJOUTEZ UN NOUVEAU GROUPE</strong>
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
                {!! Form::open(array('route' => 'categories.store','method'=>'POST')) !!}
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>REFERENCE</label>
                        {!! Form::text('codecategorie', null, array('placeholder' => 'CHAMPS AUTO-GENERE','class' => 'form-control','readonly')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>NOM GROUPE</label>
                        {!! Form::text('designation', null, array('placeholder' => 'DESIGNATION','class' => 'form-control')) !!}
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
