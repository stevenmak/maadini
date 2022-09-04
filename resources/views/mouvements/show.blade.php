@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-8">
            <div class="d-flex align-items-center">
                <svg width="48" height="48" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                    <g class="loading-spin" style="transform-origin: 256px 256px">
                        <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                    </g>
                </svg>
                <span class="text-md mx-2">{{ $entreprise=App\Entreprises::select('nom')->value('nom') }}</span>
            </div>
            <div class="text-sm">IDNAT {{ $entreprise=App\entreprises::select('idNat')->value('idNat') .'-'.'RCCM'.
            $entreprise=App\Entreprises::select('RCCM')->value('RCCM') }}</div>
            <div class="text-sm">NUMERO IMPOT: {{ $entreprise=App\Entreprises::select('numImpot')->value('numImpot')}}</div>
            <div class="text-sm">TELEPHONE {{ $entreprise=App\Entreprises::select('telephone')->value('telephone') .'-'.
                $entreprise=App\Entreprises::select('mobile')->value('mobile') }}</div>
            <span class="text-sm">EMAIL: {{ $entreprise=App\Entreprises::select('courriel')->value('courriel') }}</span>

        </div>
        <div class="flex"></div>
        <div class="col-4 text-right">
            <div class="text-sm text-fade"><h4>{{ $type=App\Type::where('id',$mouvement->type_id)->value('designation')}}</h4></div>
            <div class="text-highlight">REFERENCE:  {{ $mouvement->benificiaire }}</div>
            <div class="text-sm">Date: {{ $mouvement->datemouvement }}</div>
            <td class="flex"><h6>Type mouvement: {{ $type=App\Type::where('id',$mouvement->type_id)->value('designation')}}</h6></td>

        </div>
    </div>
    <div class="padding">
        <div class="col-12">
            <h2 class="text-center">FICHE D ACHAT:  {{ $mouvement->reference }}</h2>
        </div>
    </div>
    <table class="table table-theme table-rows v-middle">
        <thead>
            <tr>
                <th class="text-muted">DESIGNATION</th>
                <th class="text-muted">QUANTITE</th>
                <th class="text-muted">UNITE</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($lignes=App\Ligne::select('*')->where('mouvement',$mouvement->id)->get() as $key => $ligne)
                <tr>
                    <td> {{ $designation=App\Article::select('designation')->where('id',$ligne->article_id)->value('designation') }}</td>
                    <td>{{ $ligne->quantite }}</td>
                    <td>{{ $ligne->unite }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row py-3">
        <div class="col-md-4 py-2"></div>
        <div class="col-md-4 py-2"></div>
        <div class="col-md-4 py-2">
            <div class="text-muted">Crée par</div>
            <div>{{ $creepar=App\User::select('name')->where('id',$mouvement->user_id)->value('name') }} </h2></div>
        </div>
    </div>
    <div class="d-flex py-3">
        <div class="flex"></div>
        <a href="#" class="btn btn-sm btn-primary d-print-none" onClick="window.print();">Imprimez devis</a>
    </div>
@endsection
