@extends('layouts.app')
@section('title', 'CreerUnites')
@section('module')
GESTION DES UNITES
@endsection
@section('description')
Module de Gestion des unites de materiaux
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>ajouter une unité</strong>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex">
                        <strong>Whoops!</strong>Veillez verifié les données saisies<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                @endif
                {!! Form::open(array('route' => 'unite.store','method'=>'POST')) !!}
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>Abreviation</label>
                        {!! Form::text('abreviation', null, array('placeholder' => 'Abreviaion','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Designation</label>
                        {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-primary">Envoyez</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
