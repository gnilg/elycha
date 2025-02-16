@extends('layouts.back_base_layout')
@section('title')
    Editer un admin
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
                            <li class="breadcrumb-item active">Editer</li>
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
                        <h4 class="header-title">Editer un admin</h4>

                        <form method="POST" action="/admin/admins/edit/{{ $admin->id }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="nom" class="form-label">Nom<span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" required value="{{ $admin->nom }}"
                                        placeholder="Nom" class="form-control" id="nom" />
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="prenoms" class="form-label">Prénoms<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="first_name" required value="{{ $admin->prenoms }}"
                                        placeholder="Prénoms" class="form-control" id="prenoms" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" required value="{{ $admin->email }}"
                                    placeholder="Email" class="form-control" id="email" />
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
