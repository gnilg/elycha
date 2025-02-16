@extends('layouts.back_base_layout')
@section('title')
    Liste des Catégories
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
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Catégories</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Catégories</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Libelle</th>
                                    <th>Nombre de publications</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $categorie)
                                    <tr>
                                        <td>{{ $categorie->label }}</td>
                                        <td>{{ $categorie->posts->count() }}</td>
                                        <td>
                                            @if ($categorie->type == 1)
                                                Vente :: {{ $categorie->is_immo == 1 ? 'Immobilier' : 'Auto' }}
                                            @elseif ($categorie->type == 2)
                                                Location :: {{ $categorie->is_immo == 1 ? 'Immobilier' : 'Auto' }}
                                            @else
                                                {{ $categorie->is_immo == 1 ? 'Bail' : 'Vente de pièces' }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/categories/edit/{{ $categorie->id }}" class="btn btn-info">
                                                <i class="fe-edit"></i>
                                            </a>
                                            <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteCard{{ $categorie->id }}">
                                                <i class="fe-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteCard{{ $categorie->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes-vous sûr de supprimer la catégorie {{ $categorie->titre }} ?</p>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">

                                                    <button type="button" class="btn btn-danger" style="color:white;"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <a href="/admin/categories/delete/{{ $categorie->id }}"
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
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Ajouter une catégorie</h4>

                        <form action="/admin/categories/add" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label for="titre" class="form-label">Titre<span class="text-danger">*</span></label>
                                    <input type="text" name="label" required placeholder="Titre" class="form-control"
                                        id="titre" />
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label for="is_immo" class="form-label">Catégorie<span
                                            class="text-danger">*</span></label>
                                    <select name="is_immo" id="is_immo" class="form-control" required>
                                        <option value="">Choisir</option>
                                        <option value="1">Immobilier</option>
                                        <option value="2">Auto</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">Choisir</option>
                                        <option value="1">Vente</option>
                                        <option value="2">Location</option>
                                        <option value="3">Bail ou Vente de pièces</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
