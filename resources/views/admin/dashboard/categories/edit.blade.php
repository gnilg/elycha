@extends('layouts.back_base_layout')
@section('title')
    Editer une catégorie
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
                            <li class="breadcrumb-item"><a href="/admin/categories">Catégories</a></li>
                            <li class="breadcrumb-item active">Editer</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Catégories</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Editer une catégorie</h4>

                        <form method="POST" action="/admin/categories/edit/{{ $categorie->id }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label for="label" class="form-label">Titre<span class="text-danger">*</span></label>
                                    <input type="text" name="label" required placeholder="Titre"
                                        value="{{ $categorie->label }}" class="form-control" id="label" />
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="is_immo" class="form-label">Catégorie<span
                                            class="text-danger">*</span></label>
                                    <select name="is_immo" id="is_immo" class="form-control" required>
                                        <option value="">Choisir</option>
                                        <option value="1" @if ($categorie->is_immo == 1) selected @endif>Immobilier
                                        </option>
                                        <option value="2" @if ($categorie->is_immo == 2) selected @endif>Auto
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">Choisir</option>
                                        <option value="1" @if ($categorie->type == 1) selected @endif>Vente
                                        </option>
                                        <option value="2" @if ($categorie->type == 2) selected @endif>Location
                                        </option>
                                        <option value="3" @if ($categorie->type == 3) selected @endif>Bail ou
                                            Vente de pièces</option>
                                    </select>
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
