@extends('layouts.back_base_layout')
@section('title')
    Demandes clients
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
                            <li class="breadcrumb-item active">Demandes clients</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Demandes clients</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Demandes clients</h4>

                        <table id="datatable-buttons2" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Catégorie</th>
                                    <th>Téléphone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inquiries as $inquiry)
                                    <tr>
                                        <td>{{ superFormatDate($inquiry->created_at) }}</td>
                                        <td>{{ $inquiry->description }}</td>
                                        <td>{{ $inquiry->price }} Fcfa</td>
                                        <td>{{ $inquiry->category->label }}</td>
                                        <td>{{ $inquiry->user->telephone }}</td>
                                        <td>
                                            <a href="https://wa.me/{{ $inquiry->user->telephone }}" target="_blank"
                                                class="btn btn-success">
                                                <i class="text-white">Ouvrir whatsapp</i>
                                            </a>
                                        </td>
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
@section('script')
    <script>
        $("#datatable-buttons2").DataTable({
            lengthChange: !1,
            ordering: false,
            buttons: [{
                    extend: "copy",
                    className: "btn-light"
                },
                {
                    extend: "print",
                    className: "btn-light"
                },
                {
                    extend: "pdf",
                    className: "btn-light"
                },
            ],
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
            bDestroy: true
        });
    </script>
@endsection
