@extends('layouts.back_base_layout')
@section('title')
    Liste des Notifications
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
                            <li class="breadcrumb-item active">Notifications</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Notifications</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Notifications</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Contenu</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $notification)
                                    <tr>
                                        <td>{{ $notification->title }}</td>
                                        <td>{{ $notification->content }}</td>
                                        <td>
                                            @if ($notification->type == 1)
                                                Client
                                            @else
                                                Agent
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/notifications/edit/{{ $notification->id }}"
                                                class="btn btn-info">
                                                <i class="fe-edit"></i>
                                            </a>
                                            <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteCard{{ $notification->id }}">
                                                <i class="fe-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteCard{{ $notification->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes-vous sûr de supprimer la notification {{ $notification->titre }}
                                                        ?
                                                    </p>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">

                                                    <button type="button" class="btn btn-danger" style="color:white;"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <a href="/admin/notifications/delete/{{ $notification->id }}"
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
                        <h4 class="header-title">Ajouter une notification</h4>

                        <form action="/admin/notifications/add" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label for="title" class="form-label">Titre<span class="text-danger">*</span></label>
                                    <input type="text" name="title" required placeholder="Titre" class="form-control"
                                        id="title" />
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label for="content" class="form-label">Contenu<span
                                            class="text-danger">*</span></label>
                                    <textarea type="text" name="content" required placeholder="Contenu" class="form-control" id="content"></textarea>
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">Choisir</option>
                                        <option value="1">Client</option>
                                        <option value="2">Agent</option>
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
