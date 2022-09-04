@extends('layouts.app')

@section('title', 'Showpaiements')
@section('module')
    MODULE DES RAPPORTS
@endsection
@section('description')
    Catalogue de produits
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="col-8">
                    <div class="d-flex align-items-center">
                        <svg width="48" height="48" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g class="loading-spin" style="transform-origin: 256px 256px">
                                <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                            </g>
                        </svg>
                        <span class="text-md mx-2">{{ $entreprise=App\entreprises::select('nom')->value('nom') }}</span>
                    </div>
                    <div class="text-sm">IDNAT {{ $entreprise=App\entreprises::select('idNat')->value('idNat') .'-'.'RCCM'.
                    $entreprise=App\entreprises::select('RCCM')->value('RCCM') }}</div>
                    <div class="text-sm">NUMERO IMPOT: {{ $entreprise=App\entreprises::select('numImpot')->value('numImpot')}}</div>
                    <div class="text-sm">TELEPHONE {{ $entreprise=App\entreprises::select('telephone')->value('telephone') .'-'.
                        $entreprise=App\entreprises::select('mobile')->value('mobile') }}</div>
                    <span class="text-sm">EMAIL: {{ $entreprise=App\entreprises::select('courriel')->value('courriel') }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <h3 class="card-title text-center">CATALOGUE DES ARTICLES</h3>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                <th>N°</th>
                                <th>CODE ARTICLE</th>
                                <th>CATEGORIE</th>
                                <th>DESIGNATION</th>
                                <th>PRIX</th>
                                <th>SEUIL STOCK</th>
                                <th>STOCK ACTUEL</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($articles=App\Article::get() as $key => $article)
                              <tr class=" " data-id="17">
                                  <td class="flex">{{ ++$key }}</td>
                                  <td class="flex">{{ $article->codeArticle }}</td>
                                  <td class="flex">{{ $categorie=App\Categorie::where('id',$article->categorie_id)->value('designation')}}</td>
                                  <td class="flex">{{ $article->designation }}</td>
                                  <td class="flex">{{ $article->prix }} $</td>
                                  <td class="flex">{{ $article->qteMin }} {{ $article->unite }}</td>
                                  <td class="flex">{{ $article->qteActuelle }} {{ $article->unite }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>

                    <hr>
                    <div class="row py-3">
                        <div class="col-md-6 py-2">

                        </div>
                        <div class="col-md-6 py-2">
                            <div class="text-muted">Crée par</div>
                            <div class="text-left">{{ auth()->user()->name}}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
