@extends('layouts.back_base_layout')
@section('title')
    Publications boostées
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Accueil</a></li>
                            <li class="breadcrumb-item active">Publications boostées</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Publications boostées</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Publications boostées</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Titre</th>
                                    <th>Durée</th>
                                    <th>Montant</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boosts as $boost)
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="Avatar" width="50" height="50"
                                                    src="{{ $boost->publication->photo }}" class="rounded-circle">
                                            </div>
                                        </td>
                                        <td>{{ $boost->publication->label }}</td>
                                        <td>{{ $boost->duration }}</td>
                                        <td>{{ $boost->amount }} Fcfa</td>
                                        <td>
                                            @if (date('Y-m-d H:i:s') <= $boost->publication->lastSponsoring()->end_date)
                                                <span class="btn btn-success">En cours</span>
                                            @else
                                                <span class="btn btn-danger">Terminé</span>
                                            @endif
                                        </td>
                                        {{-- <td>
                                            <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                                data-bs-target="#boostCard{{ $boost->id }}">
                                                Booster <i class="fe-check"></i>
                                            </button>
                                        </td> --}}
                                    </tr>
                                    {{-- <div class="modal fade" id="boostCard{{ $boost->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Boost</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes-vous sûr de booster la publication <b>{{ $boost->label }}</b> ?
                                                    </p>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">

                                                    <button type="button" class="btn btn-danger" style="color:white;"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <a href="/admin/posts/boost/{{ $boost->id }}"
                                                        class="btn btn-success"> Oui</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
