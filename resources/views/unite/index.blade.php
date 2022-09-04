@extends('layouts.app')

@section('title', 'Indextaux')
@section('module')
    GESTION DES UNITES
@endsection
@section('description')
    Module de Gestion des unites de materiaux
@endsection

@section('content')
                <div class="row">
                    <div class="col-8"><strong>La liste des types produits</strong></div>
                    <div class="col-4">@can('unite-create')<a class="btn btn-primary" href="{{ route('unite.create') }}">AJOUTER UN TYPE</a>@endcan</div>
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
                <div class="table-responsive">
                    <table  id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>ABREVIATION</th>
                            <th>DESIGNATION</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($unites as $key => $unite)
                          <tr class=" " data-id="17">
                              <td class="flex">{{ ++$i }}</td>
                              <td class="flex">{{ $unite->abreviation }}</td>
                              <td class="flex">{{ $unite->designation }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                      {!! $unites->render() !!}
                </div>
@endsection

