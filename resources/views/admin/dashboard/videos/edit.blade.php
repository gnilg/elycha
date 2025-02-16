@extends('layouts.back_base_layout')
@section('title')
    Editer une vidéo
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
                            <li class="breadcrumb-item"><a href="/admin/videos">Vidéos</a></li>
                            <li class="breadcrumb-item active">Editer</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Vidéos</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Editer une vidéo</h4>

                        <form method="POST" action="/admin/videos/edit/{{ $video->id }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label for="titre" class="form-label">Vidéo<span class="text-danger">*</span></label>
                                    <input type="file" accept="video/*" name="video" required class="form-control"
                                        id="video" />
                                </div>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Editer</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>
    </div>
@endsection
