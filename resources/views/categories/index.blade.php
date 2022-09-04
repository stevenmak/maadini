@extends('layouts.app')

@section('title', 'IndexAgent')
@section('module')
    GESTION DES CATEGORIES
@endsection
@section('description')
    Module de Gestion des categories produits
@endsection

@section('content')
                <div class="row">
                    <div class="col-9"><strong>LES GROUPES DEJA ENREGISTREES</strong></div>
                    <div class="col-3"><a class="btn btn-primary" href="{{ route('categories.create') }}">AJOUTER UN GROUPE</a></div>
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
                            <th>NOM GROUPE</th>
                            <th>NOMBRE CONTACT</th>
                            <th>CREE LE</th>
                            <th class=" " data-id="17">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $key => $categorie)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $categorie->codecategorie }}</td>
                              <td class="flex">{{ $categorie->designation }}</td>
                              <td class="flex">{{ $nbre=App\Article::where('categorie_id',$categorie->id)->count() }}</td>
                              <td class="flex">{{ $categorie->created_at }}</td>
                              <td class="flex">
                                <div class="item-action dropdown">
                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('categories.show',$categorie->id) }}">
                                            <i data-feather="eye"></i>
                                            Afficher
                                        </a>
                                        <a class="dropdown-item" href="{{ route('categories.edit', $categorie->id) }}">
                                            <i data-feather="edit"></i>
                                            Editer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        {!! Form::open(['method' => 'PUT','route' => ['archiverAgent', $categorie],'style'=>'display:inline']) !!}
                                        {!! Form::submit('<i data-feather="archive">Archiver</i>', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>

                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $categories->render() !!}
                </div>
@endsection
