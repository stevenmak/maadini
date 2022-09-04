@extends('layouts.app')

@section('title', 'IndexFournisseur')
@section('module')
    GESTION DES FOURNISSEURS
@endsection
@section('description')
    Module de Gestion des fournisseurs produits
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>LES FOURNISSEURS DEJA ENREGISTREES</strong></div>
                    <div class="col-3"><a class="btn btn-primary" href="{{ route('fournisseurs.create') }}">AJOUTER</a></div>
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
                            <th>NOM</th>
                            <th>TELEPHONE</th>
                            <th>EMAIL</th>
                            <th>ADRESSE</th>
                            <th>NOMBRE ARTICLE</th>
                            <th>CREE LE</th>
                            <th class=" " data-id="17">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($fournisseurs as $key => $fournisseur)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $fournisseur->nom }}</td>
                              <td class="flex">{{ $fournisseur->telephone }}</td>
                              <td class="flex">{{ $fournisseur->email }}</td>
                              <td class="flex">{{ $fournisseur->adresse }}</td>
                              <td class="flex">{{ $nbre=App\Article::where('fournisseur_id',$fournisseur->id)->count() }}</td>
                              <td class="flex">{{ $fournisseur->created_at }}</td>
                              <td class="flex">
                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('fournisseurs.show',$fournisseur->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        <a class="dropdown-item" href="{{ route('fournisseurs.edit', $fournisseur->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        {!! Form::open(['method' => 'PUT','route' => ['archiverAgent', $fournisseur],'style'=>'display:inline']) !!}
                                        {!! Form::submit('<i data-feather="archive">Archiver</i>', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>

                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $fournisseurs->render() !!}
                </div>
@endsection
