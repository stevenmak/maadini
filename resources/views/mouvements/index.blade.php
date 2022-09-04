@extends('layouts.app')
@section('title', 'IndexArticles')
@section('module')
    GESTION DES MOUVEMENTS
@endsection
@section('description')
    Module de Gestion des mouvements
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>LES ARTICLES DEJA ENREGISTREES</strong></div>
                    <div class="col-3"><a class="btn btn-primary" href="{{ route('mouvements.create') }}"><i data-feather='plus'></i>ACHAT PRODUIT</a></div>
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
                            <th>REFERENCE</th>
                            <th>BENEFICIAIRE</th>
                            <th>MOTANT TOTAL</th>
                            <th>DATE ACHAT</th>
                            <th>EFFECTUE PAR</th>
                            <th class=" " data-id="17">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($mouvements as $key => $mouvement)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $mouvement->reference }}</td>
                              <td class="flex">{{ $mouvement->benificiaire }}</td>
                              <td class="flex">{{ $mouvement->total }}</td>
                              <td class="flex">{{ $mouvement->datemouvement }}</td>
                              <td class="flex">{{ $user=App\User::where('id',$mouvement->user_id)->value('name')}}</td>
                              <td class="flex">
                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('mouvements.show',$mouvement->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        <a class="dropdown-item" href="{{ route('mouvements.edit', $mouvement->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
@endsection
