@extends('layouts.app')
@section('title', 'IndexArticles')
@section('module')
    GESTION DES ARTICLES
@endsection
@section('description')
    Module de Gestion des articles
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>LISTE DE CONTACT DEJA ENREGISTREES</strong></div>
                    <div class="col-3"><a class="btn btn-primary" href="#">AJOUTER CONTACT</a></div>
                </div>
                <div class="col-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex">
                            <p>{{ $message }}</p>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     @endif
                </div>
                <div class="table-responsive mt-4">
                    <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>NOM CONTACT</th>
                            <th>NUMERO</th>
                            <th>GROUPE</th>
                            <th>DEPARTEMENT</th>
                            <th>ENTREPRISE</th>
                            <th>WHATSAPP</th>
                            <th>AUTRES</th>
                            <th class=" " data-id="17">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                </div>
@endsection
