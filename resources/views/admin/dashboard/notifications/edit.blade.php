@extends('layouts.back_base_layout')
@section('title')
    Editer une notification
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
                            <li class="breadcrumb-item"><a href="/admin/notifications">Notifications</a></li>
                            <li class="breadcrumb-item active">Editer</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Notifications</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Editer une notification</h4>

                        <form method="POST" action="/admin/notifications/edit/{{ $notification->id }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label for="title" class="form-label">Titre<span class="text-danger">*</span></label>
                                    <input type="text" name="title" required placeholder="Titre"
                                        value="{{ $notification->title }}" class="form-control" id="title" />
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label for="content" class="form-label">Contenu<span
                                            class="text-danger">*</span></label>
                                    <textarea type="text" name="content" required placeholder="Contenu" class="form-control" id="content">{{ $notification->content }}</textarea>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">Choisir</option>
                                        <option value="1" @if ($notification->type == 1) selected @endif>Client
                                        </option>
                                        <option value="2" @if ($notification->type == 2) selected @endif>Agent
                                        </option>
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
