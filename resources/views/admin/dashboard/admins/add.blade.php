@extends('layouts.back_base_layout')
@section('title')
    Ajouter un admin
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
                            <li class="breadcrumb-item"><a href="/admin/admins">Administrateurs</a></li>
                            <li class="breadcrumb-item active">Ajouter</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Administrateurs</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Ajouter un admin</h4>

                        <form action="/admin/admins/add" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="nom" class="form-label">Nom<span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" required placeholder="Nom" class="form-control"
                                        id="nom" />
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="prenoms" class="form-label">Prénoms<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="first_name" required placeholder="Prénoms"
                                        class="form-control" id="prenoms" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" required placeholder="Email" class="form-control"
                                    id="email" />
                            </div>
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="password" class="form-label">Mot de passe<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password" required placeholder="Mot de passe"
                                        class="form-control" id="password" />
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="c_password" class="form-label">Confirmation<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="c_password" required placeholder="Confirmation"
                                        class="form-control" id="c_password" />
                                </div>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>
    </div>
@endsection
