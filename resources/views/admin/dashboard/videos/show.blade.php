@extends('layouts.back_base_layout')
@section('title')
    Liste des Vidéos
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
                            <li class="breadcrumb-item active">Vidéos</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Vidéos</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Vidéos</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Vidéo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>Vidéo {{ $loop->index+1 }}</td>
                                        <td>
                                            <a href="/admin/videos/edit/{{ $video->id }}" class="btn btn-info">
                                                <i class="fe-edit"></i>
                                            </a>
                                            <a href="{{ $video->url }}" target="_blank" class="btn btn-primary">
                                                <i class="fe-eye"></i>
                                            </a>
                                            <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteCard{{ $video->id }}">
                                                <i class="fe-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteCard{{ $video->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes-vous sûr de supprimer la vidéo {{ $video->titre }} ?</p>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">

                                                    <button type="button" class="btn btn-danger" style="color:white;"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <a href="/admin/videos/delete/{{ $video->id }}"
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
                        <h4 class="header-title">Ajouter une vidéo</h4>

                        <form action="/admin/videos/add" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label for="titre" class="form-label">Vidéo<span class="text-danger">*</span></label>
                                    <input type="file" accept="video/*" name="video" required class="form-control"
                                        id="video" />
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
