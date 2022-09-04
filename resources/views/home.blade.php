@extends('layouts.app')
@section('title', 'CreerUtilisateurs')
@section('module')
    TABLEAU DE BORD
@endsection
@section('description')
    Bienvenue Mr (Mme)  <span>{{ Auth::user()->name }}</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 d-flex">
        <div class="card flex">
            <div class="card-body">
                <div class="d-flex align-items-center text-hover-success">
                    <div class="avatar w-56 m-2 no-shadow gd-success">
                        <i data-feather="trending-up"></i>
                    </div>
                    <div class="px-4 flex">
                        <div>MESSAGES DU JOUR</div>
                        <div class="text-primary mt-2">
                        <h4 class="text-primary">{{ $nbreCat=App\Categorie::count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 d-flex">
        <div class="card flex">
            <div class="card-body">
                <div class="d-flex align-items-center text-hover-success">
                    <div class="avatar w-56 m-2 no-shadow gd-primary">
                        <i data-feather="trending-up"></i>
                    </div>
                    <div class="px-4 flex">
                        <div>MESSAGE ENVOYES</div>
                        <div class="text-success mt-2">
                           <h4>{{ $nbreArt=App\Article::where('etat','active')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 d-flex">
        <div class="card flex">
            <div class="card-body">
                <div class="d-flex align-items-center text-hover-success">
                    <div class="avatar w-56 m-2 no-shadow gd-warning">
                        <i data-feather="trending-up"></i>
                    </div>
                    <div class="px-4 flex">
                        <div>CARNET D ADRESSE</div>
                        <div class="text-success mt-2">
                        <h4 class="text-danger">{{ $ArtRupt=App\Article::whereRaw('qteMin > qteActuelle')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="b-b">
            <div class="nav-active-border b-success px-3">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="paiement-tab" data-toggle="tab" href="#paiement" role="tab" aria-controls="paiement" aria-selected="true">MESSAGE EXTERNE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="depense-tab" data-toggle="tab" href="#depense" role="tab" aria-controls="depense" aria-selected="false">MESSAGE INTERNE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ajustement-tab" data-toggle="tab" href="#ajustement" role="tab" aria-controls="ajustement" aria-selected="false">CARNET D ADRESSE</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content p-3">
            <div class="tab-pane fade show active" id="paiement" role="tabpanel" aria-labelledby="paiement-tab">
                <div>MESSAGES DU JOUR</div>
                <div class="table-responsive">
                    <table class="table table-theme table-row v-middle">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>ENTREPRISE</th>
                            <th>DESTINATEUR</th>
                            <th>NUMERO TEL</th>
                            <th>MESSAGE</th>
                            <th>ENVOYE PAR</th>
                        </thead>
                        <tbody>
                          @foreach ($mouvements=App\Mouvement::get()->where('type_id',1) as $key => $mouvement)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$key }}</td>
                              <td class="flex">{{ $mouvement->benificiaire }}</td>
                              <td class="flex">{{ $mouvement->reference }}</td>
                              <td class="flex">{{ $mouvement->motif }}</td>
                              <td class="flex">{{ $mouvement->datemouvement }}</td>
                              <td class="flex">{{ $user=App\User::where('id',$mouvement->user_id)->value('name')}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <div class="tab-pane fade" id="depense" role="tabpanel" aria-labelledby="depense-tab">
                <div>MESSAGES INTERNE</div>
                <div class="table-responsive">
                    <table class="table table-theme table-row v-middle">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>ENTREPRISE</th>
                            <th>DESTINATEUR</th>
                            <th>NUMERO TEL</th>
                            <th>MESSAGE</th>
                            <th>ENVOYE PAR</th>
                        </thead>
                        <tbody>
                          @foreach ($mouvements=App\Mouvement::get()->where('type_id',2) as $key => $mouvement)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$key }}</td>
                              <td class="flex">{{ $mouvement->benificiaire }}</td>
                              <td class="flex">{{ $mouvement->reference }}</td>
                              <td class="flex">{{ $mouvement->motif }}</td>
                              <td class="flex">{{ $mouvement->datemouvement }}</td>
                              <td class="flex">{{ $user=App\User::where('id',$mouvement->user_id)->value('name')}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <div class="tab-pane fade" id="ajustement" role="tabpanel" aria-labelledby="ajustement-tab">
                <div>REPERTOIRE DES CONTACTS ENREGISTRES</div>
                <div class="table-responsive">
                    <table class="table table-theme table-row v-middle">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>NOM CONACT</th>
                            <th>NUMREO PHONE</th>
                            <th>RESEAU</th>
                            <th>WHATSAPP</th>
                            <th>AUTRES</th>
                        </thead>
                        <tbody>
                          @foreach ($mouvements=App\Mouvement::get()->where('type_id',3) as $key => $mouvement)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$key }}</td>
                              <td class="flex">{{ $mouvement->benificiaire }}</td>
                              <td class="flex">{{ $mouvement->reference }}</td>
                              <td class="flex">{{ $mouvement->motif }}</td>
                              <td class="flex">{{ $mouvement->datemouvement }}</td>
                              <td class="flex">{{ $user=App\User::where('id',$mouvement->user_id)->value('name')}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
