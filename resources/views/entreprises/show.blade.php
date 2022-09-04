@extends('layouts.app')

@section('title', 'AfficherEntreprise')
@section('module')
    DONNEES DE L'ENTREPRISE
@endsection
@section('description')
    Affichages des Informations sur l'entreprise
@endsection
@section('content')
<div class="title">
<div class="page-hero page-container " id="page-hero">
    <div class="padding d-flex">
        <div class="page-title">
            <h2 class="text-md text-highlight">GESTION DE L'ENTREPRISE</h2>
        </div>
        <div class="flex"></div>
        <div class="pull-left">
        </div>
    </div>
</div>
</div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Info sur l'entreprise</strong>
            </div>
            <div class="card-body">
                <div>
                    <h5 class="card-title">{{ $entreprise->nom }}</h5>
                    <h6 class="card-text">IdNat:  {{ $entreprise->idNat }}</h6>
                    <h6 class="card-text">RCCM: {{ $entreprise->RCCM }}</h6>
                    <h6 class="card-text">Numéro d'impot:  {{ $entreprise->numImpot }}</h6>
                    <h6 class="card-text">Téléphone: {{ $entreprise->telephone }}</h6>
                    <h6 class="card-text">Mobile:  {{ $entreprise->mobile }}</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
