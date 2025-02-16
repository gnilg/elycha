@extends('layouts.back_base_layout')
@section('title')
    Publications immobilières
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
                            <li class="breadcrumb-item active">Publications immobilières</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Publications immobilières</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Publications immobilières</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Titre</th>
                                    <th>Lieu</th>
                                    <th>Prix</th>
                                    <th>Catégorie</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="Avatar" width="50" height="50" src="{{ $post->photo }}"
                                                    class="rounded-circle">
                                            </div>
                                        </td>
                                        <td>{{ $post->label }}</td>
                                        <td>{{ $post->place }}</td>
                                        <td>{{ $post->price }} Fcfa</td>
                                        <td>{{ $post->category->label }}</td>
                                        <td>
                                            @if ($post->status == 1)
                                                <span class="btn btn-success">Actif</span>
                                            @else
                                                <span class="btn btn-danger">Classé</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                                data-bs-target="#boostCard{{ $post->id }}">
                                                Booster <i class="fe-check"></i>
                                            </button>
                                            <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteCard{{ $post->id }}">
                                                <i class="fe-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteCard{{ $post->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes-vous sûr de supprimer cette publication ?</p>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-danger" style="color:white;"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <a href="/admin/posts/delete/{{ $post->id }}"
                                                        class="btn btn-success"> Oui</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="boostCard{{ $post->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Boost</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes-vous sûr de booster la publication <b>{{ $post->label }}</b> ?
                                                    </p>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">

                                                    <button type="button" class="btn btn-danger" style="color:white;"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <a href="/admin/posts/boost/{{ $post->id }}"
                                                        class="btn btn-success"> Oui</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
