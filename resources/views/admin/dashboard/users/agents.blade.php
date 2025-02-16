@extends('layouts.back_base_layout')
@section('title')
    Liste des Agents
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
                            <li class="breadcrumb-item active">Agents</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Agents</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Agents</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nom complet</th>
                                    <th>Numéro de téléphone</th>
                                    <th>Date d'inscription</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="Avatar" class="rounded-circle" width="50"
                                                    src="/avatars/default.png">
                                            </div>
                                        </td>
                                        <td>{{ $user->last_name }} {{ $user->first_name }}</td>
                                        <td>{{ $user->telephone }}</td>
                                        <td>{{ formatDate($user->created_at) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
